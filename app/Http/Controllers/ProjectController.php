<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('link_projects', 'tech_stacks', 'images')->get();
        return view('project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description_thumbnail' => 'required|string',
            'key_feature' => 'required|string',
            'link_types' => 'required|array',
            'link_types.*' => 'required|string',
            'links' => 'required|array',
            'links.*' => 'required|url',
            'tech_stacks' => 'required|array',
            'tech_stacks.*' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            $path_th =$request->file('thumbnail')->store('thumbnail', 'public');
            $path_thumbnail = $path_th;
        }
        // Simpan project
        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'key_feature' => $request->key_feature,
            'description_thumbnail' => $request->description_thumbnail,
            'thumbnail' => $path_thumbnail
        ]);

        // Simpan link projects (looping)
        foreach ($request->link_types as $index => $type) {
            $project->link_projects()->create([
                'link' => $request->links[$index],
                'links_type' => $type
            ]);
        }

        // Simpan tech stacks (looping)
        foreach ($request->tech_stacks as $tech) {
            $project->tech_stacks()->create([
                'tech_stack' => $tech
            ]);
        }

        // Simpan gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('project_images', 'public');
                $project->images()->create(['image' => $path]);
            }
        }

        return back()->with('success', 'Project created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Hapus gambar dari storage
        foreach ($project->images as $image) {
            Storage::delete('public/' . $image->image);
            $image->delete();
        }

        
        $project->delete();
        return back()->with('success', 'Project deleted successfully');
    }
}
