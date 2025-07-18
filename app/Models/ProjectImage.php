<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $guarded = ['id'];
    protected $table = 'project_images';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
