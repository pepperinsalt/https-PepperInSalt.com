<?php

namespace App\Http\Controllers;

use App\Mail\ContactInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'service' => 'nullable|string|max:100',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|max:3000',
        ]);

        $to = config('mail.from.address', 'pepperinsalt@gmail.com');

        Mail::to($to)->send(new ContactInquiry(
            senderName: $validated['name'],
            senderEmail: $validated['email'],
            service: $validated['service'] ?? null,
            budget: $validated['budget'] ?? null,
            message: $validated['message'],
        ));

        return back()->with('success', 'Message sent! I\'ll reply within 48 hours.');
    }
}
