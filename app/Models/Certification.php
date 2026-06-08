<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'issuer',
        'year',
        'description',
        'image',
    ];

    /**
     * Get default preview image or falls back to an unsplash placeholder.
     */
    public function getPreviewImageAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&auto=format&fit=crop';
    }
}
