<?php

namespace App\Http\Controllers;

use App\Notifications\ContactMessageNotification;
use App\Http\Requests\SendContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
     public function send(SendContactRequest $request)
    {
        $validated = $request->validated();

        // Kirim notifikasi ke email kamu
        Notification::route('mail', 'ramaputrawibawa24@gmail.com')
            ->notify(new ContactMessageNotification($validated));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
