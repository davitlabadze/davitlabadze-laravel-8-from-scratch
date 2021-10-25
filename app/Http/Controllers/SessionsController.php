<?php

namespace App\Http\Controllers;

# TODO: remove unused imports
use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{ # TODO: remove blank line below

    # TODO
    # If you are returning only views, 
    # You can do this from the routes file like this:
    # Route::view('route', 'view');
    # @see https://laravel.com/docs/8.x/routing#view-routes
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        # TODO 
        # validation logic should be extracted
        # Into custom request
        # @see https://laravel.com/docs/8.x/validation#form-request-validation
        $attributes = request()->validate([
          'email' => 'required|email',
          'password' => 'required'
        ]); # TODO: remove blank line below


        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verofied'
            ]);   
        }

        session()->regenerate();
            
        return redirect('/')->with('success', 'Welcome Back!'); # TODO: remove blank line below

    } # TODO: remove 1 blank line below


    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
