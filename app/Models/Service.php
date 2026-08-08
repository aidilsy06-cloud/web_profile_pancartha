<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $fillable = ['title', 'icon_type', 'icon', 'description', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getIconUrlAttribute()
    {
        if ($this->icon_type === 'image' && $this->icon) {
            return Storage::url($this->icon);
        }
        return null;
    }
}
