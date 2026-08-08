<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'icon_type'   => 'required|in:emoji,image,feather',
            'icon_text'   => 'nullable|string|max:20',
            'icon_image'  => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);
        
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        
        if ($data['icon_type'] === 'image' && $request->hasFile('icon_image')) {
            $data['icon'] = $request->file('icon_image')->store('services/icons', 'public');
        } else {
            $data['icon'] = $data['icon_text'];
        }

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'icon_type'   => 'required|in:emoji,image,feather',
            'icon_text'   => 'nullable|string|max:20',
            'icon_image'  => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);
        
        $data['is_active'] = $request->has('is_active');
        
        if ($data['icon_type'] === 'image') {
            if ($request->hasFile('icon_image')) {
                if ($service->icon && Storage::disk('public')->exists($service->icon)) {
                    Storage::disk('public')->delete($service->icon);
                }
                $data['icon'] = $request->file('icon_image')->store('services/icons', 'public');
            }
        } else {
            $data['icon'] = $data['icon_text'];
        }
        
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        if ($service->icon_type === 'image' && $service->icon) {
            Storage::disk('public')->delete($service->icon);
        }
        $service->delete();
        return back()->with('success', 'Layanan berhasil dihapus.');
    }
}
