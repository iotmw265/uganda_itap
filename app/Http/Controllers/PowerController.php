<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{
    public function index(Request $request)
    {
        
        $data = DB::table('site_analytics')->get();
        $sites_on_battery = $data->where('mains','Not available')->where('generator_running_status','Idle')->count();
        $sites_on_mains = $data->where('mains','Available')->where('generator_running_status','Idle')->count();
        $sites_on_genset = $data->where('mains','Available')->where('generator_running_status','Available')->count();
        $sites_count = $data->count();

        $sites = $data;

        return view('telecom_towers.index',compact('sites_on_battery' ,'sites_on_mains','sites_on_genset','sites_count','sites'));
    }

    public function reports(Request $request)
    {
        return view('dg_and_power.reports');
        
    }



}
