<?php

namespace App\Http\Controllers;

use App\Models\TicketRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketRequestController extends Controller
{
    public function request(Request $request)
    {
        $attributes = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'from' => 'required|string',
                'to' => 'required|string',
                'booking_date' => 'required|date',
            ]
        );

        try {
            TicketRequest::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'phone' => $attributes['phone'],
                'from' => $attributes['from'],
                'to' => $attributes['to'],
                'booking_date' => $attributes['booking_date'],
                'responded' => false,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function ViewAllRequest()
    {
        try {

            $requests = TicketRequest::where('responded', 0)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render('Admin/RequestsView', [
            'requests' => $requests
        ]);
    }

    public function RequestResponded(Request $request, $slug)
    {

        try {

            $ticket = TicketRequest::where('id', $slug)->firstOrFail();
            $ticket['responded'] = true;
            $ticket->save();
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }
}