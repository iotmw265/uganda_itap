<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{
    public function index(Request $request)
    {
        
        $nbs_joint = DB::table('tanks')->where('serialNumber','200641-60238')->orderBy('ExactTime','desc')->limit(1);
        
        //cyber backup
        $nbs_cyber_backup_ups_1 = $nbs_joint->value('VarD0');
        if ($nbs_cyber_backup_ups_1 < 500 )
        {
            $nbs_cyber_backup_ups_1_av = 'off';
        }else{
            $nbs_cyber_backup_ups_1_av = 'on';
        }
        //cyber backup
        $nbs_cyber_backup_ups_2 = $nbs_joint->value('VarC0');
        if ($nbs_cyber_backup_ups_2 < 500 )
        {
            $nbs_cyber_backup_ups_2_av = 'off';
        }else{
            $nbs_cyber_backup_ups_2_av = 'on';
        }
        //coms rack
        $nbs_coms_rack_ups_1 = $nbs_joint->value('VarF0');
        if ($nbs_coms_rack_ups_1 < 500 )
        {
            $nbs_coms_rack_ups_1_av = 'off';
        }else{
            $nbs_coms_rack_ups_1_av = 'on';
        }
        //coms rack
        $nbs_coms_rack_ups_2 = $nbs_joint->value('VarE0');
        if ($nbs_coms_rack_ups_2 < 500 )
        {
            $nbs_coms_rack_ups_2_av = 'off';
        }else{
            $nbs_coms_rack_ups_2_av = 'on';
        }

        $nbs_single = DB::table('tanks')->where('serialNumber','200641-60247')->orderBy('ExactTime','desc')->limit(1);
        //nico tech 2
        $tech_2_ups_1 = $nbs_single->value('VarC0');
        if ($tech_2_ups_1 < 500 )
        {
            $tech_2_ups_1_av = 'off';
        }else{
            $tech_2_ups_1_av = 'on';
        }
        //nico tech 2
        $tech_2_ups_2 = $nbs_single->value('VarD0');
        if ($tech_2_ups_2 < 500 )
        {
            $tech_2_ups_2_av = 'off';
        }else{
            $tech_2_ups_2_av = 'on';
        }

        $nbs_merge = DB::table('3_racks_view')->orderBy('ExactTime','desc')->limit(1);
        //exadata
        $exadata_ups_1 = $nbs_merge->value('nbs_exadata_phase_1');
        if ($exadata_ups_1 != '1' )
        {
            $exadata_ups_1_av = 'off';
        }else{
            $exadata_ups_1_av = 'on';
        }
        //exadata
        $exadata_ups_2 = $nbs_merge->value('nbs_exadata_phase_2');
        if ($exadata_ups_2 != '1' )
        {
            $exadata_ups_2_av = 'off';
        }else{
            $exadata_ups_2_av = 'on';
        }

        //nbs_t24_1
        $nbs_t24_1_ups_1 = $nbs_merge->value('nbs_T241_phase_1');
        if ($nbs_t24_1_ups_1 != '1' )
        {
            $nbs_t24_1_ups_1_av = 'off';
        }else{
            $nbs_t24_1_ups_1_av = 'on';
        }
        //nbs_t24_1
        $nbs_t24_1_ups_2 = $nbs_merge->value('nbs_T241_phase_2');
        if ($nbs_t24_1_ups_2 != '1' )
        {
            $nbs_t24_1_ups_2_av = 'off';
        }else{
            $nbs_t24_1_ups_2_av = 'on';
        }

        //nbs_t24_2
        $nbs_t24_2_ups_1 = $nbs_merge->value('nbs_T242_phase_1');
        if ($nbs_t24_2_ups_1 != '1' )
        {
            $nbs_t24_2_ups_1_av = 'off';
        }else{
            $nbs_t24_2_ups_1_av = 'on';
        }
        //nbs_t24_1
        $nbs_t24_2_ups_2 = $nbs_merge->value('nbs_T242_phase_2');
        if ($nbs_t24_2_ups_2 != '1' )
        {
            $nbs_t24_2_ups_2_av = 'off';
        }else{
            $nbs_t24_2_ups_2_av = 'on';
        }

        return view('dg_and_power.index',compact('nbs_cyber_backup_ups_1_av','nbs_cyber_backup_ups_2_av','nbs_coms_rack_ups_1_av','nbs_coms_rack_ups_2_av','tech_2_ups_1_av','tech_2_ups_2_av','exadata_ups_1_av','exadata_ups_2_av','nbs_t24_1_ups_1_av','nbs_t24_1_ups_2_av','nbs_t24_2_ups_1_av','nbs_t24_2_ups_2_av'));
    }

    public function reports(Request $request)
    {
        return view('dg_and_power.reports');
        
    }



}
