@extends('layouts.app')

@section('title', 'reports')

@section('content')

<style>
.contact-box {
    border: 0px;
}
.font-normal{
    color: #ffffff ;
}
</style>

<div class="row wrapper border-bottom page-heading" >
    <div class="col-lg-10">
        <h2 style='color:white;'>Power State Reports</h2>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="ibox float-e-margins" style="margin:0px;">
        <div class="ibox-content" style='background-color: #141617 !important;'>
            <div class="row">
                <div class="col-lg-1"></div>

                <div class="col-lg-3">
                    <div class="form-group" id="data_1">
                        <label class="font-normal">Select From Date</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="from_date" value=" <?= date("m/d/Y") ?>">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group" id="data_1">
                        <label class="font-normal">Select To Date</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="to_date" value=" <?= date("m/d/Y") ?>">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group" id="data_1">
                        <label class="font-normal" style="color:white"></label>
                        <div class="input-group">

                            <input type="button" name="filter" id="filter" value="Generate" class="btn btn-info" />
                            <!--input type="button" id="downloadExcel" value="Export" class="btn btn-info" style='margin-left:20px;' formaction="toexcel.php" /-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 ">
        <div class="col-lg-1"></div>
        <div class=" col-lg-10 wrapper wrapper-content animated fadeInRight" style="padding:0px;">
            <div class="row">

                <div >
                            <h5 style='text-align:center;font-size:20px;  color:#ffffff'>
                                Lilongwe Branch
                                <!--small>With custom colors.</small-->
                            </h5>
                </div>
            
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                Main Diesel Generator 
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_ll_dc_generator" id="export_ll_dc_generator" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest4" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_ll_dc_generator" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_ll_dc_generator'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                Backup Diesel Generator
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_ll_backup_dc_generator" id="export_ll_backup_dc_generator" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest5" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_ll_backup_dc_generator" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_ll_backup_dc_generator'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                UPS Phase 1
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_ll_ups_1" id="export_ll_ups_1" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest6" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_ll_ups_1" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_ll_ups_1'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                UPS Phase 2
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_ll_ups_2" id="export_ll_ups_2" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest7" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_ll_ups_2" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_ll_ups_2'>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                UPS Phase 3
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_ll_ups_3" id="export_ll_ups_3" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest8" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_ll_ups_3" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_ll_ups_3'>
                        </tbody>
                    </table>
                </div>
                
               
                <div >
                            <h5 style='text-align:center;font-size:20px; color:#ffffff'>
                                Blantyre Branch
                                <!--small>With custom colors.</small-->
                            </h5>
                </div>
            
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                Diesel Generator
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_bt_dg" id="export_bt_dg" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest1" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_bt_dg" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_bt_dg'>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                UPS Phase 1
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_bt_ups_1" id="export_bt_ups_1" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest2" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_bt_ups_1" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_bt_ups_1'>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style='background-color: #141617 !important;'>
                            <h5 style='margin-top:10px'>
                                UPS Phase 2
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_bt_ups_2" id="export_bt_ups_2" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content" style='background-color: #141617 !important;'>
                            <div>
                                <canvas id="mycanvasTest3" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_bt_ups_2" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Data Center</th>
                                    <th>Power Source</th>
                                    <th>State</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_bt_ups_2'>
                        </tbody>
                    </table>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script-->
<script src="{!! asset('js/jquery-2.1.1.js') !!}"></script>
<script src="{!! asset('js/jquery-ui-1.10.4.min.js') !!}"></script>
<!-- Date range picker -->
<script src="{!! asset('js/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- Data picker -->
<script src="{!! asset('js/plugins/datapicker/bootstrap-datepicker.js') !!}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{!! asset('js/plugins/dataTables/datatables.min.js') !!}"></script>
<script src="{!! asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') !!}"></script>

