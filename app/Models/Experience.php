<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'organization',
        'start_date',
        'end_date',
        'type',
        'category',
        'description',
        'skills',
        'image',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Accessor for period string.
     */
    public function getPeriodAttribute()
    {
        $start = $this->start_date ? $this->start_date->format('M Y') : '';
        $end = $this->end_date ? $this->end_date->format('M Y') : 'Present';
        return $start ? "{$start} - {$end}" : $end;
    }

    /**
     * Get default placeholder image if no upload exists.
     */
    public function getPreviewImageAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        // Return a category-specific unsplash placeholder
        $cat = strtolower($this->category);
        if (str_contains($cat, 'lead')) {
            return 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=800&auto=format&fit=crop';
        } elseif (str_contains($cat, 'tech') || str_contains($cat, 'dev') || str_contains($cat, 'code')) {
            return 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&auto=format&fit=crop';
        }

        return 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=800&auto=format&fit=crop';
    }
}
