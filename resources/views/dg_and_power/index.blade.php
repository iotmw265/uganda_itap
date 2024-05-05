@extends('layouts.app')

@section('title', 'Home')

@section('content')
<meta http-equiv="refresh" content="5000">
<div>


    <div class="row">
    <h2 style="text-transform: capitalize;color:white; text-align:center;border-radius:10px; background-color: #e7313f !important;padding-top:20px;padding-bottom:20px;">HEADQUARTERS DATA CENTER - POWER STATUS</h2>

    <div class='row'>
            <!--div class='col-lg-1'></div-->
           
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-content no-borders" style="background-color: #ffffff; border-radius:15px !important; border: 3px solid #e7313f !important; padding-bottom:5px">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--h4 style="text-align: center;color: #000000;font-size: 18px;">NBS Coms. Rack</h4-->
                                <div style='display: flex; justify-content: center; align-items: center;'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <p style='text-align:center; font-size:16px;'><strong>Exadata</strong></p>
                                            <img style="width: 90%; height: 90%;" src="{!! asset('img/server_3.jpg') !!}">
                                                <div class="ibox">
                                                    <div class="ibox-content no-borders" style="background-color: #f0f0f0; border-radius:15px !important; border: 2px solid #cccccc !important;">
                                                        <div class='row'>
                                                            <div class='col-md-6' style='padding-right:10px'>
                                                                <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 1</h4>
                                                                <div style='display: flex; justify-content: center; align-items: center;'>
                                                                    @if ($exadata_ups_1_av == 'on')
                                                                        <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                    @elseif ($exadata_ups_1_av == 'off')
                                                                        <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class='col-md-6' style='padding-left:10px'>
                                                                <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 2</h4>
                                                                <div style='display: flex; justify-content: center; align-items: center;'>
                                                                    @if ($exadata_ups_2_av == 'on')
                                                                        <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                    @elseif ($exadata_ups_2_av == 'off')
                                                                        <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class='col-md-6'>
                                            <p style='text-align:center; font-size:16px;'><strong>NBS T24-1</strong></p>
                                            <img style="width: 100%; height: 100%;" src="{!! asset('img/server_2.jpg') !!}">
                                            <div class="ibox">
                                                <div class="ibox-content no-borders" style="background-color: #f0f0f0; border-radius:15px !important; border: 2px solid #cccccc !important;">
                                                    <div class='row'>
                                                        <div class='col-md-6' style='padding-right:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 1</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_t24_1_ups_1_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_t24_1_ups_1_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6' style='padding-left:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 2</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_t24_1_ups_2_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_t24_1_ups_2_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-content no-borders" style="background-color: #ffffff; border-radius:15px !important; border: 3px solid #e7313f !important; padding-bottom:5px">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--h4 style="text-align: center;color: #000000;font-size: 18px;">NBS Coms. Rack</h4-->
                                <div style='display: flex; justify-content: center; align-items: center;'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <p style='text-align:center; font-size:16px;'><strong>NBS T24-2</strong></p>
                                            <img style="width: 90%; height: 90%;" src="{!! asset('img/server_3.jpg') !!}">
                                            <div class="ibox">
                                                <div class="ibox-content no-borders" style="background-color: #f0f0f0; border-radius:15px !important; border: 2px solid #cccccc !important;">
                                                    <div class='row'>
                                                        <div class='col-md-6' style='padding-right:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 1</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_t24_2_ups_1_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_t24_2_ups_1_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6' style='padding-left:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 2</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_t24_2_ups_2_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_t24_2_ups_2_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <p style='text-align:center; font-size:16px;'><strong>NBS Cyber Backup</strong></p>
                                            <img style="width: 100%; height: 100%;" src="{!! asset('img/server_2.jpg') !!}">
                                            <div class="ibox">
                                                <div class="ibox-content no-borders" style="background-color: #f0f0f0; border-radius:15px !important; border: 2px solid #cccccc !important;">
                                                    <div class='row'>
                                                        <div class='col-md-6' style='padding-right:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 1</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_cyber_backup_ups_1_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_cyber_backup_ups_1_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6' style='padding-left:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 2</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_cyber_backup_ups_2_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_cyber_backup_ups_2_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-content no-borders" style="background-color: #ffffff; border-radius:15px !important; border: 3px solid #e7313f !important; padding-bottom:5px">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--h4 style="text-align: center;color: #000000;font-size: 18px;">NBS Coms. Rack</h4-->
                                <div style='display: flex; justify-content: center; align-items: center;'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <p style='text-align:center; font-size:16px;'><strong>NBS Coms. Rack</strong></p>
                                            <img style="width: 100%; height: 100%;" src="{!! asset('img/server_2.jpg') !!}">
                                            <div class="ibox">
                                                <div class="ibox-content no-borders" style="background-color: #f0f0f0; border-radius:15px !important; border: 2px solid #cccccc !important;">
                                                    <div class='row'>
                                                        <div class='col-md-6' style='padding-right:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 1</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_coms_rack_ups_1_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_coms_rack_ups_1_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6' style='padding-left:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 2</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($nbs_coms_rack_ups_2_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($nbs_coms_rack_ups_2_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <p style='text-align:center; font-size:16px;'><strong>NICO Tech 2</strong></p>
                                            <img style="width: 90%; height: 90%;" src="{!! asset('img/server_3.jpg') !!}">
                                            <div class="ibox">
                                                <div class="ibox-content no-borders" style="background-color: #f0f0f0; border-radius:15px !important; border: 2px solid #cccccc !important;">
                                                    <div class='row'>
                                                        <div class='col-md-6' style='padding-right:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 1</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($tech_2_ups_1_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($tech_2_ups_1_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6' style='padding-left:10px'>
                                                            <h4 style="text-align: center;color: #000000;font-size: 13px;">UPS 2</h4>
                                                            <div style='display: flex; justify-content: center; align-items: center;'>
                                                                @if ($tech_2_ups_2_av == 'on')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_on.png') !!}">
                                                                @elseif ($tech_2_ups_2_av == 'off')
                                                                    <img style="width: 90%;height: 90%;" src="{!! asset('img/switch_off.png') !!}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<script src="{{asset('charts/charts.js')}}"></script>
<link href="https://fonts.cdnfonts.com/css/ds-digital" rel="stylesheet">

<style>
    .center{
        display: flex; justify-content: center; align-items: center;
    }
    .white{
        color:#ffffff;
    }

</style>

<script>
    setTimeout(function() {
        location = ''
        }, 3000000);
</script>
@endsection