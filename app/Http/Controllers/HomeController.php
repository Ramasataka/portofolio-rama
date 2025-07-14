<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        $user = User::first();
        $projects = Project::with('link_projects', 'tech_stacks', 'images')->get();
        $tech_stacks = $user->tech_stacks;

        return view('home', compact('user', 'projects', 'tech_stacks'));
    }
}
