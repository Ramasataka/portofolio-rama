<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Experience;
use App\Models\Certification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        $user = User::first();
        $projects = Project::with('link_projects', 'tech_stacks', 'images')->get();
        $tech_stacks = $user->tech_stacks;
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $certifications = Certification::orderBy('year', 'desc')->get();

        return view('home', compact('user', 'projects', 'tech_stacks', 'experiences', 'certifications'));
    }
}
