@extends('layouts.app2')
@section('content')


<style>
    .analytics {
        background-color: #151f2a;
    }
</style>
<div class="text-center animated fadeInRightBig">
    <!--h1 class="logo-name">TN</h1-->
    <!--<img src="{{asset('img/tnm.png')}}" alt="TNM logo" style="width:10%;height:5%;">-->
    <h1 style="color:#1E73BE;font-size:35px;font-weight:bolder;padding-top:20px; padding-bottom:20px">Infrastructure Management System</h1>
</div>

<div class="text-center animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-2">
        </div>

        <div class="col-lg-4"><a href="{{ route('telecom_towers.index')}}">
                <div class="widget navy-bg p-lg text-center" style='background-color: #1E73BE'>
                    <div class="m-b-md"><br><br>
                    <span class="material-icons fa-5x">cell_tower</span>
                        <h2 class="font-bold no-margins" style='padding-top:20px'>
                            Remote Telecom Towers
                        </h2><br><br>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4"><a href="{{ route('environmental_monitoring.index')}}">
                <div class="widget white-bg p-lg text-center">
                    <div class="m-b-md"><br><br>
                    <span class="material-icons fa-5x">dew_point</span>
                        <h2 class="font-bold no-margins" style='padding-top:20px'>
                            Environmental Monitoring
                        </h2><br><br>
                    </div>
                </div>
        </div></a>
    </div>

@endsection