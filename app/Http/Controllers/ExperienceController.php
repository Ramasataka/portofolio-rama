<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        return view('profile.experience', compact('experiences'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('experience_images', 'public');
                $validated['image'] = $path;
            }

            Experience::create($validated);

            return redirect()->route('experiences.index')->with('success', 'Experience added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('experiences.index')->with('error', 'Failed to add experience: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        try {
            if ($experience->image && Storage::disk('public')->exists($experience->image)) {
                Storage::disk('public')->delete($experience->image);
            }

            $experience->delete();

            return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('experiences.index')->with('error', 'Failed to delete experience: ' . $e->getMessage());
        }
    }
}
