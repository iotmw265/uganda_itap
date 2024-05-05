<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use App\last_posted; 

class LevelsController extends Controller
{

    public function index()
    
    { $status = DB::table('tanks');  
    
   // $db = DB::connection('mysql2')->table('today_tanks')->where('TankCode','=','J')->orderBy('ID','ASC')->get();
   // var_dump($db);

        $Lab = $status->where('SerialNumber','=','170321-30268')->limit(1)->orderBy('id','desc');
        // $Lab_factor1 = $Lab->value('factor1');
        // $Lab_factor2 = $Lab->value('factor2');
        $Lab_Analog = $Lab->value('WaterLevel');
        $Lab_WaterLevel = ((($Lab_Analog / 25)) * 4861.1);
        $Lab_ExactTime = $Lab->value('ExactTime');
        $Lab_ExactTime = date('H:i', strtotime($Lab_ExactTime));
        $Lab_metres = ($Lab_Analog / 25);

        $Lab_percentage = ($Lab_metres / 0.72)*100;

        if ($Lab_percentage >= 0 && $Lab_percentage <10){

            $Lab_image = "_10.png";

        }else if ($Lab_percentage >= 10 && $Lab_percentage <20){
            $Lab_image = "_20.png";

        }else if ($Lab_percentage >= 20 && $Lab_percentage <30){
            $Lab_image = "_30.png";

        }else if ($Lab_percentage >= 30 && $Lab_percentage <40){
            $Lab_image = "_40.png";
            
        }else if ($Lab_percentage >= 40 && $Lab_percentage <50){
            $Lab_image = "_50.png";
            
        }else if ($Lab_percentage >= 50 && $Lab_percentage <60){
            $Lab_image = "_60.png";
            
        }else if ($Lab_percentage >= 60 && $Lab_percentage <70){
            $Lab_image = "_70.png";
            
        }else if ($Lab_percentage >= 70 && $Lab_percentage <80){
            $Lab_image = "_80.png";
            
        }else if ($Lab_percentage >= 80 && $Lab_percentage <90){
            $Lab_image = "_90.png";
            
        }else if ($Lab_percentage >= 90 ){
            $Lab_image = "_100.png";
            
        }else{
            $Lab_image = "_Fault.png";
        }

        $status = DB::table('tanks');

        $LTC = $status->where('SerialNumber','=','200321-60297')->limit(1)->orderBy('id','desc');
        // $LTC_factor1 = $LTC->value('factor1');
        // $LTC_factor2 = $LTC->value('factor2');
        // $LTC_factor3 = $LTC->value('factor3');
        $LTC_Analog = $LTC->value('WaterLevel');
        $LTC_WaterLevel = ((($LTC_Analog / 25)) * 2976);
        $LTC_ExactTime = $LTC->value('ExactTime');
        $LTC_ExactTime = date('H:i', strtotime($LTC_ExactTime));
        $LTC_metres = ($LTC_Analog / 25);

        $LTC_percentage = ($LTC_metres / 1.9) * 100;

        if ($LTC_percentage >= 0 && $LTC_percentage <10){

            $LTC_image = "10.png";

        }else if ($LTC_percentage >= 10 && $LTC_percentage <20){
            $LTC_image = "20.png";

        }else if ($LTC_percentage >= 20 && $LTC_percentage <30){
            $LTC_image = "30.png";

        }else if ($LTC_percentage >= 30 && $LTC_percentage <40){
            $LTC_image = "40.png";
            
        }else if ($LTC_percentage >= 40 && $LTC_percentage <50){
            $LTC_image = "50.png";
            
        }else if ($LTC_percentage >= 50 && $LTC_percentage <60){
            $LTC_image = "60.png";
            
        }else if ($LTC_percentage >= 60 && $LTC_percentage <70){
            $LTC_image = "70.png";
            
        }else if ($LTC_percentage >= 70 && $LTC_percentage <80){
            $LTC_image = "80.png";
            
        }else if ($LTC_percentage >= 80 && $LTC_percentage <90){
            $LTC_image = "90.png";
            
        }else if ($LTC_percentage >= 90 ){
            $LTC_image = "100.png";
            
        }else{
            $LTC_image = "Fault.png";
        }

        // $status = DB::table('latest_data');

        // $Test_1 = $status->where('assetId','=','Test_1');
        // $Test_1_factor1 = $Test_1->value('factor1');
        // $Test_1_factor2 = $Test_1->value('factor2');
        // $Test_1_factor3 = $Test_1->value('factor3');
        // $Test_1_WaterLevel = $Test_1->value('WaterLevel'); 
        // $Test_1_ExactTime = $Test_1->value('ExactTime');
        // $Test_1_ExactTime = date('H:i', strtotime($Test_1_ExactTime));

        // $Test_1_percentage = ($Test_1_WaterLevel / $Test_1_factor1)*100;

        // if ($Test_1_percentage > 0 && $Test_1_percentage <10){

        //     $Test_1_image = "_10.png";

        // }else if ($Test_1_percentage >= 10 && $Test_1_percentage <20){
        //     $Test_1_image = "_20.png";

        // }else if ($Test_1_percentage >= 20 && $Test_1_percentage <30){
        //     $Test_1_image = "_30.png";

        // }else if ($Test_1_percentage >= 30 && $Test_1_percentage <40){
        //     $Test_1_image = "_40.png";
            
        // }else if ($Test_1_percentage >= 40 && $Test_1_percentage <50){
        //     $Test_1_image = "_50.png";
            
        // }else if ($Test_1_percentage >= 50 && $Test_1_percentage <60){
        //     $Test_1_image = "_60.png";
            
        // }else if ($Test_1_percentage >= 60 && $Test_1_percentage <70){
        //     $Test_1_image = "_70.png";
            
        // }else if ($Test_1_percentage >= 70 && $Test_1_percentage <80){
        //     $Test_1_image = "_80.png";  
            
        // }else if ($Test_1_percentage >= 80 && $Test_1_percentage <90){
        //     $Test_1_image = "_90.png";
            
        // }else if ($Test_1_percentage >= 90 ){
        //     $Test_1_image = "_100.png";
            
        // }else{
        //     $Test_1_image = "Fault_2.png";
        // }

        // $status = DB::table('latest_data');

        // $Test_2 = $status->where('assetId','=','Test_2');
        // $Test_2_factor1 = $Test_2->value('factor1');
        // $Test_2_factor2 = $Test_2->value('factor2');
        // $Test_2_factor3 = $Test_2->value('factor3');
        // $Test_2_WaterLevel = $Test_2->value('WaterLevel');
        // $Test_2_ExactTime = $Test_2->value('ExactTime');
        // $Test_2_ExactTime = date('H:i', strtotime($Test_2_ExactTime));

        // $Test_2_percentage = ($Test_2_WaterLevel / $Test_2_factor1)*100;

        // if ($Test_2_percentage > 0 && $Test_2_percentage <10){

        //     $Test_2_image = "10.png"; 

        // }else if ($Test_2_percentage >= 10 && $Test_2_percentage <20){
        //     $Test_2_image = "20.png";

        // }else if ($Test_2_percentage >= 20 && $Test_2_percentage <30){
        //     $Test_2_image = "30.png";

        // }else if ($Test_2_percentage >= 30 && $Test_2_percentage <40){
        //     $Test_2_image = "40.png";
            
        // }else if ($Test_2_percentage >= 40 && $Test_2_percentage <50){
        //     $Test_2_image = "50.png";
            
        // }else if ($Test_2_percentage >= 50 && $Test_2_percentage <60){
        //     $Test_2_image = "60.png";
            
        // }else if ($Test_2_percentage >= 60 && $Test_2_percentage <70){
        //     $Test_2_image = "70.png";
            
        // }else if ($Test_2_percentage >= 70 && $Test_2_percentage <80){
        //     $Test_2_image = "80.png";
            
        // }else if ($Test_2_percentage >= 80 && $Test_2_percentage <90){ 
        //     $Test_2_image = "90.png";
            
        // }else if ($Test_2_percentage >= 90 ){
        //     $Test_2_image = "100.png";
            
        // }else{
        //     $Test_2_image = "technical_fault.png";  
        // }
        return view('water_levels',[

           'Lab_metres' => $Lab_metres,
        'Lab_percentage'=>  ceil($Lab_percentage),
        'Lab_image'=>  $Lab_image,
        // 'Lab_factor1'=>  $Lab_factor1/100,
        'Lab_WaterLevel'=>  ceil($Lab_WaterLevel),
        'Lab_ExactTime'=>  $Lab_ExactTime,

        'LTC_percentage'=>  ceil($LTC_percentage),
        'LTC_image'=>  $LTC_image,
        'LTC_metres' => $LTC_metres,
        // 'LTC_factor1'=>  $LTC_factor1/100, 
        'LTC_WaterLevel'=>  ceil($LTC_WaterLevel),
        'LTC_ExactTime'=>  $LTC_ExactTime,

        // 'Test_1_percentage'=>  ceil($Test_1_percentage),
        // 'Test_1_image'=>  $Test_1_image,
        // 'Test_1_factor1'=>  $Test_1_factor1/100,
        // 'Test_1_WaterLevel'=>  $Test_1_WaterLevel/100,
        // 'Test_1_ExactTime'=>  $Test_1_ExactTime,

        // 'Test_2_percentage'=>  ceil($Test_2_percentage),
        // 'Test_2_image'=>  $Test_2_image,
        // 'Test_2_factor1'=>  $Test_2_factor1/100,
        // 'Test_2_WaterLevel'=>  $Test_2_WaterLevel/100,
        // 'Test_2_ExactTime'=>  $Test_2_ExactTime,

        ]);

    }
        // public function index2()
    // { $status = DB::table('latest_data');  

