<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index()
    {
       return Inertia::render('Admin/Dashboard');
    }
    
    
    public function Visas()
    {
       return Inertia::render('Admin/Visas');
    }
 
}
