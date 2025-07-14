<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTechStack extends Model
{
    protected $table = 'user_tech_stacks';

    protected $fillable = [
        'user_id',
        'project_id',
        'tech_stack',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
