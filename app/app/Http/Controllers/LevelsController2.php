<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use App\last_posted; 

class LevelsController2 extends Controller

{

    public function index2()
    
    { $status = DB::table('tanks');

        $CK1 = $status->where('SerialNumber','=','170321-30280')->limit(1)->orderBy('id','desc');
        // $CK1_factor1 = $CK1->value('factor1');
        // $CK1_factor2 = $CK1->value('factor2');
        // $CK1_factor3 = $CK1->value('factor3');
        $CK1_Analog = $CK1->value('WaterLevel');
        $CK1_WaterLevel = ((($CK1_Analog / 25)) * 2976);
        $CK1_ExactTime = $CK1->value('ExactTime');
        $CK1_ExactTime = date('H:i', strtotime($CK1_ExactTime));
        $CK1_metres = ($CK1_Analog / 25);

        $CK1_percentage = ($CK1_metres / 1.7) * 100;
        if ($CK1_percentage > 0 && $CK1_percentage <10){

            $CK1_image = "10.png";

        }else if ($CK1_percentage >= 10 && $CK1_percentage <20){
            $CK1_image = "20.png";

        }else if ($CK1_percentage >= 20 && $CK1_percentage <30){
            $CK1_image = "30.png";

        }else if ($CK1_percentage >= 30 && $CK1_percentage <40){
            $CK1_image = "40.png";
            
        }else if ($CK1_percentage >= 40 && $CK1_percentage <50){
            $CK1_image = "50.png";
            
        }else if ($CK1_percentage >= 50 && $CK1_percentage <60){
            $CK1_image = "60.png";
            
        }else if ($CK1_percentage >= 60 && $CK1_percentage <70){
            $CK1_image = "70.png";
            
        }else if ($CK1_percentage >= 70 && $CK1_percentage <80){
            $CK1_image = "80.png";  
            
        }else if ($CK1_percentage >= 80 && $CK1_percentage <90){
            $CK1_image = "90.png";
            
        }else if ($CK1_percentage >= 90 ){
            $CK1_image = "100.png";
            
        }else{
            $CK1_image = "fault2.png";
        }
 
        $status = DB::table('tanks');

        $CK2 = $status->where('SerialNumber','=','180321-30070')->limit(1)->orderBy('id','desc');
        // $CK2_factor1 = $CK2->value('factor1');
        // $CK2_factor2 = $CK2->value('factor2');
        // $CK2_factor3 = $CK2->value('factor3');
        $CK2_Analog = $CK2->value('WaterLevel');
        $CK2_WaterLevel = ((($CK2_Analog / 25)) * 2976);
        $CK2_ExactTime = $CK2->value('ExactTime');
        $CK2_ExactTime = date('H:i', strtotime($CK2_ExactTime));
        $CK2_metres = ($CK2_Analog / 25);

        $CK2_percentage = ($CK2_metres / 1.45) * 100;

        if ($CK2_percentage >= 0 && $CK2_percentage <10){

            $CK2_image = "10.png"; 

        }else if ($CK2_percentage >= 10 && $CK2_percentage <20){
            $CK2_image = "10.png";

        }else if ($CK2_percentage >= 20 && $CK2_percentage <30){
            $CK2_image = "20.png";

        }else if ($CK2_percentage >= 30 && $CK2_percentage <40){
            $CK2_image = "30.png";
            
        }else if ($CK2_percentage >= 40 && $CK2_percentage <50){
            $CK2_image = "40.png";
            
        }else if ($CK2_percentage >= 50 && $CK2_percentage <60){
            $CK2_image = "50.png";
            
        }else if ($CK2_percentage >= 60 && $CK2_percentage <70){
            $CK2_image = "60.png";
            
        }else if ($CK2_percentage >= 70 && $CK2_percentage <80){
            $CK2_image = "70.png";
            
        }else if ($CK2_percentage >= 80 && $CK2_percentage <90){ 
            $CK2_image = "80.png";
            
        }else if ($CK2_percentage >= 90 ){
            $CK2_image = "100.png";
             
        }else{
            $CK2_image = "fault.png";  
        }
        $status = DB::table('tanks');

        $CK3 = $status->where('SerialNumber','=','170321-30282')->limit(1)->orderBy('id','desc');
        // $CK3_factor1 = $CK3->value('factor1');
        // $CK3_factor2 = $CK3->value('factor2');
        // $CK3_factor3 = $CK3->value('factor3');
        $CK3_Analog = $CK3->value('WaterLevel');
        $CK3_WaterLevel = ((($CK3_Analog / 25)) * 2976);
        $CK3_ExactTime = $CK3->value('ExactTime');
        $CK3_ExactTime = date('H:i', strtotime($CK3_ExactTime));
        $CK3_metres = ($CK3_Analog / 25);

        $CK3_percentage = ($CK3_metres / 1.7) * 100;

        if ($CK3_percentage >= 0 && $CK3_percentage <10){

            $CK3_image = "10.png";

        }else if ($CK3_percentage >= 10 && $CK3_percentage <20){
            $CK3_image = "20.png";

        }else if ($CK3_percentage >= 20 && $CK3_percentage <30){
            $CK3_image = "30.png";

        }else if ($CK3_percentage >= 30 && $CK3_percentage <40){
            $CK3_image = "40.png";
            
        }else if ($CK3_percentage >= 40 && $CK3_percentage <50){
            $CK3_image = "50.png";
            
        }else if ($CK3_percentage >= 50 && $CK3_percentage <60){
            $CK3_image = "60.png";
            
        }else if ($CK3_percentage >= 60 && $CK3_percentage <70){
            $CK3_image = "70.png";
            
        }else if ($CK3_percentage >= 70 && $CK3_percentage <80){
            $CK3_image = "80.png";
            
        }else if ($CK3_percentage >= 80 && $CK3_percentage <90){
            $CK3_image = "90.png";
            
        }else if ($CK3_percentage >= 90 ){
            $CK3_image = "100.png";
            
        }else{
            $CK3_image = "fault.png";
        }

        $status = DB::table('tanks');

        $CK3 = $status->where('SerialNumber','=','180321-30070')->limit(1)->orderBy('id','desc');
        $CK3_Analog = $CK3->value('WaterLevel');
        $CK3_WaterLevel = ((($CK3_Analog / 25)) * 2976);
        $CK3_ExactTime = $CK3->value('ExactTime');
        $CK3_ExactTime = date('H:i', strtotime($CK3_ExactTime));
        $CK3_metres = ($CK3_Analog / 25);

        $CK3_percentage = ($CK3_metres / 1.7) * 100;

        if ($CK3_percentage >= 0 && $CK3_percentage <10){

            $CK3_image = "10.png";

        }else if ($CK3_percentage >= 10 && $CK3_percentage <20){
            $CK3_image = "20.png";

        }else if ($CK3_percentage >= 20 && $CK3_percentage <30){
            $CK3_image = "30.png";

        }else if ($CK3_percentage >= 30 && $CK3_percentage <40){
            $CK3_image = "40.png";
            
        }else if ($CK3_percentage >= 40 && $CK3_percentage <50){
            $CK3_image = "50.png";
            
        }else if ($CK3_percentage >= 50 && $CK3_percentage <60){
            $CK3_image = "60.png";
            
        }else if ($CK3_percentage >= 60 && $CK3_percentage <70){
            $CK3_image = "70.png";
            
        }else if ($CK3_percentage >= 70 && $CK3_percentage <80){
            $CK3_image = "80.png";
            
        }else if ($CK3_percentage >= 80 && $CK3_percentage <90){
            $CK3_image = "90.png";
            
        }else if ($CK3_percentage >= 90 ){
            $CK3_image = "100.png";
            
        }else{
            $CK3_image = "fault.png";
        }


        return view('water_levels_CK',[

            'CK1_metres' => $CK1_metres,
         'CK1_percentage'=>  ceil($CK1_percentage),
         'CK1_image'=>  $CK1_image,
         // 'CK1_factor1'=>  $CK1_factor1/100,
         'CK1_WaterLevel'=>  ceil($CK1_WaterLevel),
         'CK1_ExactTime'=>  $CK1_ExactTime,
 
         'CK3_percentage'=>  ceil($CK3_percentage),
         'CK3_image'=>  $CK3_image,
         'CK3_metres' => $CK3_metres,
         // 'CK3_factor1'=>  $CK3_factor1/100, 
         'CK3_WaterLevel'=>  ceil($CK3_WaterLevel),
         'CK3_ExactTime'=>  $CK3_ExactTime,
 
         'CK2_percentage'=>  ceil($CK2_percentage),
         'CK2_image'=>  $CK2_image,
         'CK2_metres' => $CK2_metres,
        //  'CK2_factor1'=>  $CK2_factor1/100,
         'CK2_WaterLevel'=>  $CK2_WaterLevel/100,
         'CK2_ExactTime'=>  $CK2_ExactTime,
 
         ]);
 
     }
        
       
 
 
 }
 