<script src="{{asset('public/js/table2excel.js')}}" ></script>

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<script>
$(document).ready(function() {

    console.log('ready');

  

    
let url = `${window.location.href}`
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/bt_dg_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Blantyre';
                    var power_source = 'Generator';
                    
                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime);
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data1 = jsonfile.map(function(e) {
                        if (e.dg == 1){
                            e.dg_state = 'On'
                        }else{
                            e.dg_state = 'Off';
                        }
                        power_state.push(e.dg_state );
                        return e.dg;
                    });

                    var table = document.getElementById("table_bt_dg");

                    $("#table_data_bt_dg").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }
                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat1 = mycanvasTest1.getContext('2d');
                        let chartStatus1 = Chart.getChart("mycanvasTest1");
                        if (chartStatus1 != undefined) {
                            chartStatus1.destroy();
                        }
                        var bt_trends1 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data1,
                                        borderColor: 'rgba(255, 255, 0, 1)',
                                        backgroundColor: 'rgba(255, 255, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    }
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart2 = new Chart(bat1, bt_trends1);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/bt_phase1_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {
                    
                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Blantyre';
                    var power_source = 'UPS Phase 1';

                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime);
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data2 = jsonfile.map(function(e) {
                        if (e.phase_1 == 1){
                            e.phase1 = 'On'
                        }else{
                            e.phase1 = 'Off';
                        }
                        power_state.push(e.phase1 );
                        return e.phase_1;
                    });


                    var table = document.getElementById("table_bt_ups_1");

                    $("#table_data_bt_ups_1").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }
                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat2 = mycanvasTest2.getContext('2d');
                        let chartStatus2 = Chart.getChart("mycanvasTest2");
                        if (chartStatus2 != undefined) {
                            chartStatus2.destroy();
                        }
                        var bt_trends2 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data2,
                                        borderColor: 'rgba(0, 128, 0, 1)',
                                        backgroundColor: 'rgba(0, 128, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart2 = new Chart(bat2, bt_trends2);
                }

            });
        } else {
            //alert("please select date"); 
        }
    });

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/bt_phase2_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {
                    
                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Blantyre';
                    var power_source = 'UPS Phase 2';

                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime);
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data3 = jsonfile.map(function(e) {
                        if (e.phase_2 == 1){
                            e.phase2 = 'On'
                        }else{
                            e.phase2 = 'Off';
                        }
                        power_state.push(e.phase2 );
                        return e.phase_2;
                    });


                    var table = document.getElementById("table_bt_ups_2");

                    $("#table_data_bt_ups_2").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }
                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat3 = mycanvasTest3.getContext('2d');
                        let chartStatus3 = Chart.getChart("mycanvasTest3");
                        if (chartStatus3 != undefined) {
                            chartStatus3.destroy();
                        }
                        var bt_trends3 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data3,
                                        borderColor: 'rgba(0, 128, 0, 1)',
                                        backgroundColor: 'rgba(0, 128, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart3 = new Chart(bat3, bt_trends3);
                }

            });
        } else {
            //alert("please select date"); 
        }
    });
    
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/ll_dc_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Lilongwe';
                    var power_source = 'UPS Phase 1';

                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime);
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data4 = jsonfile.map(function(e) {
                        if (e.phase_1 == 1){
                            e.phase1 = 'On'
                        }else{
                            e.phase1 = 'Off';
                        }
                        power_state.push(e.phase1 );
                        return e.phase_1;
                    });

                    var table = document.getElementById("table_ll_ups_1");

                    $("#table_data_ll_ups_1").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }
                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat4 = mycanvasTest6.getContext('2d');
                        let chartStatus4 = Chart.getChart("mycanvasTest6");
                        if (chartStatus4 != undefined) {
                            chartStatus4.destroy();
                        }
                        var bt_trends4 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data4,
                                        borderColor: 'rgba(0, 128, 0, 1)',
                                        backgroundColor: 'rgba(0, 128, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    }
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart4 = new Chart(bat4, bt_trends4);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/ll_dc_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Lilongwe';
                    var power_source = 'UPS Phase 2';
                    
                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime );
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data5 = jsonfile.map(function(e) {
                        if (e.phase_2 == 1){
                            e.phase2 = 'On'
                        }else{
                            e.phase2 = 'Off';
                        }
                        power_state.push(e.phase2 );
                        return e.phase_2;
                    });

                    var table = document.getElementById("table_ll_ups_2");

                    $("#table_data_ll_ups_2").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }

                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat5 = mycanvasTest7.getContext('2d');
                        let chartStatus5 = Chart.getChart("mycanvasTest7");
                        if (chartStatus5 != undefined) {
                            chartStatus5.destroy();
                        }
                        var bt_trends5 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data5,
                                        borderColor: 'rgba(0, 128, 0, 1)',
                                        backgroundColor: 'rgba(0, 128, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart5 = new Chart(bat5, bt_trends5);
                }

            });
        } else {
            //alert("please select date"); 
        }
    });

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/ll_dc_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Lilongwe';
                    var power_source = 'UPS Phase 3';
                    
                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime);
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data6 = jsonfile.map(function(e) {
                        if (e.phase_3 == 1){
                            e.phase3 = 'On'
                        }else{
                            e.phase3 = 'Off';
                        }
                        power_state.push(e.phase3 );
                        return e.phase_3;
                    });


                    var table = document.getElementById("table_ll_ups_3");

                    $("#table_data_ll_ups_3").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }
                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat6 = mycanvasTest8.getContext('2d');
                        let chartStatus6 = Chart.getChart("mycanvasTest8");
                        if (chartStatus6 != undefined) {
                            chartStatus6.destroy();
                        }
                        var bt_trends6 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data6,
                                        borderColor: 'rgba(0, 128, 0, 1)',
                                        backgroundColor: 'rgba(0, 128, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart6 = new Chart(bat6, bt_trends6);
                }

            });
        } else {
            //alert("please select date"); 
        }
    });

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/ll_maindg_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {
                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Lilongwe';
                    var power_source = 'Main Generator';
                    
                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime);
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data7 = jsonfile.map(function(e) {
                        if (e.dg == 1){
                            e.dg_state = 'On'
                        }else{
                            e.dg_state = 'Off';
                        }
                        power_state.push(e.dg_state );
                        return e.dg;
                    });
                    var table = document.getElementById("table_ll_dc_generator");

                    $("#table_data_ll_dc_generator").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }

                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat7 = mycanvasTest4.getContext('2d');
                        let chartStatus7 = Chart.getChart("mycanvasTest4");
                        if (chartStatus7 != undefined) {
                            chartStatus7.destroy();
                        }
                        var bt_trends7 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data7,
                                        borderColor: 'rgba(255, 255, 0, 1)',
                                        backgroundColor: 'rgba(255, 255, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart7 = new Chart(bat7, bt_trends7);
                }

            });
        } else {
            //alert("please select date"); 
        }
    });

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/generator_and_power/state", "/apis/ll_backup_dg_power.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {
                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'Lilongwe';
                    var power_source = 'Back up Generator';

                    var jsonfile = JSON.parse(data);

                    var labels = jsonfile.map(function(e) {
                        date_time_values.push(e.ExactTime);
                        return e.ExactTime;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data8 = jsonfile.map(function(e) {
                        if (e.generator_status == 1){
                            e.gs = 'On'
                        }else{
                            e.gs = 'Off';
                        }
                        power_state.push(e.gs );
                        return e.generator_status;
                    });

                    var table = document.getElementById("table_ll_backup_dc_generator");

                    $("#table_data_ll_backup_dc_generator").empty();

                    for (let i = 1; i < power_state.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = data_center_name; 
                        row.insertCell(1).innerHTML = power_source;
                        row.insertCell(2).innerHTML = power_state[i];
                        row.insertCell(3).innerHTML = date_time_values[i];
                    }

                        // Create a line chart
                        //var ctx = document.getElementById('mycanvasTest1').getContext('2d');
                        var bat8 = mycanvasTest5.getContext('2d');
                        let chartStatus8 = Chart.getChart("mycanvasTest5");
                        if (chartStatus8 != undefined) {
                            chartStatus8.destroy();
                        }
                        var bt_trends8 = {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: ' ',
                                        data: data8,
                                        borderColor: 'rgba(255, 255, 0, 1)',
                                        backgroundColor: 'rgba(255, 255, 0,0.3)',
                                        borderWidth: 0.2,
                                        fill: true
                                    },
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        max: 1,
                                        min: 0,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                return value === 1 ? 'ON' : 'OFF';
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Power State'
                                        },
                                    }
                                }
                            }
                        };

                        
                            var chart8 = new Chart(bat8, bt_trends8);
                }

            });
        } else {
            //alert("please select date"); 
        }
    });


});
</script>



