<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Http\Requests\StoreCertificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = Certification::orderBy('year', 'desc')->get();
        return view('profile.certification', compact('certifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificationRequest $request)
    {
        $validated = $request->validated();

        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('certification_images', 'public');
                $validated['image'] = $path;
            }

            Certification::create($validated);

            return redirect()->route('certifications.index')->with('success', 'Certification added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('certifications.index')->with('error', 'Failed to add certification: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certification $certification)
    {
        try {
            if ($certification->image && Storage::disk('public')->exists($certification->image)) {
                Storage::disk('public')->delete($certification->image);
            }

            $certification->delete();

            return redirect()->route('certifications.index')->with('success', 'Certification deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('certifications.index')->with('error', 'Failed to delete certification: ' . $e->getMessage());
        }
    }
}
