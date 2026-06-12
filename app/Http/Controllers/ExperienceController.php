<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Http\Requests\StoreExperienceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::orderByRaw('end_date IS NULL DESC, end_date DESC')->get();
        return view('profile.experience', compact('experiences'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExperienceRequest $request)
    {
        $validated = $request->validated();

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
