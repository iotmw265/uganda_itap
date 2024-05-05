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

<div class="row wrapper border-bottom page-heading" style='background-color: #e7313f;' >
    <div class="col-lg-10">
        <h2 style='color:#ffffff;'><strong>Reports - Headquarters Data Center</strong></h2>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="ibox float-e-margins" style="margin:0px;">
        <div class="ibox-content" style='background-color: #f0f0f0 !important;'>
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
                        <label class="font-normal" style='color: #e7313f '><strong>Select From Date</strong></label>
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
                        <label class="font-normal"  style='color: #e7313f '><strong>Select To Date</strong></label>
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

                            <input type="button" name="filter" id="filter" value="Generate" style='background-color: #e7313f !important; border-color: #e7313f' class="btn btn-info" />
                            <!--input type="button" id="downloadExcel" value="Export" class="btn btn-info" style='margin-left:20px;' formaction="toexcel.php" /-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 " style="background-color:#f0f0f0 !important;">
        <div class="col-lg-1"></div>
        <div class=" col-lg-10 wrapper wrapper-content animated fadeInRight" style="padding:0px;">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style='margin-top:10px'>
                                Temperature Trends (NBS Coms. Rack)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_temperature_1" id="export_temperature_1" value="Export" class="btn btn-info"  style='background-color: #244183 !important; border-color: #244183;margin-left:10px'/>
                        </div>
                        <div class="ibox-content">
                            <div>

                                <canvas id="mycanvasTest2" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_temperature_1" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Rack Name</th>
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
                                Humidity Trends (NBS Coms. Rack)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_humidity_1" id="export_humidity_1" value="Export" class="btn btn-info"  style='margin-left:10px;background-color: #244183 !important; border-color: #244183;'/>
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
                                    <th>Rack Name</th>
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
                                Temperature Trends (NICO Tech 2)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_temperature_2" id="export_temperature_2" value="Export" class="btn btn-info"  style='margin-left:10px;background-color: #244183 !important; border-color: #244183;'/>
                        </div>
                        <div class="ibox-content">
                            <div>

                                <canvas id="mycanvasTest3" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_temperature_2" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Rack Name</th>
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
                                Humidity Trends (NICO Tech 2)
                                <!--small>With custom colors.</small-->
                            </h5>
                            <input type="button" name="export_humidity_2" id="export_humidity_2" value="Export" class="btn btn-info"  style='margin-left:10px;background-color: #244183 !important; border-color: #244183;'/>
                        </div>
                        <div class="ibox-content">
                            <div>

                                <canvas id="mycanvasTest4" height="140"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" >
                    <table id="table_humidity_2" style="display: none;">
                        <thead>
                                <tr>
                                    <th>Rack Name</th>
                                    <th>Reading type</th>
                                    <th>Values</th>
                                    <th>Date Posted </th>
                                </tr>
                        </thead>
                        <tbody id='table_data_humidity_2'>
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
<script src="{{asset('public/js/table2excel.js')}}" ></script>

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{!! asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') !!}"></script>

<script>
$(document).ready(function() {
    
let url = `${window.location.href}`
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("data_centre_monitoring/reports", "/apis/environmental_api/nbs_coms_rack_humi.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {

                    var humi1_trends_values = [];
                    var humi1_date_time_values = [];
                    var aisle_name_1 = 'NBS Coms. Rack';
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
                        humi1_trends_values.push(e.value / 10);
                        return e.value / 10;
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
                            },
                            {
                             label: 'Upper Bound',
                             fill:false,
                             pointRadius:0,
                               data: Array(labels.length).fill(50),
                             borderColor: 'rgba(255,0,0,1)',
                             borderWidth: 3,
                            }]
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
                                        max: 90,
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

    
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("data_centre_monitoring/reports", "/apis/environmental_api/nbs_coms_rack_temp.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {

                    var temp1_trends_values = [];
                    var temp1_date_time_values = [];
                    var aisle_name_1 = 'NBS Coms. Rack';
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
                        temp1_trends_values.push(e.value / 10);
                        return e.value / 10;
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
                            },{
                             label: 'Upper Bound',
                             fill:false,
                             pointRadius:0,
                               data: Array(labels2.length).fill(30),
                             borderColor: 'rgba(255,0,0,1)',
                             borderWidth: 3,
                         }]
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
                                        max: 60,
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

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("data_centre_monitoring/reports", "/apis/environmental_api/nico_tech_2_temp.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {
                    var temp2_trends_values = [];
                    var temp2_date_time_values = [];
                    var aisle_name_2 = 'NICO Tech 2';
                    var device_type_2 = 'Temperature';

                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels3 = jsonfile.map(function(e) {
                        temp2_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data3 = jsonfile.map(function(e) {
                        temp2_trends_values.push(e.value / 10);
                        return e.value / 10;
                    });

                    var table = document.getElementById("table_temperature_2");

                    $("#table_data_temperature_2").empty();

                    for (let i = 1; i < temp2_trends_values.length; i++) {

                        var row = table.insertRow(i);
                        /*var tankName = row.insertCell(0);
                        var waterLevel = row.insertCell(1);
                        var fuelLevel = row.insertCell(2);
                        var dateTime = row.insertCell(3);*/

                        row.insertCell(0).innerHTML = aisle_name_2; 
                        row.insertCell(1).innerHTML = device_type_2;
                        row.insertCell(2).innerHTML = temp2_trends_values[i];
                        row.insertCell(3).innerHTML = temp2_date_time_values[i];
                    }

                    var bat3 = mycanvasTest3.getContext('2d');
                    let chartStatus23 = Chart.getChart("mycanvasTest3");
                    if (chartStatus23 != undefined) {
                        chartStatus23.destroy();
                    }
                    var temp_records = {
                        type: 'line',
                        data: {
                            labels: labels3,
                            datasets: [{
                                label: 'Temperature (C)',
                                data: data3,
                                backgroundColor: 'rgba(230, 223, 61,0.5)',
                                borderColor: 'rgb(230, 223, 61,0.9)',
                                fill: true,
                                pointRadius: 0,
                            },{
                             label: 'Upper Bound',
                             fill:false,
                             pointRadius:0,
                               data: Array(labels3.length).fill(30),
                             borderColor: 'rgba(255,0,0,1)',
                             borderWidth: 3,
                         }]
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
                                        max: 60,
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

                    var chart3 = new Chart(bat3, temp_records);
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
                url: url.replace("data_centre_monitoring/reports", "/apis/environmental_api/nico_tech_2_humi.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    
                },
                success: function(data) {

                    
                    var humi2_trends_values = [];
                    var humi2_date_time_values = [];
                    var aisle_name_2 = 'NICO Tech 2';
                    var device_type_2 = 'Humidity';


                    var jsonfile = JSON.parse(data);
                    // alert(data.length);
                    //alert(jsonfile);
                    var labels4 = jsonfile.map(function(e) {
                        humi2_date_time_values.push(e.created_at);
                        return e.created_at;
                    });

                    //remove the date from the returned part
                   /* var labels = labels.map(function(x) {
                        return x.split(' ')[1];
                    });*/
                    var data4 = jsonfile.map(function(e) {
                        humi2_trends_values.push(e.value / 10);
                        return e.value / 10;
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

                    var bat4 = mycanvasTest4.getContext('2d');
                    let chartStatus4 = Chart.getChart("mycanvasTest4");
                    if (chartStatus4 != undefined) {
                        chartStatus4.destroy();
                    }
                    var humidity_records = {
                        type: 'line',
                        data: {
                            labels: labels4,
                            datasets: [{
                                label: 'Humidity (%)',
                                data: data4,
                                backgroundColor: 'rgba(0,105,148,0.3)',
                                borderColor: 'rgb(0,105,148,0.5)',
                                fill: true,
                                pointRadius: 0,
                            },{
                             label: 'Upper Bound',
                             fill:false,
                             pointRadius:0,
                               data: Array(labels4.length).fill(50),
                             borderColor: 'rgba(255,0,0,1)',
                             borderWidth: 3,
                         }]
                        }, 
                        options: {
                            legend: {
                                display: true
                            },
                            scales: {
                                    y: {
                                        max: 90,
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

                    var chart4 = new Chart(bat4, humidity_records);
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
        XLSX.writeFile(wb, 'Humidity Trends (NBS Coms. Rack).xlsx');
    });

    // Select the button and bind a click event listener
    document.querySelector('#export_humidity_2').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_humidity_2');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Humidity Trends (NICO Tech 2).xlsx');
    });

    
    // Select the button and bind a click event listener
    document.querySelector('#export_temperature_1').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_temperature_1');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Temperature Trends (NBS Coms. Rack).xlsx');
    });

    // Select the button and bind a click event listener
    document.querySelector('#export_temperature_2').addEventListener('click', function() {
        // Select the table element
        var table = document.querySelector('#table_temperature_2');

        // Create a new Workbook object
        var wb = XLSX.utils.table_to_book(table, { raw: true });

        // Trigger the download
        XLSX.writeFile(wb, 'Temperature Trends (NICO Tech 2).xlsx');
    });

});
</script>


@endsection