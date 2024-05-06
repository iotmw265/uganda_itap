@extends('layouts.app')
@section('content')
<style>
    .analytics {
        background-color: #151f2a;
    }
</style>

<div class="row"  style="background-color: #151f2a;margin-left:0px;margin-right:0px; ">
    
</div>

<script>
  function get_name(){
    var x = document.getElementById("selected_site").value;
    document.getElementById("get_name").innerHTML = x;
  }
</script>

<div class="analytics">

<style>
        .wrapper{
            position:relative;
            z-index: 1;
            display: inline-block;
        }

        .hidelogo{
            position: absolute;
            width: 1010px;
            height: 50px;
            background: #333333;
            top: 10px;
            bottom: 10px;
            margin-left:auto;
            margin-right:auto;
            margin-bottom:-60px;

            display: block;
            color: #2a2630;
        }
        .hidelogo2{
            position: absolute;
            width: 1010px;
            height: 48.3px;
            background: #333333;
            bottom: -18px;
            margin-left:auto;
            margin-right:auto;
            margin-bottom:auto;

            display: block;
            color: #2a2630;
        }
        .hidelogo3{
            position: absolute;
            width: 200px;
            height: 210px;
            background: #333333;
            margin-left: 12px;
            bottom: 32px;
            z-index:999;
            display: block;
            color: #fff;
        }
        .hidelogo4{
            position: absolute;
            width: 200px;
            height: 100px;
            background: #333333;
            margin-left: 12px;
            bottom: 502px;
            z-index:999;
            display: block;
            color: #fff;
        }
        .hidelogo5{
            position: absolute;
            width: 1010px;
            height: 10px;
            background: #333333;
            top: 0px;
            bottom: 10px;
            margin-left:auto;
            margin-right:auto;
            margin-bottom:-60px;

            display: block;
            color: #2a2630;
        }
        .hidelogo6{
            position: absolute;
            width: 12px;
            height: 810px;
            background: #333333;
            bottom: 30px;
            z-index:999;
            display: block;
            color: #fff;
        }
        .hidelogo7{
            position: absolute;
            width: 12px;
            height: 810px;
            background: #333333;
            bottom: 30px;
            margin-left: 998px;
            z-index:999;
            display: block;
            color: #fff;
        }
    </style>

    <div class="row">
            <!--div class="col-lg-1">
                    <div class="wrapper wrapper-content" style="background-color: #151f2a;" id="sidebar">
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="ww.www.com"><button class="btn btn-sm btn-warning float-right m-t-n-xs" type="submit"><strong>Analytics</strong></button></a>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="ww.www.com"><button class="btn btn-sm btn-warning float-right m-t-n-xs" type="submit"><strong>Analytics</strong></button></a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="ww.www.com"><button class="btn btn-sm btn-warning float-right m-t-n-xs" type="submit"><strong>Analytics</strong></button></a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="ww.www.com"><button class="btn btn-sm btn-warning float-right m-t-n-xs" type="submit"><strong>Analytics</strong></button></a>
                            </div>
                        </div>
                    </div>
            </div-->

            <div style="width: 100%">

                <!--div class="wrapper wrapper-content" style="background-color: #151f2a;width: 100%;"-->
                <div style="padding: 16px;">
                    <div class="ibox">
                        <div class="ibox-content" style="background-color: #333333">
                                <style>
                                    p{
                                        text-align: center;
                                        color:white;
                                        font-weight: bold;
                                    }
                                    
                                </style>


                                <div class = "row">
                                    <style>
                                        h3{
                                            font-weight: bolder;
                                            color: #fff;
                                            font-size: 20px;
                                        }
                                        h5{
                                            font-weight: bolder;
                                            color: #fff;
                                            font-size: 20px;
                                        }
                                        h6{
                                            color:#f1c608;
                                            font-weight: bolder;
                                          }
                                        .card{
                                            background-color:#333333;
                                            border: 1px solid white;
                                        }
                                        small{
                                            color:#fc424a;
                                            font-weight: bolder;
                                        }
                                    </style>
                                    <div class="col-xl-2 col-sm-6 grid-margin stretch-card">
                                        <div class="card" style="background-color:#333333;">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="d-flex align-items-center align-self-start">
                                                  <h3 class="mb-0">123</h3>
                                                </div>
                                              </div>
                                              
                                            </div>
                                            <h6 class="" >CONTROL MODE</h6>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 grid-margin stretch-card">
                                        <div class="card">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="d-flex align-items-center align-self-start">
                                                  <h3 class="mb-0">1hr</h3>
                                                </div>
                                              </div>
                                            </div>
                                            <h6 class="">GEN RUN HRS.</h6>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 grid-margin stretch-card">
                                        <div class="card">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="d-flex align-items-center align-self-start">
                                                  <h3 class="mb-0">20%<small style="color:white">{{'100 ℓ '}}</small></h3>
                                                </div>
                                              </div>
                                            </div>
                                            <h6 class="">FUEL LEVEL</h6>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 grid-margin stretch-card">
                                        <div class="card">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="d-flex align-items-center align-self-start">
                                                  <h3 class="mb-0">123</h3>
                                                </div>
                                              </div>
                                            </div>
                                            <h6 class="">ENGINE SPEED</h6>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 grid-margin stretch-card">
                                        <div class="card">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="d-flex align-items-center align-self-start">
                                                  <h3 class="mb-0">{{'293 Hz'}}</h3>
                                                </div>
                                              </div>
                                            </div>
                                            <h6 class="">GEN. FREQUENCY</h6>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-6 grid-margin stretch-card">
                                        <div class="card">
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12">
                                                <div class="d-flex align-items-center align-self-start">
                                                  <h3 class="mb-0">{{'2 V'}}</h3>
                                                </div>
                                              </div>
                                            </div>
                                            <h6 class="">BAT BANK VOLT.</h6>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                               

                                <div class="row">
                                    
                                    <div class="col-lg-8">
                                      <div class="ibox">
                                          <div class="ibox-content" style="background-color: #333333">
                                              <p>Fuel Level Trends</p>
                                              <canvas id="myChart"></canvas>
                                          </div>
                                      </div>
                                  </div>

                                    <div class="col-lg-4">
                                        <div class="row">
                                          <div class="col-lg-12">

                                            <div class="row">
                                              <div class="col-lg-6">
                                                <div class="ibox">
                                                  <div class="ibox-content" style="background-color: #333333">
                                                    <p>DC Load</p>
                                                      <div class="row">
                                                        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                                                          <div class="card">
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-12">
                                                                  <div class="d-flex align-items-center align-self-start">
                                                                    <p class="mb-0">{{'1 W'}}</p>
                                                                  </div>
                                                                </div>
                                                                <!--div class="col-3">
                                                                  <div class="icon icon-box-success ">
                                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                                  </div>
                                                                </div-->
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-6 col-md-6">
      
                                                                </div>
                                                              </div>
                                                              <h6 class="">POWER</h6>
                                                            </div>
                                                          </div>
                                                        </div> <br><br><br><br>
                                                        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                                                          <div class="card">
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-12">
                                                                  <div class="d-flex align-items-center align-self-start">
                                                                      <p class="mb-0">{{ 12V'}}</p>
                                                                  </div>
                                                                </div>
                                                                <!--div class="col-3">
                                                                  <div class="icon icon-box-success ">
                                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                                  </div>
                                                                </div-->
                                                              </div>
                                                              <h6 class="">VOLTAGE</h6>
                                                            </div>
                                                          </div>
                                                      </div><br><br><br><br>
                                                      <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                                                        <div class="card">
                                                          <div class="card-body">
                                                            <div class="row">
                                                              <div class="col-12">
                                                                <div class="d-flex align-items-center align-self-start">
                                                                    <p class="mb-0">{{'1 A'}}</p>
                                                                    
                                                                </div>
                                                              </div>
                                                              <!--div class="col-3">
                                                                <div class="icon icon-box-success ">
                                                                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                                </div>
                                                              </div-->
                                                            </div>
                                                            <h6 class="">CURRENT</h6>
                                                          </div>
                                                        </div>
                                                    </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              </div>
                                              <div class="col-lg-6">
                                                <div class="ibox">
                                                  <div class="ibox-content" style="background-color: #333333">
                                                    <p>Other Site Stats</p>
                                                      <div class="row">
                                                        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                                                          <div class="card">
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-12">
                                                                  <div class="d-flex align-items-center align-self-start">
                                                                    <p class="mb-0">---</p>
                                                                       
                                                                  </div>
                                                                </div>
                                                                <!--div class="col-3">
                                                                  <div class="icon icon-box-success ">
                                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                                  </div>
                                                                </div-->
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-6 col-md-6">
      
                                                                </div>
                                                              </div>
                                                              <h6 class="">Last DG Start Date</h6>
                                                            </div>
                                                          </div>
                                                        </div> <br><br><br><br>
                                                        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                                                          <a data-toggle="modal" data-target="#run_table">
                                                          <div class="card">
                                                            <div class="card-body">
                                                              <div class="row">
                                                                <div class="col-12">
                                                                  <div class="d-flex align-items-center align-self-start">
                                                                    <p class="mb-0">hrs</p>
                                                                  </div>
                                                                </div>
                                                                <!--div class="col-3">
                                                                  <div class="icon icon-box-success ">
                                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                                  </div>
                                                                </div-->
                                                              </div>
                                                              <h6 class="">DG Run time(last 7 days)</h6>
                                                              <!--h6 class="">Last DG Start Time</h6-->
                                                            </div>
                                                          </div>
                                                        </a>
                                                      </div><br><br><br><br>
                                                      <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                                                        <div class="card">
                                                          <div class="card-body">
                                                            <div class="row">
                                                              <div class="col-12">
                                                                <div class="d-flex align-items-center align-self-start">
                                                                    <p class="mb-0">{{"N/A"}}</p>
                                                                    
                                                                </div>
                                                              </div>
                                                              <!--div class="col-3">
                                                                <div class="icon icon-box-success ">
                                                                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                                </div>
                                                              </div-->
                                                            </div>
                                                            <h6 class="">Bat Run time(last 7 days)</h6>
                                                          </div>
                                                        </div>
                                                    </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              </div>
                                            </div>

                                            
                                          </div>
                                          <div class="col-lg-12">
                                            <div class="ibox">
                                              <div class="ibox-content" style="background-color: #333333">
                                                <!--p>Alarm(s)</p-->
                                                  <div class="row">
                                                    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                                                      <div class="card">
                                                        <div class="card-body">
                                                          <div class="row">
                                                            <div class="col-12">
                                                              <div class="d-flex align-items-center align-self-start">
                                                                <h3 style="font-size:9pt">{{'as'}}&nbsp;<i class="mdi mdi-alarm"></i></h3>
                                                              </div>
                                                            </div>
                                                            <!--div class="col-3">
                                                              <div class="icon icon-box-success ">
                                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                              </div>
                                                            </div-->
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-sm-6 col-md-6">
  
                                                            </div>
                                                          </div>
                                                          <h6 class="">MAINTENANCE ALARM 1</h6>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                                                      <div class="card">
                                                        <div class="card-body">
                                                          <div class="row">
                                                            <div class="col-12">
                                                              <div class="d-flex align-items-center align-self-start">
                                                                @if($fuel_level < 10) 
                                                                <h3 style="font-size:9pt; color:red;">Low Level<i class="mdi mdi-oil"></i></h3>
                                                                @else
                                                                <h3 style="font-size:9pt">None<i class="mdi mdi-oil"></i></h3>
                                                                @endif 
                                                              </div>
                                                            </div>
                                                            <!--div class="col-3">
                                                              <div class="icon icon-box-success ">
                                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                              </div>
                                                            </div-->
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-sm-6 col-md-6">
  
                                                            </div>
                                                          </div>
                                                          <h6 class="">LOW FUEL LEVEL ALARM</h6>
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

                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="ibox">
                                        <div class="ibox-content" style="background-color: #333333">
                                            <p style="text-align: center">Rectifier Battery Bank Voltage Trends</p>
                                            <canvas id="Accum9" ></canvas>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-lg-6">
                                    <div class="ibox">
                                      <div class="ibox-content" style="background-color: #333333">
                                          <p>Power Source State</p>
                                          <canvas id="Accum10" ></canvas>
                                      </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="ibox">
                                      <!--div class="ibox-content" style="background-color: #333333">
                                          <p>Automated DG Switching Times Due To Low Rectifier Battery Voltage</p>
                                          <canvas id="Accum11"></canvas>
                                      </div-->
                                      <div class="ibox-content" style="background-color: #333333">
                                        <p>DC Load Current Trends</p>
                                        <canvas id="Accum11"></canvas>
                                    </div>
                                  </div>
                                </div>
                                  <div class="col-lg-6">
                                    <div class="ibox">
                                        <div class="ibox-content" style="background-color: #333333">
                                            <p>DC Load Power Trends</p>
                                            <canvas id="Accum12"></canvas>
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
<script>

  var id = document.getElementById("id_1").value;
  
  jQuery(document).ready(function (){
  
      $('#analytics').attr('href', "http://localhost/tnm/public/index?id="+id);
      $('#reports').attr('href', "http://localhost/tnm/public/index_reports?id="+id);
      $('#surveillance').attr('href', "http://localhost/tnm/public/surveillance?id="+id);
      
  
  });
  
  </script>
<!--charts-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script-->
<script src="{{asset('charts/charts.js')}}"></script>
<script>
 var id = document.getElementById("id_1").value;
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Fuel Level(Litres)',
        fill: true,
        lineTension: 0.1,
        pointRadius: 0,
        backgroundColor: "rgb(255,165,0)",
        //borderColor: "rgba(59, 89, 152, 1)",
        pointHoverBorderColor: "rgba(59, 89, 152, 1)",
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "http://localhost/tnm/public/api/chart?id="+id+"",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        myChart.data.labels = data.labels;
        myChart.data.datasets[0].data = data.data;
        myChart.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }

  updateChart();

</script>

<script>
  var id = document.getElementById("id_1").value;
  var ctx = document.getElementById("Accum9");
  var Accum9 = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Battery Voltage(V)',
        fill: true,
        pointRadius: 0,
        backgroundColor: "rgb(193,86,33)",
        //borderColor: "rgba(59, 89, 152, 1)",
        pointHoverBorderColor: "rgba(59, 89, 152, 1)",
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              }
        }],
        yAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              }
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "api/rectifier_volt?id="+id+"",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        Accum9.data.labels = data.labels;
        Accum9.data.datasets[0].data = data.data;
        Accum9.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }

  updateChart();

