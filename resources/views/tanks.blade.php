@extends('layouts.app')

@section('title', 'Technicals')

@section('content')

<style>
.contact-box{
    border:0px;  
}  

</style>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Water Level Trends</h2>
                  <ol class="breadcrumb">
                  
                  <li class="active">
                            <strong> </strong>   
                  </li>
                  </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="row">
    <div class="ibox float-e-margins" style="margin:0px;">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-2"></div>
                                    
                <div class="col-lg-1"></div>
                <div class="col-lg-2">
                                        <div class="form-group" id="data_1">
                                            <label class="font-normal">Select From Date</label>
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control"  id="from_date" value=" <?= date("m/d/Y") ?>"> 
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                </div>

                <div class="col-lg-2">
                                        <div class="form-group" id="data_1">
                                            <label class="font-normal">Select To Date</label>
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control"  id="to_date" value=" <?= date("m/d/Y") ?>"> 
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                </div> 
                <div class="col-lg-2">
                             <div class="form-group" id="data_1">
                                            <label class="font-normal" style="color:white" ></label>
                                            <div class="input-group">
                                               
                                      <input type="button" name="filter" id="filter" value="plot" class="btn btn-info" />      

                                            </div>
                                        </div>                      
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>


<div class="col-lg-12 " style="background-color:white !important;">
    <div class="col-lg-1"></div>
    <div class=" col-lg-10 wrapper wrapper-content animated fadeInRight" style="padding:0px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>
                                    Water Levels for Laboratory Tank
                                    <!--small>With custom colors.</small-->
                                </h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="mycanvasTest1" height="140"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>
                                    Water Levels for LTC Tank 
                                    <!--small>With custom colors.</small-->
                                </h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    
                                    <canvas id="mycanvasTest2" height="120"></canvas> 
                                </div>
                            </div>
                        </div>
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

        <script>

        $(document).ready(function(){  
           $('#filter').click(function(){                 
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val(); 
               /*  var tank_id = $('#tank_id').val();  */
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                        url: url.replace("/tanks", "/public/apis/WaterLab.php"),
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                            var jsonfile=JSON.parse(data);
           // alert(data.length);
            //alert(jsonfile);
            var labels = jsonfile.map(function(e) {
                return e.ExactTime;
             });

             //remove the date from the returned part
             var labels= labels.map(function(x){return x.split(' ')[1];});
             var data = jsonfile.map(function(e) {
                return e.Waterlevel /25;
             });;
             var data= data.map(function(x){return x /100;});
            // alert(data);
            var data2 = jsonfile.map(function(e) {
                return e.WaterLevel /25;
             });;

             var overflow = 1;
                


             var bat = mycanvasTest1.getContext('2d');
             let chartStatus24 = Chart.getChart("mycanvasTest1");
            if (chartStatus24 != undefined) {
                chartStatus24.destroy();
            }
             var batdata = {
                type: 'line',
                data: {
                   labels: labels,
                   datasets: [{
                      label: 'Tank Water Levels (metres)',
                      data: data2,
                      backgroundColor: 'rgba(0,105,148,0.3)',
                        borderColor: 'rgb(0,105,148,0.5)',
                        fill: true,
                        pointRadius:0,
                   }]
                 },//{
                //     label: 'overflow',
                //     fill:false,
                //       data: hLine,
                //     backgroundColor: 'rgba(255,0,0,1)',
                //     borderColor: 'rgba(255,0,0,1)',
                //         pointRadius:0,
                // },
                options:{
                    legend:{
                     display:true
                    },
                    scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: '',
                                    },
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: ''
                                    },
                                    scaleLabel: { display: !0 },
                                    min: 0,
                                    max: 0.72,
                                    ticks: { stepSize: 0.1 },
                                }
                            },
                            }
                            };

                            var chart2 = new Chart(bat, batdata);  
                                        }  
                                    });  
                                }  
                                else  
                                {  
                                    //alert("please select date"); 
                                }  
                        });  
                                                
                    });  

</script>

<script>
        let url = `${window.location.href}`
        $(document).ready(function(){  
           $('#filter').click(function(){                 
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val(); 
               /*  var tank_id = $('#tank_id').val();  */
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                        url: url.replace("/tanks", "/public/apis/WaterLTC.php"),
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                            var jsonfile=JSON.parse(data);
           // alert(data.length);
            //alert(jsonfile);
            var labels = jsonfile.map(function(e) {
                return e.ExactTime;
             });

             //remove the date from the returned part
             var labels= labels.map(function(x){return x.split(' ')[1];});
             var data = jsonfile.map(function(e) {
                return e.Waterlevel /25;
             });;
             
             var data= data.map(function(x){return x /100;});
            // alert(data);
            var data2 = jsonfile.map(function(e) {
                return e.WaterLevel /25;
             });;
                 


             var bat = mycanvasTest2.getContext('2d');
             let chartStatus24 = Chart.getChart("mycanvasTest2");
            if (chartStatus24 != undefined) {
                chartStatus24.destroy();
            }
             var batdata = {
                type: 'line',
                data: {
                   labels: labels,
                   datasets: [{
                      label: 'Tank Water Levels (metres)',
                      data: data2,
                      backgroundColor: 'rgba(0,105,148,0.3)',
                        borderColor: 'rgb(0,105,148,0.5)',
                        fill: true,
                        pointRadius:0,
                   }]
                },
                options:{
                    legend:{
                     display:true
                    },
                    scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: '',
                                    },
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: ''
                                    },
                                    scaleLabel: { display: !0 },
                                    min: 0,
                                    max: 1.9,
                                    ticks: { stepSize: 0.1 },
                                }
                            },
                            }
                            };

                            var chart2 = new Chart(bat, batdata);  
                                        }  
                                    });  
                                }  
                                else  
                                {  
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


@endsection