<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name', 'role', 'bio', 'photo', 'github_url', 'linkedin_url',
        'instagram_url', 'website_url', 'email', 'border_color', 'skills', 'sort_order', 'is_active'
    ];

    protected $casts = ['is_active' => 'boolean', 'skills' => 'array'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getPhotoUrlAttribute(): string
    {
        if (!$this->photo) {
            return asset('assets/default-avatar.png');
        }
        if (str_starts_with($this->photo, 'assets/')) {
            return asset($this->photo);
        }
        return asset('storage/' . $this->photo);
    }
}
