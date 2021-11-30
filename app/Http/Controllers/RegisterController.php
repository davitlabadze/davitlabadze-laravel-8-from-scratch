<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\Post;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(StoreRegisterRequest $attributes)
    {
        $user = User::create($attributes->validated());

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
