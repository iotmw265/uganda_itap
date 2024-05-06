@extends('layouts.app')

@section('title', 'Home')

@section('content')
<meta http-equiv="refresh" content="10000">
<div>


    <div class="row" >
        <div class="col-lg-7">
            <h2 style="text-transform: capitalize;color:white; text-align:center;border-radius:10px; background-color: #1E73BE !important;padding-top:10px;padding-bottom:10px;"><strong>Site Name:</strong> Mchinji</h2>
            <div class="ibox">
                <div class="ibox-content no-borders" style="background-color: #333333;border-radius:10px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <img style="width: 90%;height: 90%;" src="{!! asset('img/NBS Data center.jpg') !!}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">

            <div class="col-lg-12">
                <h2 style='color:white; text-align:center;border-radius:10px; background-color: #1E73BE !important;padding-top:10px;padding-bottom:10px;'>PARAMETERS & STATISTICS</h2>
                
                <div class="row">   
                    <div class="col-lg-6">
                        <div class="widget white-bg style1 text-center" >
                            <div class="m-b-md">
                                <h3 class="font-bold no-margins">
                                    Ambient Temperature
                                </h3>
                                <h1>
                                    <div>
                                        <i class="mdi mdi-thermometer"></i>
                                        @php
                                            echo($nbs_coms_rack->value('VarA0')/10);
                                        @endphp&deg;C&nbsp;&nbsp;
                                    </div>
                                </h1>
                                <small><i class="mdi mdi-motion-sensor"></i>Last Posted :
                                    {{ \Carbon\Carbon::parse($nbs_coms_rack->value('ExactTime'))->subHours(2)->diffForHumans()}}</small> 
				                    <br><p>{{ $nbs_coms_rack->value('ExactTime')}}</p>
                            </div>
                        </div>
                    </div>            
                    <div class="col-lg-6">
                        <div class="widget red-bg style1 text-center"  style='background-color:#1E73BE'>
                            <div class="m-b-md">
                                <h3 class="font-bold no-margins">
                                    Humidity
                                </h3>
                                <h1>
                                    <div>
                                        <i class="mdi mdi-water-percent"></i>
                                        @php
                                            echo($nbs_coms_rack->value('VarB0')/10);
                                        @endphp%
                                    </div>
                                </h1>
                                <small><i class="mdi mdi-motion-sensor"></i>Last Posted :
                                    {{ \Carbon\Carbon::parse($nbs_coms_rack->value('ExactTime'))->subHours(2)->diffForHumans()}}</small> 
				                    <br><p>{{ $nbs_coms_rack->value('ExactTime')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr width="100%;" color="white" size="10">
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <canvas id="lineChart" height="100"></canvas>
    </div>
</div>
<script src="{{asset('charts/charts.js')}}"></script>
<script>
    setTimeout(function() {
        location = ''
        }, 3000000);
</script>
@endsection