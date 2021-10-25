<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException; # TODO: remove one blank line below


class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    { # Remove blank line below

        request()->validate(['email' => 'required|email']);
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email coul not be added to our newsletter list.'
            ]);
        }
        return redirect('/')->with('success', 'You are now signed up for our newsletter!'); # TODO: remove blank line below

    }
}
