<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quote'        => 'required|string',
            'author_name'  => 'required|string|max:255',
            'author_role'  => 'required|string|max:255',
            'author_photo' => 'nullable|image|max:1024',
            'sort_order'   => 'nullable|integer',
        ]);
        if ($request->hasFile('author_photo')) {
            $data['author_photo'] = $request->file('author_photo')->store('testimonials', 'public');
        }
        $data['is_active'] = $request->has('is_active');
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'quote'        => 'required|string',
            'author_name'  => 'required|string|max:255',
            'author_role'  => 'required|string|max:255',
            'author_photo' => 'nullable|image|max:1024',
            'sort_order'   => 'nullable|integer',
        ]);
        if ($request->hasFile('author_photo')) {
            if ($testimonial->author_photo) Storage::disk('public')->delete($testimonial->author_photo);
            $data['author_photo'] = $request->file('author_photo')->store('testimonials', 'public');
        }
        $data['is_active'] = $request->has('is_active');
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->author_photo) Storage::disk('public')->delete($testimonial->author_photo);
        $testimonial->delete();
        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
