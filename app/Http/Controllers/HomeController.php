<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Stat;
use App\Models\Technology;
use App\Models\Testimonial;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $services    = Service::active()->get();
        $projects    = Project::active()->get();
        $team        = TeamMember::active()->get();
        $stats       = Stat::active()->get();
        $technologies = Technology::active()->get();
        $testimonials = Testimonial::active()->get();
        $settings    = SiteSetting::pluck('value', 'key');

        return view('home', compact(
            'services', 'projects', 'team', 'stats', 'technologies', 'testimonials', 'settings'
        ));
    }
}
