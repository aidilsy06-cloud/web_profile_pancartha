<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Stat;
use App\Models\Technology;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'services'     => Service::count(),
            'projects'     => Project::count(),
            'team'         => TeamMember::count(),
            'stats'        => Stat::count(),
            'technologies' => Technology::count(),
            'testimonials' => Testimonial::count(),
        ];
        return view('admin.dashboard', compact('counts'));
    }
}
