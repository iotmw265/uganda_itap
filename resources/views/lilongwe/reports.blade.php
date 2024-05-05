@extends('layouts.app')

@section('title', 'reports')

@section('content')

<style>
.contact-box {
    border: 0px;
}

.font-normal {
    color: #ffffff;
}
</style>

<div class="row wrapper border-bottom page-heading" style='background-color: #141617'>
    <div class="col-lg-10">
        <h2 style='color:white;'>Reports - Lilongwe Branch Data Center</h2>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="ibox float-e-margins" style="margin:0px;">
        <div class="ibox-content" style='background-color: #141617 !important;'>
            <div class="row">
                <div class="col-lg-1"></div>

                <!-- <div class="col-lg-1"></div> -->
                <!--div class="col-lg-3">
                    <div class="form-group">
                        <label class="font-normal">Report Type</label>
                        <div class="input-group">
                            <select class="form-control m-b" id="report_type" style='width:148%'>
                                <option>Select a Report type</option>
                                <option value="environmental_monitoring">Environmental Monitoring</option>
                            </select>
                        </div>
                    </div>
                </div-->
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
                            <!--input type="button" id="downloadExcel" value="Export" class="btn btn-info"
                                style='margin-left:20px;' formaction="toexcel.php" /-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 " style="background-color:#141617 !important;">
        <div class="col-lg-1"></div>
        <div class=" col-lg-10 wrapper wrapper-content animated fadeInRight" style="padding:0px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Temperature Trends (Aisle 1)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_temperature_1" id="export_temperature_1" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>

                                <canvas id="mycanvasTest2" height="120"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_temperature_1" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_temperature_1'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Humidity Trends (Aisle 1)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_humidity_1" id="export_humidity_1" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="mycanvasTest1" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_humidity_1" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_humidity_1'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Temperature Trends (Aisle 2)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_temperature_2" id="export_temperature_2" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="mycanvasTest4" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_temperature_2" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_temperature_2'>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Humidity Trends (Aisle 2)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_humidity_2" id="export_humidity_2" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>

                                <canvas id="mycanvasTest3" height="120"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_humidity_2" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_humidity_2'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Temperature Trends (Aisle 3)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_temperature_3" id="export_temperature_3" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="mycanvasTest6" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_temperature_3" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_temperature_3'>
                        </tbody>
                    </table>
                </div>



                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Humidity Trends (Aisle 3)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_humidity_3" id="export_humidity_3" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>

                                <canvas id="mycanvasTest5" height="120"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_humidity_3" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_humidity_3'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Temperature Trends (Aisle 4)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_temperature_4" id="export_temperature_4" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="mycanvasTest8" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_temperature_4" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_temperature_4'>
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Humidity Trends (Aisle 4)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_humidity_4" id="export_humidity_4" value="Export" class="btn btn-info"  style='margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>

                                <canvas id="mycanvasTest7" height="120"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_humidity_4" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Aisle</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_humidity_4'>
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
    let url = `${window.location.href}`

    //humi 1 aisle 1
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_humi_aisle_1.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {

                    var humi1_trends_values = [];
                    var humi1_date_time_values = [];
                    var aisle_name_1 = 'Aisle 1';
                    var device_type_1 = 'Humidity';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels = jsonfile.map(function(e) {
                        humi1_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data = jsonfile.map(function(e) {
                        humi1_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });

                    var table = document.getElementById("table_humidity_1");

                    $("#table_data_humidity_1").empty();

                    for (let i = 1; i < humi1_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_1; 
                        row.insertCell(1).innerHTML = device_type_1;
                        row.insertCell(2).innerHTML = humi1_trends_values[i];
                        row.insertCell(3).innerHTML = humi1_date_time_values[i];
                    }


                    var bat = mycanvasTest1.getContext('2d');
                    let chartStatus24 = Chart.getChart("mycanvasTest1");
                    if (chartStatus24 != undefined) {
                        chartStatus24.destroy();
                    }
                    var humidity_records = {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Humidity (%)',
                                data: data,
                                backgroundColor: 'rgba(0,105,148,0.3)',
                                borderColor: 'rgb(0,105,148,0.5)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels.length).fill(50),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            },]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 100,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart2 = new Chart(bat, humidity_records);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    //temp 1 aisle 1
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_temp_aisle_1.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {

                    var temp1_trends_values = [];
                    var temp1_date_time_values = [];
                    var aisle_name_1 = 'Aisle 1';
                    var device_type_1 = 'Temperature';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels2 = jsonfile.map(function(e) {
                        temp1_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data2 = jsonfile.map(function(e) {
                        temp1_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });

                    var table = document.getElementById("table_temperature_1");

                    $("#table_data_temperature_1").empty();

                    for (let i = 1; i < temp1_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_1; 
                        row.insertCell(1).innerHTML = device_type_1;
                        row.insertCell(2).innerHTML = temp1_trends_values[i];
                        row.insertCell(3).innerHTML = temp1_date_time_values[i];
                    }


                    var bat2 = mycanvasTest2.getContext('2d');
                    let chartStatus22 = Chart.getChart("mycanvasTest2");
                    if (chartStatus22 != undefined) {
                        chartStatus22.destroy();
                    }
                    var temp_records = {
                        type: 'line',
                        data: {
                            labels: labels2,
                            datasets: [{
                                label: 'Temperature (C)',
                                data: data2,
                                backgroundColor: 'rgba(230, 223, 61,0.5)',
                                borderColor: 'rgb(230, 223, 61,0.9)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels2.length).fill(26),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            },  ]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 65,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart2 = new Chart(bat2, temp_records);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    //humi 1 aisle 2
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_humi_aisle_2.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {

                    var humi2_trends_values = [];
                    var humi2_date_time_values = [];
                    var aisle_name_2 = 'Aisle 2';
                    var device_type_2 = 'Humidity';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels3 = jsonfile.map(function(e) {
                        humi2_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data3 = jsonfile.map(function(e) {
                        humi2_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });
                    
                    var table = document.getElementById("table_humidity_2");

                    $("#table_data_humidity_2").empty();

                    for (let i = 1; i < humi2_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_2; 
                        row.insertCell(1).innerHTML = device_type_2;
                        row.insertCell(2).innerHTML = humi2_trends_values[i];
                        row.insertCell(3).innerHTML = humi2_date_time_values[i];
                    }

                    var bat3 = mycanvasTest3.getContext('2d');
                    let chartStatus23 = Chart.getChart("mycanvasTest3");
                    if (chartStatus23 != undefined) {
                        chartStatus23.destroy();
                    }
                    var humidity_records = {
                        type: 'line',
                        data: {
                            labels: labels3,
                            datasets: [{
                                label: 'Humidity (%)',
                                data: data3,
                                backgroundColor: 'rgba(0,105,148,0.3)',
                                borderColor: 'rgb(0,105,148,0.5)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels3.length).fill(50),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            }, ]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 100,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart3 = new Chart(bat3, humidity_records);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    //temp 1 aisle 2
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_temp_aisle_2.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {
                    
                    var temp1_trends_values = [];
                    var temp1_date_time_values = [];
                    var aisle_name_1 = 'Aisle 2';
                    var device_type_1 = 'Temperature';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels4 = jsonfile.map(function(e) {
                        temp1_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data4 = jsonfile.map(function(e) {
                        temp1_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });


                    var table = document.getElementById("table_temperature_2");

                    $("#table_data_temperature_2").empty();

                    for (let i = 1; i < temp1_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_1; 
                        row.insertCell(1).innerHTML = device_type_1;
                        row.insertCell(2).innerHTML = temp1_trends_values[i];
                        row.insertCell(3).innerHTML = temp1_date_time_values[i];
                    }

                    var bat4 = mycanvasTest4.getContext('2d');
                    let chartStatus4 = Chart.getChart("mycanvasTest4");
                    if (chartStatus4 != undefined) {
                        chartStatus4.destroy();
                    }
                    var temp_records = {
                        type: 'line',
                        data: {
                            labels: labels4,
                            datasets: [{
                                label: 'Temperature (C)',
                                data: data4,
                                backgroundColor: 'rgba(230, 223, 61,0.5)',
                                borderColor: 'rgb(230, 223, 61,0.9)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels4.length).fill(26),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            }, ]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 65,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart4 = new Chart(bat4, temp_records);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    //humi 1 aisle 3
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_humi_aisle_3.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {
                    
                    var humi2_trends_values = [];
                    var humi2_date_time_values = [];
                    var aisle_name_2 = 'Aisle 3';
                    var device_type_2 = 'Humidity';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels5 = jsonfile.map(function(e) {
                        humi2_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data5 = jsonfile.map(function(e) {
                        humi2_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });


                    var table = document.getElementById("table_humidity_3");

                    $("#table_data_humidity_3").empty();

                    for (let i = 1; i < humi2_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_2; 
                        row.insertCell(1).innerHTML = device_type_2;
                        row.insertCell(2).innerHTML = humi2_trends_values[i];
                        row.insertCell(3).innerHTML = humi2_date_time_values[i];
                    }

                    var bat5 = mycanvasTest5.getContext('2d');
                    let chartStatus25 = Chart.getChart("mycanvasTest5");
                    if (chartStatus25 != undefined) {
                        chartStatus25.destroy();
                    }
                    var humidity_records = {
                        type: 'line',
                        data: {
                            labels: labels5,
                            datasets: [{
                                label: 'Humidity (%)',
                                data: data5,
                                backgroundColor: 'rgba(0,105,148,0.3)',
                                borderColor: 'rgb(0,105,148,0.5)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels5.length).fill(50),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            }, ]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 100,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart5 = new Chart(bat5, humidity_records);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    //temp 1 aisle 3
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if (from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_temp_aisle_3.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {
                    
                    var temp1_trends_values = [];
                    var temp1_date_time_values = [];
                    var aisle_name_1 = 'Aisle 3';
                    var device_type_1 = 'Temperature';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels6 = jsonfile.map(function(e) {
                        temp1_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data6 = jsonfile.map(function(e) {
                        temp1_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });


                    var table = document.getElementById("table_temperature_3");

                    $("#table_data_temperature_3").empty();

                    for (let i = 1; i < temp1_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_1; 
                        row.insertCell(1).innerHTML = device_type_1;
                        row.insertCell(2).innerHTML = temp1_trends_values[i];
                        row.insertCell(3).innerHTML = temp1_date_time_values[i];
                    }

                    var bat6 = mycanvasTest6.getContext('2d');
                    let chartStatus26 = Chart.getChart("mycanvasTest6");
                    if (chartStatus26 != undefined) {
                        chartStatus26.destroy();
                    }
                    var temp_records = {
                        type: 'line',
                        data: {
                            labels: labels6,
                            datasets: [{
                                label: 'Temperature (C)',
                                data: data6,
                                backgroundColor: 'rgba(230, 223, 61,0.5)',
                                borderColor: 'rgb(230, 223, 61,0.9)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels6.length).fill(26),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            },]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 65,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart6 = new Chart(bat6, temp_records);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });


    //humi 1 aisle 2
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if (from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_humi_aisle_4.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {

                    var humi2_trends_values = [];
                    var humi2_date_time_values = [];
                    var aisle_name_2 = 'Aisle 4';
                    var device_type_2 = 'Humidity';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels7 = jsonfile.map(function(e) {
                        humi2_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data7 = jsonfile.map(function(e) {
                        humi2_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });


                    var table = document.getElementById("table_humidity_4");

                    $("#table_data_humidity_4").empty();

                    for (let i = 1; i < humi2_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_2; 
                        row.insertCell(1).innerHTML = device_type_2;
                        row.insertCell(2).innerHTML = humi2_trends_values[i];
                        row.insertCell(3).innerHTML = humi2_date_time_values[i];
                    }

                    var bat7 = mycanvasTest7.getContext('2d');
                    let chartStatus27 = Chart.getChart("mycanvasTest7");
                    if (chartStatus27 != undefined) {
                        chartStatus27.destroy();
                    }
                    var humidity_records = {
                        type: 'line',
                        data: {
                            labels: labels7,
                            datasets: [{
                                label: 'Humidity (%)',
                                data: data7,
                                backgroundColor: 'rgba(0,105,148,0.3)',
                                borderColor: 'rgb(0,105,148,0.5)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels7.length).fill(50),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            }, ]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 100,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart7 = new Chart(bat7, humidity_records);
                }
            });
        } else {
            //alert("please select date"); 
        }
    });

    //temp 1 aisle 2
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if (from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/lilongwe/reports", "/apis/LL_temp_aisle_4.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {
                    
                    var temp1_trends_values = [];
                    var temp1_date_time_values = [];
                    var aisle_name_1 = 'Aisle 4';
                    var device_type_1 = 'Temperature';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels8 = jsonfile.map(function(e) {
                        temp1_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                    /* var labels = labels.map(function(x) {
                         return x.split(' ')[1];
                     });*/
                    var data8 = jsonfile.map(function(e) {
                        temp1_trends_values.push(e.value / 100);
                        return e.value / 100;
                    });

                    var table = document.getElementById("table_temperature_4");

                    $("#table_data_temperature_4").empty();

                    for (let i = 1; i < temp1_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_1; 
                        row.insertCell(1).innerHTML = device_type_1;
                        row.insertCell(2).innerHTML = temp1_trends_values[i];
                        row.insertCell(3).innerHTML = temp1_date_time_values[i];
                    }


                    var bat8 = mycanvasTest8.getContext('2d');
                    let chartStatus28 = Chart.getChart("mycanvasTest8");
                    if (chartStatus28 != undefined) {
                        chartStatus28.destroy();
                    }
                    var temp_records = {
                        type: 'line',
                        data: {
                            labels: labels8,
                            datasets: [{
                                label: 'Temperature (C)',
                                data: data8,
                                backgroundColor: 'rgba(230, 223, 61,0.5)',
                                borderColor: 'rgb(230, 223, 61,0.9)',
                                fill: true,
                                pointRadius: 0,
                            }, {
                                label: 'Upper Bound',
                                fill: false,
                                pointRadius: 0,
                                data: Array(labels8.length).fill(26),
                                borderColor: 'rgba(255,0,0,1)',
                                borderWidth: 3,
                            },]
                        }, //{
                        //     label: 'overflow',
                        //     fill:false,
                        //       data: hLine,
                        //     backgroundColor: 'rgba(255,0,0,1)',
                        //     borderColor: 'rgba(255,0,0,1)',
                        //         pointRadius:0,
                        // },
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                y: {
                                    max: 65,
                                    min: 0,
                                    ticks: {
                                        stepSize: 5
                                    }
                                },

                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Date'
                                    }

                                }]
                            }
                        }
                    };

                    var chart8 = new Chart(bat8, temp_records);
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
    document.querySelector('#export_humidity_1').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_humidity_1');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 1 Humidity.xlsx');
    });

    // Select the button and bind a click event listener
    document.querySelector('#export_humidity_2').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_humidity_2');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 2 Humidity.xlsx');
    });

        // Select the button and bind a click event listener
        document.querySelector('#export_humidity_3').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_humidity_3');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 3 Humidity.xlsx');
    });

    // Select the button and bind a click event listener
    document.querySelector('#export_humidity_4').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_humidity_4');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 4 Humidity.xlsx');
    });
    



    // Select the button and bind a click event listener
    document.querySelector('#export_temperature_1').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_temperature_1');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 1 Temperature.xlsx');
    });

    // Select the button and bind a click event listener
    document.querySelector('#export_temperature_2').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_temperature_2');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 2 Temperature.xlsx');
    });
        // Select the button and bind a click event listener
        document.querySelector('#export_temperature_3').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_temperature_3');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 3 Temperature.xlsx');
    });

    // Select the button and bind a click event listener
    document.querySelector('#export_temperature_4').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_temperature_4');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Lilongwe DC Aisle 4 Temperature.xlsx');
    });

});
</script>
@endsection