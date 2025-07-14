<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function link_projects()
    {
        return $this->hasMany(LinkProject::class);
    }

    public function tech_stacks()
    {
        return $this->hasMany(UserTechStack::class);
    }
}
