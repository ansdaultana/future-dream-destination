<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //

    public function index(Request $request, $slug)
    {
        try {
            if($slug==='Ticket')
            {
                $Items = Ticket::orderBy('created_at','desc')->get();
                foreach ($Items as $Item) {
                    $imageData = base64_encode(Storage::get($Item->image_path));
                    $Item->image_base64 = 'data:image/jpeg;base64,' . $imageData;
                }
    
            }
            else if($slug==='Visa')
            {
                $Items = Visa::orderBy('created_at','desc')->get();
                foreach ($Items as $Item) {
                    $imageData = base64_encode(Storage::get($Item->image_path));
                    $Item->image_base64 = 'data:image/jpeg;base64,' . $imageData;
                }
    
            }
           
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'ItemsOfCategory',
            [
                'homepageitems' => $Items,
            ]
        );

    }
}