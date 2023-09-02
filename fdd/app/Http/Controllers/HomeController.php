<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            $category=Category::all();
            $tickets = Ticket::where('homepage', true)
            ->with('category') // Assuming you have a relationship named 'category' in your Ticket model
            ->orderByDesc('created_at') // Order by created_at in descending order
            ->get();
    
        // Retrieve visas where homepage is true and attach the category relationship
        $visas = Visa::where('homepage', true)
            ->with('category') // Assuming you have a relationship named 'category' in your Visa model
            ->orderByDesc('created_at') // Order by created_at in descending order
            ->get();
    
        // Combine the results into a single collection
        $results = $tickets->concat($visas);
        foreach ($results as $result) {
            $imageData = base64_encode(Storage::get($result->image_path));
            $result->image_base64 = 'data:image/jpeg;base64,' . $imageData;
        }
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Home',
            [
                'homepageitems' => $results,
                'category'=>$category,

            ]
        );

    }
}