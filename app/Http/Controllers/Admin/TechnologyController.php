<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('sort_order')->get();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'logo'       => 'nullable|image|max:1024',
            'sort_order' => 'nullable|integer',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('tech-logos', 'public');
        }
        Technology::create($data);
        return back()->with('success', 'Teknologi berhasil ditambahkan.');
    }

    public function destroy(Technology $technology)
    {
        if ($technology->logo) Storage::disk('public')->delete($technology->logo);
        $technology->delete();
        return back()->with('success', 'Teknologi berhasil dihapus.');
    }
}
