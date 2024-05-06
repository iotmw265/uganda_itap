@extends('layouts.app')
@section('content')


<style>
    .analytics {
        background-color: #151f2a;
    }
    .theme_color{
        color: #000000 !important;
        text-align: center;
    }
    td{
        color: #000000
    }
</style>

<div class="text-center animated fadeInRightBig">
    <div class='row' style='padding-top:30px'>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg" style='background-color: #1E73BE'>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="material-icons fa-5x">cell_tower</span>
                        </div>
                        <div class="col-md-7 text-right">
                            <strong style='font-size:15px'> Number of Sites </strong>
                            <h2 id="num_sites" class="font-bold">{{ $sites_count }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg" style='background-color: #ffffff'>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="material-icons fa-5x" style='color: #1E73BE'>battery_6_bar</span>
                        </div>
                        <div class="col-md-7 text-right" style='color: #1E73BE'>
                            <strong style='font-size:15px;'>Sites on Battery </strong>
                            <h2 id="num_sites" class="font-bold">{{ $sites_on_battery }}</h2>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-3">
                <div class="widget style1 navy-bg" style='background-color: #1E73BE'>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="material-icons fa-5x">bolt</span>
                        </div>
                        <div class="col-md-7 text-right">
                            <strong style='font-size:15px'>Sites on ESCOM</strong>
                            <h2 id="num_sites" class="font-bold">{{ $sites_on_mains }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg" style='background-color: #ffffff'>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="material-icons fa-5x" style='color: #1E73BE'>pallet</span>
                        </div>
                        <div class="col-md-7 text-right" style='color: #1E73BE'>
                            <strong style='font-size:15px;'> Sites on Genset </strong>
                            <h2 id="num_sites" class="font-bold">{{ $sites_on_genset }}</h2>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class='row' style='padding-top:30px'>

    <div class='col-md-12'>
        <div class="table-responsive">

            <table  class="table table-hover table-striped table-bordered " style="background-color: #00000;color: white;" id="search_table">
                        <thead style='background-color: #1E73BE !important'>
                            <tr class="unread">
                                <th class="theme_color">Site name</th>
                                <th class='theme_color'>Grid status</th>
                                <th class="theme_color">Generator State</th>
                                <th class="theme_color">Generator Runtime</th>
                                <th class="theme_color">Battery Voltage</th>
                                <th class="theme_color">Fuel Level</th>
                                <th class="theme_color">Last Posted</th>
                                <th class="theme_color">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sites as $site)
                            <tr>
                                <td><span class='btn'>{{$site->TankCode}}</span></td>
                                <td><span class='btn-primary btn btn-m'>{{$site->mains}}</span></td>
                                <td><span class='btn-danger btn btn-m'>{{$site->generator_running_status}}</span></td>
                                <td><span class='btn-primary btn btn-m'>0 hrs</span></td>
                                <td><span class='btn-secondary btn btn-m'>0 volts</span></td>
                                <td><span class='btn-secondary btn btn-m'>90%</span></td>
                                <td><span class='btn'>{{$site->ExactTime}}</span></td>
                                <td><button class='btn btn-sm btn-warning'>Site analytics</button></td>
                            </tr>
                            @endforeach
                        </tbody>
            </table>
        </div>
    </div>

</div>

@endsection