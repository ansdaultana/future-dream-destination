<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            $tickets = Ticket::where('homepage',true)->get();
            foreach ($tickets as $ticket) {
                $imageData = base64_encode(Storage::get($ticket->image_path));
                $ticket->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            }

        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Home',
            [
                'homepageitems' => $tickets
            ]
        );

    }
}