<script>
jQuery(function(){
   jQuery('#filter').click();
});
</script>


<script>
    $(document).ready(function () {

    // Select the button and bind a click event listener
    document.querySelector('#export_ll_dc_generator').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_ll_dc_generator');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Lilongwe generator.xlsx');
    });

    // Select the button and bind a click event listener
    document.querySelector('#export_ll_backup_dc_generator').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_ll_backup_dc_generator');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Lilongwe backup generator.xlsx');
    });

    
    // Select the button and bind a click event listener
    document.querySelector('#export_ll_ups_1').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_ll_ups_1');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Lilongwe UPS Phase 1.xlsx');
    });

       
    // Select the button and bind a click event listener
    document.querySelector('#export_ll_ups_2').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_ll_ups_2');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Lilongwe UPS Phase 2.xlsx');
    });
    
    // Select the button and bind a click event listener
    document.querySelector('#export_ll_ups_3').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_ll_ups_3');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Lilongwe UPS Phase 3.xlsx');
    });

       // Select the button and bind a click event listener
       document.querySelector('#export_bt_dg').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_bt_dg');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Blantyre generator.xlsx');
    });

           // Select the button and bind a click event listener
           document.querySelector('#export_bt_ups_1').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_bt_ups_1');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Blantyre UPS Phase 1.xlsx');
    });

           // Select the button and bind a click event listener
           document.querySelector('#export_bt_ups_2').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_bt_ups_2');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Power state trends - Blantyre UPS Phase 2.xlsx');
    });


});
</script>
@endsection