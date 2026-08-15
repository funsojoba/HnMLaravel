<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request, string $type)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'prohibited', // honeypot — bots fill this hidden field
        ], [
            'website.prohibited' => 'Submission rejected.',
        ]);

        $name = $request->input('name')
            ?: trim($request->input('first_name', '').' '.$request->input('last_name', ''));

        // Everything except the basics goes into the flexible JSON column.
        $data = $request->except([
            '_token', 'name', 'first_name', 'last_name', 'email', 'phone', 'website',
        ]);

        Submission::create([
            'type' => $type,
            'name' => $name ?: null,
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'data' => $data,
        ]);

        return back()->with('success', match ($type) {
            'support' => 'Your support request has been received. Our team will follow up as soon as possible.',
            'volunteer' => 'Thank you for applying to volunteer! We will review your application and be in touch.',
            'chapter' => 'Thank you! Your chapter application has been received.',
            'sponsorship' => 'Thank you for your interest in sponsoring. We will reach out shortly.',
            default => 'Thank you for reaching out. We will get back to you soon.',
        });
    }
}
