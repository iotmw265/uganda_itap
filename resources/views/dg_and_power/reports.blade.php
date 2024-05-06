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

<div class="row wrapper border-bottom page-heading" style='background-color: #1E73BE;' >
    <div class="col-lg-10">
        <h2 style='color: #ffffff;'><strong>Reports - UPS Power State</strong></h2>
    </div>
    <div class="col-lg-2"></div>
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

    console.log('ready')
    
    
    let url = `${window.location.href}`
    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if ( from_date != '' && to_date != '') {
            $.ajax({
                url: url.replace("/power_states/reports", "/apis/power_state_api/nbs_cyber_backup_ups_1.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'NBS Cyber Backup';
                    var power_source = 'UPS 1';
                    
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
                        if (e.nbs_cyber_backup_phase_1 == 1){
                            e.nbs_cyber_backup_phase_1 = 'On'
                            console.log(e.nbs_cyber_backup_phase_1);
                        }else{
                            e.nbs_cyber_backup_phase_1 = 'Off';
                        }
                        power_state.push(e.nbs_cyber_backup_phase_1 );
                        return e.nbs_cyber_backup_phase_1;
                    });

                    var table = document.getElementById("nbs_cyber_backup_ups_1_table");

                    $("#nbs_cyber_backup_ups_1_table_data").empty();

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
                        var bat1 = nbs_cyber_backup_ups_1_graph.getContext('2d');
                        let chartStatus1 = Chart.getChart("nbs_cyber_backup_ups_1_graph");
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
                url: url.replace("/power_states/reports", "/apis/power_state_api/nbs_cyber_backup_ups_2.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {
                    
                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'NBS Cyber Backup';
                    var power_source = 'UPS 2';

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
                        if (e.nbs_cyber_backup_phase_2 == 1){
                            e.nbs_cyber_backup_phase_2_state = 'On'
                        }else{
                            e.nbs_cyber_backup_phase_2_state = 'Off';
                        }
                        power_state.push(e.nbs_cyber_backup_phase_2_state );
                        return e.nbs_cyber_backup_phase_2;
                    });


                    var table = document.getElementById("nbs_cyber_backup_ups_2_table");

                    $("#nbs_cyber_backup_ups_2_table_data").empty();

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
                        var bat2 = nbs_cyber_backup_ups_2_graph.getContext('2d');
                        let chartStatus2 = Chart.getChart("nbs_cyber_backup_ups_2_graph");
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
                url: url.replace("/power_states/reports", "/apis/power_state_api/nbs_coms_rack_ups_1.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {
                    
                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'NBS Coms. Rack';
                    var power_source = 'UPS 1';

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
                        if (e.nbs_cyber_backup_phase_2 == 1){
                            e.nbs_cyber_backup_phase_2_state = 'On'
                        }else{
                            e.nbs_cyber_backup_phase_2_state = 'Off';
                        }
                        power_state.push(e.nbs_cyber_backup_phase_2_state );
                        return e.nbs_cyber_backup_phase_2;
                    });


                    var table = document.getElementById("nbs_coms_rack_ups_1_table");

                    $("#nbs_coms_rack_ups_1_table_data").empty();

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
                        var bat3 = nbs_coms_rack_ups_1_graph.getContext('2d');
                        let chartStatus3 = Chart.getChart("nbs_coms_rack_ups_1_graph");
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
                url: url.replace("/power_states/reports", "/apis/power_state_api/nbs_coms_rack_ups_2.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'NBS Coms. Rack';
                    var power_source = 'UPS 2';

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
                        if (e.nico_tech_1_ups_phase_2 == 1){
                            e.nico_tech_1_ups_phase_2_state = 'On'
                        }else{
                            e.nico_tech_1_ups_phase_2_state = 'Off';
                        }
                        power_state.push(e.nico_tech_1_ups_phase_2_state );
                        return e.nico_tech_1_ups_phase_2;
                    });

                    var table = document.getElementById("nbs_coms_rack_ups_2_table");

                    $("#nbs_coms_rack_ups_2_table_data").empty();

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
                        var bat4 = nbs_coms_rack_ups_2_graph.getContext('2d');
                        let chartStatus4 = Chart.getChart("nbs_coms_rack_ups_2_graph");
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
                url: url.replace("/power_states/reports", "/apis/power_state_api/nico_tech_2_ups_1.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'NICO Tech 2';
                    var power_source = 'UPS 1';
                    
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
                        if (e.nico_tech_2_ups_phase_1 == 1){
                            e.nico_tech_2_ups_phase_1_state = 'On'
                        }else{
                            e.nico_tech_2_ups_phase_1_state = 'Off';
                        }
                        power_state.push(e.nico_tech_2_ups_phase_1_state );
                        return e.nico_tech_2_ups_phase_1;
                    });

                    var table = document.getElementById("nico_tech_2_ups_1_table");

                    $("#nico_tech_2_ups_1_table_data").empty();

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
                        var bat5 = nico_tech_2_ups_1_graph.getContext('2d');
                        let chartStatus5 = Chart.getChart("nico_tech_2_ups_1_graph");
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
                url: url.replace("/power_states/reports", "/apis/power_state_api/nico_tech_2_ups_2.php"),
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },

                
                success: function(data) {

                    var power_state = [];
                    var date_time_values = [];
                    var data_center_name = 'NICO Tech 2';
                    var power_source = 'UPS 2';
                    
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
                        if (e.nico_tech_2_ups_phase_2 == 1){
                            e.nico_tech_2_ups_phase_2_state = 'On'
                        }else{
                            e.nico_tech_2_ups_phase_2_state = 'Off';
                        }
                        power_state.push(e.nico_tech_2_ups_phase_2_state );
                        return e.nico_tech_2_ups_phase_2;
                    });


                    var table = document.getElementById("nico_tech_2_ups_2_table");

                    $("#nico_tech_2_ups_2_table_data").empty();

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
                        var bat6 = nico_tech_2_ups_2_graph.getContext('2d');
                        let chartStatus6 = Chart.getChart("nico_tech_2_ups_2_graph");
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

                        
                            var chart6 = new Chart(bat6, bt_trends6);
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
            document.querySelector('#nbs_cyber_backup_ups_1').addEventListener('click', function() {
                // Select the table element
                var table = document.querySelector('#nbs_cyber_backup_ups_1_table');

                // Create a new Workbook object
                var wb = XLSX.utils.table_to_book(table, { raw: true });

                // Trigger the download
                XLSX.writeFile(wb, 'NBS Coms. Rack (UPS 1).xlsx');
            });

            // Select the button and bind a click event listener
            document.querySelector('#nbs_cyber_backup_ups_2').addEventListener('click', function() {
                // Select the table element
                var table = document.querySelector('#nbs_cyber_backup_ups_2_table');

                // Create a new Workbook object
                var wb = XLSX.utils.table_to_book(table, { raw: true });

                // Trigger the download
                XLSX.writeFile(wb, 'NBS Coms. Rack (UPS 2).xlsx');
            });

            
            // Select the button and bind a click event listener
            document.querySelector('#nbs_coms_rack_ups_1').addEventListener('click', function() {
                // Select the table element
                var table = document.querySelector('#nbs_coms_rack_ups_1_table');

                // Create a new Workbook object
                var wb = XLSX.utils.table_to_book(table, { raw: true });

                // Trigger the download
                XLSX.writeFile(wb, 'NICO Tech 1 (UPS 1).xlsx');
            });

            // Select the button and bind a click event listener
            document.querySelector('#nbs_coms_rack_ups_2').addEventListener('click', function() {
                    // Select the table element
                    var table = document.querySelector('#nbs_coms_rack_ups_2_table');
            
                    // Create a new Workbook object
                    var wb = XLSX.utils.table_to_book(table, { raw: true });
            
                    // Trigger the download
                    XLSX.writeFile(wb, 'NICO C (UPS 2).xlsx');
            });

        
            // Select the button and bind a click event listener
            document.querySelector('#nico_tech_2_ups_1').addEventListener('click', function() {
                // Select the table element
                var table = document.querySelector('#nico_tech_2_ups_1_table');

                // Create a new Workbook object
                var wb = XLSX.utils.table_to_book(table, { raw: true });

                // Trigger the download
                XLSX.writeFile(wb, 'NICO Tech 2 (UPS 1).xlsx');
            });

            // Select the button and bind a click event listener
            document.querySelector('#nico_tech_2_ups_2').addEventListener('click', function() {
                    // Select the table element
                    var table = document.querySelector('#nico_tech_2_ups_2_table');
            
                    // Create a new Workbook object
                    var wb = XLSX.utils.table_to_book(table, { raw: true });
            
                    // Trigger the download
                    XLSX.writeFile(wb, 'NICO Tech 2 (UPS 2).xlsx');
            });  

    });

</script>

@endsection