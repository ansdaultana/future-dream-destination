<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //

    public function index(Request $request, $slug)
    {
        try {
            $tickets = Ticket::orderBy('created_at','desc')->get();
            foreach ($tickets as $ticket) {
                $imageData = base64_encode(Storage::get($ticket->image_path));
                $ticket->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            }

        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Tickets',
            [
                'homepageitems' => $tickets,
            ]
        );

    }
}