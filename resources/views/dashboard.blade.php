@extends('layouts.master', ['active' => 'dashboard'])

@section('title','LRI | Dashboard')

@section('header_page')
    <h1>
        Dashboard
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@section('content')
  <div class="row" style="padding-bottom: 30px">
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
           <div class="small-box bg-aqua">
                <div class="inner">
                   <h3>{{$membres}}</h3>
                   <p>Membres</p>
                </div>
            <div class="icon">
            <i class="ion-person"></i>
            </div>
           <a href="{{url('membres')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                              <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <h3>{{$equipes}}<sup style="font-size: 20px"></sup></h3>
               <p>Equipes</p>
            </div>
            <div class="icon">
               <i class="ion-ios-people"></i>
            </div>
            <a href="{{url('equipes')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
           <div class="small-box bg-yellow">
              <div class="inner">
                 <h3>{{$theses}}</h3>
                 <p>Thèses en cours</p>
              </div>
              <div class="icon">
               <i class="fa fa-clipboard"></i>
              </div>
              <a href="{{url('theses')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$articles}}</h3>

              <p>Articles</p>
            </div>
            <div class="icon">
              <i class="ion-ios-paper"></i>
            </div>
            <a href="{{url('articles')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                          <!-- ./col -->
  </div>
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Thèses/Articles</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="barChart" style="height:230px"></canvas>
      </div>
    </div>
            <!-- /.box-body -->
  </div>

@endsection

@push('scripts.footer')
  
  <script>


    $(function () {


      $.ajax({
        type: 'get',
        url: '/statistics',
        success: function (data, status) {
          console.log(data.annee);
          //areaChartData.labels = data.res;
          var areaChartData = {
            labels: data.annee,
            datasets: [
              {
                label: 'Electronics',
                fillColor: 'rgba(210, 214, 222, 1)',
                strokeColor: 'rgba(210, 214, 222, 1)',
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: data.these
              },
              {
                label: 'Digital Goods',
                fillColor: 'rgba(60,141,188,0.9)',
                strokeColor: 'rgba(60,141,188,0.8)',
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: data.article
              }
            ]
          }


          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChart = new Chart(barChartCanvas)
          var barChartData = areaChartData
          barChartData.datasets[1].fillColor = '#00a65a'
          barChartData.datasets[1].strokeColor = '#00a65a'
          barChartData.datasets[1].pointColor = '#00a65a'
          var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
              //Boolean - whether to make the chart responsive
              responsive              : true,
              maintainAspectRatio     : true
            }

            barChartOptions.datasetFill = false
            barChart.Bar(barChartData, barChartOptions)
    }
  });

  })
  </script>
@endpush