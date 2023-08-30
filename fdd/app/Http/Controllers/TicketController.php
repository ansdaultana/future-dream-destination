<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use PHPUnit\Framework\Attributes\Ticket;

class TicketController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('TicketsHome');
    }
}
