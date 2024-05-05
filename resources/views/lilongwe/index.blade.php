@extends('layouts.app')

@section('title', 'Home')

@section('content')
<meta http-equiv="refresh" content="10000">
<div>


    <div class="row" style='background-color: #141617'>
        <div class="col-lg-7">
            <h1 style="text-transform: capitalize;color:white; text-align:center">Lilongwe Branch Data Center</h1>
            <div class="ibox">
                <div class="ibox-content no-borders" style="background-color: #333333;">
                    <div class="row">
                        <div class="col-lg-12">
                            <img style="width: 90%;height: 90%;" src="{{asset('img/data-center-llz.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">

            <div class="col-lg-12">
                <h2 style='color:white; text-align:center'>Parameters & Statistics</h2>
                <hr width="100%;" color="white" size="10">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="widget red-bg style1 text-center">
                            <div class="m-b-md">
                                <h3 class="font-bold no-margins">
                                    Aisle 1
                                </h3>
                                <h1>
                                    <div><i class="mdi mdi-thermometer"></i>@php
                                        $final_value_temp1 = $sensor_1_temp/100;
                                        echo(round($final_value_temp1,1));
                                        @endphp&deg;C&nbsp;&nbsp;<i class="mdi mdi-water-percent"></i>@php
                                        $final_value_humi1 = $sensor_1_humidity/100;
                                        echo(round($final_value_humi1,0));
                                        @endphp%</div>
                                </h1>
                                <small><i class="mdi mdi-motion-sensor"></i>Last Posted :
                                    {{$sensor_1_last_reading}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="widget white-bg style1 text-center">
                            <div class="m-b-md">
                                <h3 class="font-bold no-margins">
                                    Aisle 2
                                </h3>
                                <h1>
                                    <div><i class="mdi mdi-thermometer"></i>@php
                                        $final_value_temp2 = $sensor_2_temp/100;
                                        echo(round($final_value_temp2,1));
                                        @endphp&deg;C&nbsp;&nbsp;<i class="mdi mdi-water-percent"></i>@php
                                        $final_value_humi2 = $sensor_2_humidity/100;
                                        echo(round($final_value_humi2,0));
                                        @endphp%</div>
                                </h1>
                                <small><i class="mdi mdi-motion-sensor"></i>Last Posted :
                                    {{$sensor_2_last_reading}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table no-margin table-stripped">
                                <thead class="text-white">
                                    <tr>
                                        <th class="text-primary">Last Motion Detected</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white center">
                                    @foreach($sensor_1_last_motion as $motion)
                                    <tr>
                                        <td><i class="mdi mdi-air-purifier"></i>&nbsp;{{$motion->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table no-margin table-stripped">
                                <thead class="text-white">
                                    <tr>
                                        <th class="text-primary">Last Motion Detected</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach($sensor_2_last_motion as $motion2)
                                    <tr>
                                        <td><i class="mdi mdi-air-purifier"></i>&nbsp;{{$motion2->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="widget red-bg style1 text-center">
                            <div class="m-b-md">
                                <h3 class="font-bold no-margins">
                                    Aisle 3
                                </h3>
                                <h1>
                                    <div><i class="mdi mdi-thermometer"></i>@php
                                        $final_value_temp3 = $sensor_3_temp/100;
                                        echo(round($final_value_temp3,1));
                                        @endphp&deg;C&nbsp;&nbsp;<i class="mdi mdi-water-percent"></i>@php
                                        $final_value_humi3 = $sensor_3_humidity/100;
                                        echo(round($final_value_humi3,0));
                                        @endphp%</div>
                                </h1>
                                <small><i class="mdi mdi-motion-sensor"></i>Last Posted :
                                    {{$sensor_3_last_reading}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="widget white-bg style1 text-center">
                            <div class="m-b-md">
                                <h3 class="font-bold no-margins">
                                    Aisle 4
                                </h3>
                                <h1>
                                    <div><i class="mdi mdi-thermometer"></i>@php
                                        $final_value_temp4 = $sensor_4_temp/100;
                                        echo(round($final_value_temp4,1));
                                        @endphp&deg;C&nbsp;&nbsp;<i class="mdi mdi-water-percent"></i>@php
                                        $final_value_humi4 = $sensor_4_humidity/100;
                                        echo(round($final_value_humi4,0));
                                        @endphp%</div>
                                </h1>
                                <small><i class="mdi mdi-motion-sensor"></i>Last Posted :
                                    {{$sensor_4_last_reading}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table no-margin table-stripped">
                                <thead class="text-white">
                                    <tr>
                                        <th class="text-primary">Last Motion Detected</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white center">
                                    @foreach($sensor_3_last_motion as $motion3)
                                    <tr>
                                        <td><i class="mdi mdi-air-purifier"></i>&nbsp;{{$motion3->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table no-margin table-stripped">
                                <thead class="text-white">
                                    <tr>
                                        <th class="text-primary">Last Motion Detected</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach($sensor_4_last_motion as $motion4)
                                    <tr>
                                        <td><i class="mdi mdi-air-purifier"></i>&nbsp;{{$motion4->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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