    //     // $Lab = $status->where('assetId','=','Lab');
    //     // $Lab_factor1 = $Lab->value('factor1');
    //     // $Lab_factor2 = $Lab->value('factor2');
    //     $Lab_WaterLevel = $Lab->value('WaterLevel');
    //     $Lab_ExactTime = $Lab->value('ExactTime');
    //     $Lab_ExactTime = date('H:i', strtotime($Lab_ExactTime));

    //     $Lab_percentage = ($Lab_WaterLevel / $Lab_factor1)*100;

    //     if ($Lab_percentage > 0 && $Lab_percentage <10){

    //         $Lab_image = "10.png";

    //     }else if ($Lab_percentage >= 10 && $Lab_percentage <20){
    //         $Lab_image = "20.png";

    //     }else if ($Lab_percentage >= 20 && $Lab_percentage <30){
    //         $Lab_image = "30.png";

    //     }else if ($Lab_percentage >= 30 && $Lab_percentage <40){
    //         $Lab_image = "40.png";
            
    //     }else if ($Lab_percentage >= 40 && $Lab_percentage <50){
    //         $Lab_image = "50.png";
            
    //     }else if ($Lab_percentage >= 50 && $Lab_percentage <60){
    //         $Lab_image = "60.png";
            
    //     }else if ($Lab_percentage >= 60 && $Lab_percentage <70){
    //         $Lab_image = "70.png";
            
