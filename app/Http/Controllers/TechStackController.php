<?php

namespace App\Http\Controllers;

use App\Models\UserTechStack;
use App\Http\Requests\AddSkillRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechStackController extends Controller
{
    public function addSkill(AddSkillRequest $request) {
        $validated = $request->validated();
        $user = Auth::user();

        UserTechStack::create([
            'tech_stack' => $request->name,
            'user_id' => $user->id
        ]);

        return redirect()->route('dashboard')->with('success', 'Skill Ditambahkan');
    }

    public function destroySkill(UserTechStack $skill) {
        $skill->delete();
        return redirect()->route('dashboard')->with('success', 'Skill Dihapus');
    }
}
