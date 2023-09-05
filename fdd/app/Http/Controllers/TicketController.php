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

    public function newTicketPage()
    {
        return Inertia::render('Admin/NewTicket');
    }

    public function new(Request $request)
    {

        $attributes = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'images' => 'image|required',
            'homepage' => 'boolean',
        ]);
        try {
            if ($attributes['images']) {
                $path = $attributes['images']->store('uploads');
            }

           $ticket= Ticket::create([
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'image_path' => $path,
                'homepage' => $attributes['homepage']
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function view()
    {
        try {
            $items = Ticket::all();

            foreach ($items as $ticket) {
                $imageData = base64_encode(Storage::get($ticket->image_path));
                $ticket->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render('Admin/ViewTickets', [
            'items' => $items,
        ]);
    }

    public function delete(Request $request, $slug)
    {

        try {

            $ticket = Ticket::where('slug', $slug)->firstOrFail();
            $fileToDelete = $ticket->image_path;
            if (Storage::exists($fileToDelete)) {
                Storage::delete($fileToDelete);
            }
            $ticket->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editPage(Request $request, $slug)
    {
        try {
            $ticket = Ticket::where('slug', $slug)->firstOrFail();
            if ($ticket) {
                $imageData = base64_encode(Storage::get($ticket->image_path));
                $ticket->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Admin/EditTicket',
            [
                'item' => $ticket,
                'edit' => true,
            ]
        );

    }

    public function edit(Request $request, $slug)
    {
        $attributes = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'images' => 'image|nullable',
            'oldimg' => 'string',
            'homepage' => 'boolean'
        ]);

        try {
            $ticket = Ticket::where('slug', $slug)->firstOrFail();

            if ($ticket) {
                $ticket->title = $attributes['title'];
                $ticket->description = $attributes['description'];
                $ticket->homepage = $attributes['homepage'];

                if (request('oldimg')) {

                }
                if (request('images')) {
                    if (request('images') !== null) {
                        $fileToDelete = $ticket->image_path;
                        if (Storage::exists($fileToDelete)) {
                            Storage::delete($fileToDelete);
                        }
                        $path = $attributes['images']->store('uploads');
                        $ticket->image_path = $path;
                    }

                }
                $ticket->save();

            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}