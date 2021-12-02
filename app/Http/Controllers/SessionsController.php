<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionsRequest;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function store(StoreSessionsRequest $attributes)
    {
        if (!auth()->attempt($attributes->validated())) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verofied'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
