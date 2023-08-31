<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TicketController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('TicketsHome');
    }

    public function newPage()
    {
        return Inertia::render('Admin/AddNewTicket');
    }

    public function new(Request $request)
    {

        $attributes = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'images'=>'image|required'
        ]);


        try {
            if ($attributes['images']) {
                $path = $attributes['images']->store('uploads');
            }
        
            Ticket::create([
                'title'=>$attributes['title'],
                'description'=>$attributes['description'],
                'image_path'=> $path
            ]);
        } catch (\Throwable $th) {
        throw $th;
        }

    }
    public function view()
    {
        try {
            $tickets = Ticket::all();

            foreach ($tickets as $ticket) {
                $imageData = base64_encode(Storage::get($ticket->image_path));
                $ticket->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
       return Inertia::render('Admin/TicketsView',[
        'tickets' => $tickets
    ]);
    }

    public function delete(Request $request,$slug)
    {

        try {
            
            $ticket=Ticket::where('slug',$slug)->firstOrFail();
            $fileToDelete = $ticket->image_path;
            if (Storage::exists($fileToDelete)) {
                Storage::delete($fileToDelete);
            }
            $ticket->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}