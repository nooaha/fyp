<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'tlahir'     => ['required','Date::format(DD-MM-YYYY)'],
            'jantina' => ['max:10'],
            'alamat' => ['max:70'],
        ]);
        if($request->get('email') != Auth::user()->email)
        {
            if(env('IS_DEMO') && Auth::user()->id == 1)
            {
                return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);

            }

        }
        else{
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        }


        User::where('id',Auth::user()->id)
        ->update([
            'name'    => $attributes['name'],
            'email' => $attribute['email'],
            'tlahir'     => $attributes['tlahir'],
            'jantina'    => $attributes['jantina'],
            'alamat' => $attributes['alamat'],
        ]);


        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
