<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['quote', 'author_name', 'author_role', 'author_photo', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->author_photo) return null;
        if (str_starts_with($this->author_photo, 'assets/')) return asset($this->author_photo);
        return asset('storage/' . $this->author_photo);
    }
}
