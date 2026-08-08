<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('sort_order')->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label'          => 'required|string|max:255',
            'value'          => 'required|integer',
            'suffix'         => 'nullable|string|max:10',
            'sort_order'     => 'nullable|integer',
        ]);
        $data['is_highlighted'] = $request->has('is_highlighted');
        Stat::create($data);
        return back()->with('success', 'Statistik berhasil ditambahkan.');
    }

    public function update(Request $request, Stat $stat)
    {
        $data = $request->validate([
            'label'          => 'required|string|max:255',
            'value'          => 'required|integer',
            'suffix'         => 'nullable|string|max:10',
            'sort_order'     => 'nullable|integer',
        ]);
        $data['is_highlighted'] = $request->has('is_highlighted');
        $data['is_active'] = $request->has('is_active');
        $stat->update($data);
        return back()->with('success', 'Statistik berhasil diperbarui.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return back()->with('success', 'Statistik berhasil dihapus.');
    }
}
