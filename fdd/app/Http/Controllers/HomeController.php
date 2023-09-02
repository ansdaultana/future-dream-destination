<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\Tourism;
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
            $category = Category::all();
            $tickets = Ticket::where('homepage', true)
                ->orderByDesc('created_at')
                ->get();

            $visas = Visa::where('homepage', true)
                ->orderByDesc('created_at')
                ->get();
            $tours = Tourism::where('homepage', true)
                ->orderByDesc('created_at')
                ->get();
            $tempresults = $tickets->concat($visas);
            $results = $tempresults->concat($tours);
            foreach ($results as $result) {
                $imageData = base64_encode(Storage::get($result->image_path));
                $result->image_base64 = 'data:image/jpeg;base64,' . $imageData;
                if ($result instanceof Ticket) {
                    $result->category = 'Ticket';
                } elseif ($result instanceof Visa) {
                    $result->category = 'Visa';
                }elseif ($result instanceof Tourism) {
                    $result->category = 'Tourism';
                }
            }

        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Home',
            [
                'homepageitems' => $results,
                'category' => $category,

            ]
        );

    }
}