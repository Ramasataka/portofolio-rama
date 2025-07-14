<?php

namespace App\Http\Controllers;

use App\Notifications\ContactMessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
     public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Kirim notifikasi ke email kamu
        Notification::route('mail', 'ramaputrawibawa24@gmail.com')
            ->notify(new ContactMessageNotification($validated));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
