<?php

namespace App\Http\Controllers;

use App\Models\OtherRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OtherRequestController extends Controller
{
    //
    
    public function message(Request $request ,$slug)
    {
       $slugOfItem=$slug;

        $attributes = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'email',
                'phone' => 'required|string',
                'message'=>'required',
                'about'=>'required|string'
            ]
        );
        try {
            OtherRequest::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'phone' => $attributes['phone'],
                'message' => $attributes['message'],
                'slug' => $slugOfItem,
                'about'=>$attributes['about'],
                'responded' => false,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
  
    }

    public function ViewVisaRequest(Request $request)
    {
        try {

            $requests = OtherRequest::where('responded',0)->where('about','Visa')->orderBy('created_at', 'desc')
            ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render('Admin/VisaRequest', [
            'requests' => $requests
        ]);
    }
    public function ViewTourRequest(Request $request)
    {
        try {

            $requests = OtherRequest::where('responded',0)->where('about','Tourism')->orderBy('created_at', 'desc')
            ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render('Admin/TourRequest', [
            'requests' => $requests
        ]);
    }

    public function RequestResponded(Request $request, $slug)
    {
        try {

            $request = OtherRequest::where('id', $slug)->firstOrFail();
            $request['responded'] = true;
            $request->save();
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }
}
