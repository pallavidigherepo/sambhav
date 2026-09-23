<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail; // You will create this Mailable

class ContactFormController extends Controller
{
    /**
     * Handle the contact form submission.
     */
    public function store(Request $request)
    {
        // 1. Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'comments' => 'required|string',
        ]);

        // 2. Process Submission (e.g., Send an Email)
        try {
            // Replace 'your-recipient@example.com' with the actual recipient email
            Mail::to('pals.ver@gmail.com')->send(new ContactFormMail($validatedData));

            return response()->json(['message' => 'Message sent successfully!'], 200);

        } catch (\Exception $e) {
            // Log the error for debugging
            //\Log::log("level", "Contact form submission failed: " . $e->getMessage());
            
            return response()->json(['message' => 'Failed to send message.'], 500);
        }
    }
}
