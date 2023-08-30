<?php

namespace App\Http\Controllers;

use App\Models\TicketRequest;
use Illuminate\Http\Request;

class TicketRequestController extends Controller
{
    public function request(Request $request)
    {
        $attributes= $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'no_of_adults' => 'required|integer|min:1',
                'no_of_children' => 'required|integer|min:0',
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
                    'no_of_adults' => $attributes['no_of_adults'],
                    'no_of_children' => $attributes['no_of_children'],
                    'from' => $attributes['from'],
                    'to' => $attributes['to'],
                    'booking_date' => $attributes['booking_date'],
                    'responeded'=>false,
                ]);
            } catch (\Throwable $th) {
                throw $th;
            }
    }
}
