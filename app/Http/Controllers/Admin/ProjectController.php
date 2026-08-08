<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'tech_stack' => 'required|string|max:500',
            'problem'    => 'required|string',
            'solution'   => 'required|string',
            'result'     => 'required|string',
            'demo_url'   => 'nullable|url|max:500',
            'repo_url'   => 'nullable|url|max:500',
            'image'      => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
        $data['is_active'] = $request->has('is_active');
        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'tech_stack' => 'required|string|max:500',
            'problem'    => 'required|string',
            'solution'   => 'required|string',
            'result'     => 'required|string',
            'demo_url'   => 'nullable|url|max:500',
            'repo_url'   => 'nullable|url|max:500',
            'image'      => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
        $data['is_active'] = $request->has('is_active');
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return back()->with('success', 'Proyek berhasil dihapus.');
    }
}