</script>

<script>
  var id = document.getElementById("id_1").value;
  var ctx = document.getElementById("Accum10");
  var yLabels = { 0 : 'OFF', 1 : 'ON' }
  var Accum10 = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'DG ON',
        fill: true,
        pointRadius: 0,
        backgroundColor: "rgb(193,86,33)",
        borderColor: "rgb(193,86,33)",
        pointHoverBorderColor: "rgb(193,86,33)",
        data: [],
        borderWidth: 1
      },
      {
        label: 'MAINS ON',
        fill: true,
        pointRadius: 0,
        backgroundColor: "rgb(105,255,5)",
        borderColor: "rgb(105,255,5)",
        pointHoverBorderColor: "rgb(105,255,5)",
        data: [],
        borderWidth: 1
      },
      {
        label: 'ON BATTERY',
        fill: true,
        pointRadius: 0,
        backgroundColor: "rgb(255,165,0)",
        borderColor: "rgb(255,165,0)",
        pointHoverBorderColor: "rgb(255,165,0)",
        data: [],
        borderWidth: 1
      }
    ]
    },
    options: {
      scales: {
        xAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              }
        }],
        yAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              },
          ticks:{
              callback: function(value,index,values){
                return yLabels[value];
              }

          }
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "api/power_state?id="+id+"",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        Accum10.data.labels = data.labels;
        Accum10.data.datasets[0].data = data.data;
        Accum10.data.datasets[1].data = data.data2;
        Accum10.data.datasets[2].data = data.data3;
        Accum10.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }

  updateChart();

