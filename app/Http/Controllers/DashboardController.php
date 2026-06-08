<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateInformationRequest;
use App\Http\Requests\UploadCvRequest;
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

    public function updateInformation(UpdateInformationRequest $request)
    {
        $user = User::first();
    
        $validated = $request->validated();

        try {
            $validated['email_contanct'] = $validated['email_contact'];
            $validated['phone_contanct'] = $validated['phone_contact'];
            $validated['available_for_work'] = $request->has('available_for_work');

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

    public function uploadCv(UploadCvRequest $request)
    {
        $validated = $request->validated();

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