    //     }else if ($Lab_percentage >= 70 && $Lab_percentage <80){
    //         $Lab_image = "80.png";
            
    //     }else if ($Lab_percentage >= 80 && $Lab_percentage <90){
    //         $Lab_image = "90.png";
            
    //     }else if ($Lab_percentage >= 90 ){
    //         $Lab_image = "100.png";
            
    //     }else{
    //         $Lab_image = "technical_fault.png";
    //     }

        // $status = DB::table('latest_data');

        // $LTC = $status->where('assetId','=','LTC');
        // $LTC_factor1 = $LTC->value('factor1');
        // $LTC_factor2 = $LTC->value('factor2');
        // $LTC_factor3 = $LTC->value('factor3');
        // $LTC_WaterLevel = $LTC->value('WaterLevel');
        // $LTC_ExactTime = $LTC->value('ExactTime');
        // $LTC_ExactTime = date('H:i', strtotime($LTC_ExactTime));

        // $LTC_percentage = ($LTC_WaterLevel / $LTC_factor1)*100;

        // if ($LTC_percentage > 0 && $LTC_percentage <10){

        //     $LTC_image = "10.png";

        // }else if ($LTC_percentage >= 10 && $LTC_percentage <20){
        //     $LTC_image = "20.png";

        // }else if ($LTC_percentage >= 20 && $LTC_percentage <30){
        //     $LTC_image = "30.png";

        // }else if ($LTC_percentage >= 30 && $LTC_percentage <40){
        //     $LTC_image = "40.png";
            
        // }else if ($LTC_percentage >= 40 && $LTC_percentage <50){
        //     $LTC_image = "50.png";
            
        // }else if ($LTC_percentage >= 50 && $LTC_percentage <60){
        //     $LTC_image = "60.png";
            
        // }else if ($LTC_percentage >= 60 && $LTC_percentage <70){
        //     $LTC_image = "70.png";
            
        // }else if ($LTC_percentage >= 70 && $LTC_percentage <80){
        //     $LTC_image = "80.png";
            
