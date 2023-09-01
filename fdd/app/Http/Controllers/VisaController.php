<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VisaController extends Controller
{
    //
    public function index(Request $request)
    {

           return Inertia::render('Admin/TicketsView',
        [
            'visa'=>true,
            'ticket'=>false
        ]);
    }
    public function newVisaPage(Request $request)
    {
        {
            return Inertia::render('Admin/NewVisa');
        }
    }
}
