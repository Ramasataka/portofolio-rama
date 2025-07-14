<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::first();
        $skills = $user->tech_stacks;
        return view('dashboard', compact('user', 'skills'));
    }

    public function updateInformation(Request $request)
    {

        $user = User::first();
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email_contact' => 'required|email|max:255',
        'phone_contact' => 'required|string|max:20',
        'github_link' => 'nullable|url',
        'linkedin_link' => 'nullable|url',
        'description' => 'nullable|string',
        'role' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

     try {
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
            
            // Simpan gambar baru
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }
        $user->update($validated);
        
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    } catch (\Exception $e) {
        return redirect()->route('dashboard')->with('error', 'Failed to update profile: ' . $e->getMessage());
    }
    }

    public function uploadCv(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|mimes:pdf|max:2048',
        ]);

        $user = Auth::user();

        // Hapus CV lama jika ada
        if ($user->cv && Storage::disk('public')->exists($user->cv)) {
            Storage::disk('public')->delete($user->cv);
        }

        // Upload & simpan yang baru
        $path = $request->file('cv_file')->storeAs('cv', 'cv-imaderamaputrawibawa', 'public');
        $user->cv = $path;
        $user->save();

        return back()->with('success', 'CV berhasil diperbarui.');
    }

}
