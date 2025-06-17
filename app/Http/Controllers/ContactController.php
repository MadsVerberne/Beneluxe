<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::raw($validated['message'], function ($mail) use ($validated) {
            $mail->to('jouw@emailadres.nl') // <-- vervang dit met je echte e-mailadres
                 ->subject('Nieuw contactbericht van ' . $validated['first_name'] . ' ' . $validated['last_name'])
                 ->replyTo($validated['email']);
        });

        return redirect()->back()->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact op.');
    }
}
