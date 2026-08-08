<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'tech_stack', 'problem', 'solution', 'result',
        'demo_url', 'repo_url', 'image', 'sort_order', 'is_active'
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getTechArrayAttribute(): array
    {
        return array_map('trim', explode(',', $this->tech_stack));
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        return asset('storage/' . $this->image);
    }
}
