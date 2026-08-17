<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'message' => ['required', 'string', 'max:5000'],
            // Honeypot field: real visitors never fill this in (it's hidden via
            // CSS in the form). Any value here means a bot filled every field.
            'company_website' => ['prohibited'],
        ]);

        Mail::to(config('company.email'))->send(
            new ContactFormSubmitted($data['name'], $data['email'], $data['message'])
        );

        return redirect()->route('thank-you');
    }
}
