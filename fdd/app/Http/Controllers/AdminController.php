<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    //

    public function view(Request $request)
    {
        try {
            $users = User::where('isadmin', 0)->where('responded', 0)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
        return Inertia::render(
            'Admin/AdminRequest',
            [
                'requests' => $users,
            ]
        );
    }

    public function yes(Request $request, $slug)
    {

        try {
            $user = User::where('id', $slug)->firstOrFail();
            if ($user) {

                $user->isadmin = true;
                $user->responded = true;
                $user->save();
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function no(Request $request, $slug)
    {

        try {
            $user = User::where('id', $slug)->firstOrFail();
            if ($user) {

                $user->isadmin = false;
                $user->responded = true;
                $user->save();

            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}