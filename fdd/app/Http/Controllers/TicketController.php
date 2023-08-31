<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
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
            'images'=>'image'
        ]);


        try {
            if ($attributes['images']) {
                $path = $attributes['images']->store('uploads');
            }
            Ticket::create([
                'title'=>$attributes['title'],
                'description'=>$attributes['description'],
                'image_path'=>$attributes['images']
            ]);
        } catch (\Throwable $th) {
        throw $th;
        }

    }
}