        // }else if ($LTC_percentage >= 80 && $LTC_percentage <90){
        //     $LTC_image = "90.png";
            
        // }else if ($LTC_percentage >= 90 ){
        //     $LTC_image = "100.png";
            
        // }else{
        //     $LTC_image = "Fault_1.png";
        // }

        // $status = DB::table('latest_data');

        // $Test_1 = $status->where('assetId','=','Test_1');
        // $Test_1_factor1 = $Test_1->value('factor1');
        // $Test_1_factor2 = $Test_1->value('factor2');
        // $Test_1_factor3 = $Test_1->value('factor3');
        // $Test_1_WaterLevel = $Test_1->value('WaterLevel'); 
        // $Test_1_ExactTime = $Test_1->value('ExactTime');
        // $Test_1_ExactTime = date('H:i', strtotime($Test_1_ExactTime));

        // $Test_1_percentage = ($Test_1_WaterLevel / $Test_1_factor1)*100;

        // if ($Test_1_percentage > 0 && $Test_1_percentage <10){

        //     $Test_1_image = "_10.png";

        // }else if ($Test_1_percentage >= 10 && $Test_1_percentage <20){
        //     $Test_1_image = "_20.png";

        // }else if ($Test_1_percentage >= 20 && $Test_1_percentage <30){
        //     $Test_1_image = "_30.png";

        // }else if ($Test_1_percentage >= 30 && $Test_1_percentage <40){
        //     $Test_1_image = "_40.png";
            
        // }else if ($Test_1_percentage >= 40 && $Test_1_percentage <50){
        //     $Test_1_image = "_50.png";
            
        // }else if ($Test_1_percentage >= 50 && $Test_1_percentage <60){
        //     $Test_1_image = "_60.png";
            
        // }else if ($Test_1_percentage >= 60 && $Test_1_percentage <70){
        //     $Test_1_image = "_70.png";
            
        // }else if ($Test_1_percentage >= 70 && $Test_1_percentage <80){
        //     $Test_1_image = "_80.png";  
            
        // }else if ($Test_1_percentage >= 80 && $Test_1_percentage <90){
        //     $Test_1_image = "_90.png";
            
        // }else if ($Test_1_percentage >= 90 ){
        //     $Test_1_image = "_100.png";
            
        // }else{
        //     $Test_1_image = "Fault_2.png";
        // }

        // $status = DB::table('latest_data');

        // $Test_2 = $status->where('assetId','=','Test_2');
        // $Test_2_factor1 = $Test_2->value('factor1');
        // $Test_2_factor2 = $Test_2->value('factor2');
        // $Test_2_factor3 = $Test_2->value('factor3');
        // $Test_2_WaterLevel = $Test_2->value('WaterLevel');
        // $Test_2_ExactTime = $Test_2->value('ExactTime');
        // $Test_2_ExactTime = date('H:i', strtotime($Test_2_ExactTime));

        // $Test_2_percentage = ($Test_2_WaterLevel / $Test_2_factor1)*100;

        // if ($Test_2_percentage > 0 && $Test_2_percentage <10){

        //     $Test_2_image = "10.png"; 

        // }else if ($Test_2_percentage >= 10 && $Test_2_percentage <20){
        //     $Test_2_image = "20.png";

        // }else if ($Test_2_percentage >= 20 && $Test_2_percentage <30){
        //     $Test_2_image = "30.png";

        // }else if ($Test_2_percentage >= 30 && $Test_2_percentage <40){
        //     $Test_2_image = "40.png";
            
        // }else if ($Test_2_percentage >= 40 && $Test_2_percentage <50){
        //     $Test_2_image = "50.png";
            
        // }else if ($Test_2_percentage >= 50 && $Test_2_percentage <60){
        //     $Test_2_image = "60.png";
            
        // }else if ($Test_2_percentage >= 60 && $Test_2_percentage <70){
        //     $Test_2_image = "70.png";
            
        // }else if ($Test_2_percentage >= 70 && $Test_2_percentage <80){
        //     $Test_2_image = "80.png";
            
        // }else if ($Test_2_percentage >= 80 && $Test_2_percentage <90){ 
        //     $Test_2_image = "90.png";
            
        // }else if ($Test_2_percentage >= 90 ){
        //     $Test_2_image = "100.png";
            
        // }else{
        //     $Test_2_image = "technical_fault.png";  
        // }
      


}

