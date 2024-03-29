<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TourismController extends Controller
{
    //
    public function home(Request $request, $slug)
    {
        try {

            $Tourism = Tourism::where('slug', $slug)->firstOrFail();
            $imageData = base64_encode(Storage::get($Tourism->image_path));
            $Tourism->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'DetailPageAndContact',
            [
                'item' => $Tourism,
                'about'=>'Tourism'
            ]
        );
    }
    public function index(Request $request)
    {
        $items = Tourism::all();
        foreach ($items as $visa) {
            $imageData = base64_encode(Storage::get($visa->image_path));
            $visa->image_base64 = 'data:image/jpeg;base64,' . $imageData;
        }
        return Inertia::render(
            'Admin/ViewTours',
            [
                'items' => $items
            ]
        );
    }
    public function newTourPage(Request $request)
    { 
        {
            return Inertia::render('Admin/NewTour');
        }
    }

    public function new(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'images' => 'image|required',
            'homepage' => 'boolean',
            'inside_country_fee' => 'numeric|required',
            'outside_country_fee' => 'numeric',
            'discount' => 'numeric'
        ]);
        try {
            if ($attributes['images']) {
                $path = $attributes['images']->store('uploads');
            }

            Tourism::create([
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'image_path' => $path,
                'homepage' => $attributes['homepage'],
                'inside_country_fee' => $attributes['inside_country_fee'],
                'outside_country_fee' => $attributes['outside_country_fee'],
                'discount' => $attributes['discount']
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

    }



    public function delete(Request $request, $slug)
    {

        try {

            $visa = Tourism::where('slug', $slug)->firstOrFail();
            $fileToDelete = $visa->image_path;
            if (Storage::exists($fileToDelete)) {
                Storage::delete($fileToDelete);
            }
            $visa->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editPage(Request $request, $slug)
    {
        try {
            $visa = Tourism::where('slug', $slug)->firstOrFail();
            if ($visa) {
                $imageData = base64_encode(Storage::get($visa->image_path));
                $visa->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Admin/EditTour',
            [
                'item' => $visa,
                'edit' => true,
            ]
        );

    }

    public function edit(Request $request, $slug)
    {
        $attributes = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'images' => 'image|nullable',
            'oldimg' => 'string',
            'homepage' => 'boolean',
            'inside_country_fee' => 'numeric|required',
            'outside_country_fee' => 'numeric',
            'discount' => 'numeric'
        ]);
        try {
            $visa = Tourism::where('slug', $slug)->firstOrFail();
            if ($visa) {
                $visa->title = $attributes['title'];
                $visa->description = $attributes['description'];
                $visa->homepage = $attributes['homepage'];
                $visa->inside_country_fee= $attributes['inside_country_fee'];
                $visa->outside_country_fee= $attributes['outside_country_fee'];
                $visa->discount = $attributes['discount'];

                if (request('oldimg')) {

                }
                if (request('images')) {
                    if (request('images') !== null) {
                        $fileToDelete = $visa->image_path;
                        if (Storage::exists($fileToDelete)) {
                            Storage::delete($fileToDelete);
                        }
                        $path = $attributes['images']->store('uploads');
                        $visa->image_path = $path;
                    }

                }
                $visa->save();

            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}