<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreNewsletterRequest;

class NewsletterController extends Controller
{
    public function __invoke(StoreNewsletterRequest $attribute, Newsletter $newsletter)
    {
        $attribute->validated();

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }

        return redirect()->route('home')->with('success', 'You are now signed up for our newsletter!');
    }
}
