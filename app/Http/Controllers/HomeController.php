<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 /**   public function index()
    {
        return view('home');
    } **/
    
      public function index()
    { $status = DB::table('latest_data');  

        $Test1 = $status->where('assetId','=','Test1');
        $Test1_factor1 = $Test1->value('factor1');
        $Test1_factor2 = $Test1->value('factor2');
        $Test1_WaterLevel = $Test1->value('WaterLevel');
        $Test1_ExactTime = $Test1->value('ExactTime');
        $Test1_ExactTime = date('H:i', strtotime($Test1_ExactTime));

        $Test1_percentage = ($Test1_WaterLevel / $Test1_factor1)*100;

        if ($Test1_percentage > 0 && $Test1_percentage <10){

            $Test1_image = "10.jpg";

        }else if ($Test1_percentage >= 10 && $Test1_percentage <20){
            $Test1_image = "20.jpg";

        }else if ($Test1_percentage >= 20 && $Test1_percentage <30){
            $Test1_image = "30.jpg";

        }else if ($Test1_percentage >= 30 && $Test1_percentage <40){
            $Test1_image = "40.jpg";
            
        }else if ($Test1_percentage >= 40 && $Test1_percentage <50){
            $Test1_image = "50.jpg";
            
        }else if ($Test1_percentage >= 50 && $Test1_percentage <60){
            $Test1_image = "60.jpg";
            
        }else if ($Test1_percentage >= 60 && $Test1_percentage <70){
            $Test1_image = "70.jpg";
            
        }else if ($Test1_percentage >= 70 && $Test1_percentage <80){
            $Test1_image = "80.jpg";
            
        }else if ($Test1_percentage >= 80 && $Test1_percentage <90){
            $Test1_image = "90.jpg";
            
        }else if ($Test1_percentage >= 90 ){
            $Test1_image = "100.jpg";
            
        }else{
            $Test1_image = "technical_fault.jpg";
        }

        $status = DB::table('latest_data');

        $Test2 = $status->where('assetId','=','Test2');
        $Test2_factor1 = $Test2->value('factor1');
        $Test2_factor2 = $Test2->value('factor2');
        $Test2_factor3 = $Test2->value('factor3');
        $Test2_WaterLevel = $Test2->value('WaterLevel');
        $Test2_ExactTime = $Test2->value('ExactTime');
        $Test2_ExactTime = date('H:i', strtotime($Test2_ExactTime));

        $Test2_percentage = ($Test2_WaterLevel / $Test2_factor1)*100;

        if ($Test2_percentage > 0 && $Test2_percentage <10){

            $Test2_image = "10.jpg";

        }else if ($Test2_percentage >= 10 && $Test2_percentage <20){
            $Test2_image = "20.jpg";

        }else if ($Test2_percentage >= 20 && $Test2_percentage <30){
            $Test2_image = "30.jpg";

        }else if ($Test2_percentage >= 30 && $Test2_percentage <40){
            $Test2_image = "40.jpg";
            
        }else if ($Test2_percentage >= 40 && $Test2_percentage <50){
            $Test2_image = "50.jpg";
            
        }else if ($Test2_percentage >= 50 && $Test2_percentage <60){
            $Test2_image = "60.jpg";
            
        }else if ($Test2_percentage >= 60 && $Test2_percentage <70){
            $Test2_image = "70.jpg";
            
        }else if ($Test2_percentage >= 70 && $Test2_percentage <80){
            $Test2_image = "80.jpg";
            
        }else if ($Test2_percentage >= 80 && $Test2_percentage <90){
            $Test2_image = "90.jpg";
            
        }else if ($Test2_percentage >= 90 ){
            $Test2_image = "100.jpg";
            
        }else{
            $Test2_image = "Fault_1.jpg";
        }

        $status = DB::table('latest_data');

        $Test_1 = $status->where('assetId','=','Test_1');
        $Test_1_factor1 = $Test_1->value('factor1');
        $Test_1_factor2 = $Test_1->value('factor2');
        $Test_1_factor3 = $Test_1->value('factor3');
        $Test_1_WaterLevel = $Test_1->value('WaterLevel'); 
        $Test_1_ExactTime = $Test_1->value('ExactTime');
        $Test_1_ExactTime = date('H:i', strtotime($Test_1_ExactTime));

        $Test_1_percentage = ($Test_1_WaterLevel / $Test_1_factor1)*100;

        if ($Test_1_percentage > 0 && $Test_1_percentage <10){

            $Test_1_image = "_10.jpg";

        }else if ($Test_1_percentage >= 10 && $Test_1_percentage <20){
            $Test_1_image = "_20.jpg";

        }else if ($Test_1_percentage >= 20 && $Test_1_percentage <30){
            $Test_1_image = "_30.jpg";

        }else if ($Test_1_percentage >= 30 && $Test_1_percentage <40){
            $Test_1_image = "_40.jpg";
            
        }else if ($Test_1_percentage >= 40 && $Test_1_percentage <50){
            $Test_1_image = "_50.jpg";
            
        }else if ($Test_1_percentage >= 50 && $Test_1_percentage <60){
            $Test_1_image = "_60.jpg";
            
        }else if ($Test_1_percentage >= 60 && $Test_1_percentage <70){
            $Test_1_image = "_70.jpg";
            
        }else if ($Test_1_percentage >= 70 && $Test_1_percentage <80){
            $Test_1_image = "_80.jpg";  
            
        }else if ($Test_1_percentage >= 80 && $Test_1_percentage <90){
            $Test_1_image = "_90.jpg";
            
        }else if ($Test_1_percentage >= 90 ){
            $Test_1_image = "_100.jpg";
            
        }else{
            $Test_1_image = "Fault_2.jpg";
        }

        $status = DB::table('latest_data');

        $Test_2 = $status->where('assetId','=','Test_2');
        $Test_2_factor1 = $Test_2->value('factor1');
        $Test_2_factor2 = $Test_2->value('factor2');
        $Test_2_factor3 = $Test_2->value('factor3');
        $Test_2_WaterLevel = $Test_2->value('WaterLevel');
        $Test_2_ExactTime = $Test_2->value('ExactTime');
        $Test_2_ExactTime = date('H:i', strtotime($Test_2_ExactTime));

        $Test_2_percentage = ($Test_2_WaterLevel / $Test_2_factor1)*100;

        if ($Test_2_percentage > 0 && $Test_2_percentage <10){

            $Test_2_image = "10.jpg"; 

        }else if ($Test_2_percentage >= 10 && $Test_2_percentage <20){
            $Test_2_image = "20.jpg";

        }else if ($Test_2_percentage >= 20 && $Test_2_percentage <30){
            $Test_2_image = "30.jpg";

        }else if ($Test_2_percentage >= 30 && $Test_2_percentage <40){
            $Test_2_image = "40.jpg";
            
        }else if ($Test_2_percentage >= 40 && $Test_2_percentage <50){
            $Test_2_image = "50.jpg";
            
        }else if ($Test_2_percentage >= 50 && $Test_2_percentage <60){
            $Test_2_image = "60.jpg";
            
        }else if ($Test_2_percentage >= 60 && $Test_2_percentage <70){
            $Test_2_image = "70.jpg";
            
        }else if ($Test_2_percentage >= 70 && $Test_2_percentage <80){
            $Test_2_image = "80.jpg";
            
        }else if ($Test_2_percentage >= 80 && $Test_2_percentage <90){ 
            $Test_2_image = "90.jpg";
            
        }else if ($Test_2_percentage >= 90 ){
            $Test_2_image = "100.jpg";
            
        }else{
            $Test_2_image = "technical_fault.jpg";  
        }
        return view('home',[


        'Test1_percentage'=>  ceil($Test1_percentage),
        'Test1_image'=>  $Test1_image,
        'Test1_factor1'=>  $Test1_factor1/100,
        'Test1_WaterLevel'=>  $Test1_WaterLevel/100,
        'Test1_ExactTime'=>  $Test1_ExactTime,

        'Test2_percentage'=>  ceil($Test2_percentage),
        'Test2_image'=>  $Test2_image,
        'Test2_factor1'=>  $Test2_factor1/100, 
        'Test2_WaterLevel'=>  $Test2_WaterLevel/100,
        'Test2_ExactTime'=>  $Test2_ExactTime,

        'Test_1_percentage'=>  ceil($Test_1_percentage),
        'Test_1_image'=>  $Test_1_image,
        'Test_1_factor1'=>  $Test_1_factor1/100,
        'Test_1_WaterLevel'=>  $Test_1_WaterLevel/100,
        'Test_1_ExactTime'=>  $Test_1_ExactTime,

        'Test_2_percentage'=>  ceil($Test_2_percentage),
        'Test_2_image'=>  $Test_2_image,
        'Test_2_factor1'=>  $Test_2_factor1/100,
        'Test_2_WaterLevel'=>  $Test_2_WaterLevel/100,
        'Test_2_ExactTime'=>  $Test_2_ExactTime,

        ]);

    }
}
