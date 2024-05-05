<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EnvironmentController extends Controller
{

    public function dashboardEnvironmental()
    { 
        $nbs_coms_rack= DB::table('tanks')->where('SerialNumber','200641-60238')->orderBy('id','desc')->limit(1);
        $nbs_nico_tech_2= DB::table('tanks')->where('SerialNumber','200641-60247')->orderBy('id','desc')->limit(1);

        return view('environmental.index', compact('nbs_coms_rack','nbs_nico_tech_2'));
    }

    public function environmentalReports()
    { 
        return view('environmental.reports');
    }

    
    public function reportsEnvironmental()
    { 

        return view('blantyre.reports');
    }
    
    public function reportsPowerState()
    { 

        return view('lilongwe.reports');
    }
}