</script>



<script>
  var id = document.getElementById("id_1").value;
  var ctx = document.getElementById("Accum11");
  var Accum11 = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Current(A)',
        fill: true,
        pointRadius: 0,
        backgroundColor: "rgb(255,165,0)",
        //borderColor: "rgba(59, 89, 152, 1)",
        pointHoverBorderColor: "rgb(255,165,0)",
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              }
        }],
        yAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              }
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "api/rectifier_current?id="+id+"",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        Accum11.data.labels = data.labels;
        Accum11.data.datasets[0].data = data.data;
        Accum11.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }

  updateChart();

</script>


<script>
  var id = document.getElementById("id_1").value;
  var ctx = document.getElementById("Accum12");
  var Accum12 = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Power(W)',
        fill: true,
        pointRadius: 0,
        backgroundColor: "rgb(184,15,10)",
        //borderColor: "rgba(59, 89, 152, 1)",
        pointHoverBorderColor: "rgb(184,15,10)",
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        xAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              }
        }],
        yAxes: [{
          gridLines : {
                  drawBorder: false,
                  display : false
              }
        }]
      }
    }
  });
  var updateChart = function() {
    $.ajax({
      url: "api/rectifier_power?id="+id+"",
      type: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        Accum12.data.labels = data.labels;
        Accum12.data.datasets[0].data = data.data;
        Accum12.update();
      },
      error: function(data){
        console.log(data);
      }
    });
  }

  updateChart();

</script>

<script>
    function show_side(){
        var show = document.getElementById("sidebar");
        show.style.display='block';
    }
</script>

{{-- ChartScript --}}
@endsection
@section('scripts')
@parent


@endsection

