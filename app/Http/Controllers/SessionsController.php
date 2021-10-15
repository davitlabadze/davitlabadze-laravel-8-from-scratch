<?php

namespace App\Http\Controllers;


use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
          'email' => 'required|email',
          'password' => 'required'
        ]);


        if (auth()->attempt($attributes)) {

            session()->regenerate();
            
            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verofied'
        ]);



    //   return back()
    //   ->withInput()
    //   ->withErrors(['email' => 'Your provided credentials could not be verofied']);
    
    }


    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
