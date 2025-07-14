<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkProject extends Model
{
    protected $table = 'link_projects';

    protected $fillable = [
        'project_id',
        'link',
        'links_type',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
