<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class VisaController extends Controller
{
    //
    public function home()
    {
        return Inertia::render('VisasHome');
    }
    public function index(Request $request)
    {
        $items = Visa::all();
        foreach ($items as $visa) {
            $imageData = base64_encode(Storage::get($visa->image_path));
            $visa->image_base64 = 'data:image/jpeg;base64,' . $imageData;
        }
        return Inertia::render(
            'Admin/ViewVisas',
            [
                'items' => $items
            ]
        );
    }
    public function newVisaPage(Request $request)
    { {
            return Inertia::render('Admin/NewVisa');
        }
    }

    public function new(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'images' => 'image|required',
            'homepage' => 'boolean',
            'fee' => 'numeric',
            'discount' => 'numeric'
        ]);
        try {
            if ($attributes['images']) {
                $path = $attributes['images']->store('uploads');
            }

            Visa::create([
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'image_path' => $path,
                'homepage' => $attributes['homepage'],
                'fee' => $attributes['fee'],
                'discount' => $attributes['discount']
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

    }



    public function delete(Request $request, $slug)
    {

        try {

            $visa = Visa::where('slug', $slug)->firstOrFail();
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
            $visa = Visa::where('slug', $slug)->firstOrFail();
            if ($visa) {
                $imageData = base64_encode(Storage::get($visa->image_path));
                $visa->image_base64 = 'data:image/jpeg;base64,' . $imageData;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Admin/EditVisa',
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
            'fee' => 'numeric',
            'discount' => 'numeric'
        ]);
        try {
            $visa = Visa::where('slug', $slug)->firstOrFail();
            if ($visa) {
                $visa->title = $attributes['title'];
                $visa->description = $attributes['description'];
                $visa->homepage = $attributes['homepage'];
                $visa->fee = $attributes['fee'];
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