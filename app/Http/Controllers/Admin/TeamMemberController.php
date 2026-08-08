<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'role'         => 'required|string|max:255',
            'bio'          => 'required|string',
            'photo'        => 'nullable|image|max:2048',
            'github_url'   => 'nullable|url|max:500',
            'linkedin_url' => 'nullable|url|max:500',
            'instagram_url'=> 'nullable|url|max:500',
            'website_url'  => 'nullable|url|max:500',
            'email'        => 'nullable|email|max:255',
            'border_color' => 'required|in:blue,gold',
            'skills'       => 'nullable|string',
            'sort_order'   => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }
        // Parse skills from comma-separated input
        $data['skills'] = array_filter(array_map('trim', explode(',', $request->input('skills', ''))));
        $data['skills'] = array_values($data['skills']);
        $data['is_active'] = $request->has('is_active');
        TeamMember::create($data);
        return redirect()->route('admin.team.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'role'         => 'required|string|max:255',
            'bio'          => 'required|string',
            'photo'        => 'nullable|image|max:2048',
            'github_url'   => 'nullable|url|max:500',
            'linkedin_url' => 'nullable|url|max:500',
            'instagram_url'=> 'nullable|url|max:500',
            'website_url'  => 'nullable|url|max:500',
            'email'        => 'nullable|email|max:255',
            'border_color' => 'required|in:blue,gold',
            'skills'       => 'nullable|string',
            'sort_order'   => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            if ($team->photo && !str_starts_with($team->photo, 'assets/')) {
                Storage::disk('public')->delete($team->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }
        // Parse skills from comma-separated input
        $data['skills'] = array_filter(array_map('trim', explode(',', $request->input('skills', ''))));
        $data['skills'] = array_values($data['skills']);
        $data['is_active'] = $request->has('is_active');
        $team->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo && !str_starts_with($team->photo, 'assets/')) {
            Storage::disk('public')->delete($team->photo);
        }
        $team->delete();
        return back()->with('success', 'Anggota berhasil dihapus.');
    }
}
