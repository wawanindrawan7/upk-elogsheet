@extends('layouts.index')
@section('section-header')
    DASHBOARD
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <style>
        .modal-backdrop {
            /* bug fix - no overlay */
            display: none;
        }

        .modal {
            /* bug fix - custom overlay */
            background-color: rgba(10, 10, 10, 0.45);
        }
    </style>
@endsection
@section('content')

<div class="modal fade" tabindex="-1" role="dialog" id="cari-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="get" action="{{ url('home-ebt') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Cari</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" id="date" readonly name="date" value="{{ date('Y-m-d') }}"
                            class="form-control datepicker">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primaryt">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Total Kwh Produksi EBT {{ date('d-m-Y', strtotime($date)) }}</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#cari-modal"><i
                                class="fa fa-calendar"></i> Cari</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">PLTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">PLTMH</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="chartdiv" style="width: 100%;height: 500px;"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="gt_chart" style="width: 100%;height: 300px;"></div>
                                </div>
                                <div class="col-md-4">
                                    <div id="ga_chart" style="width: 100%;height: 300px;"></div>
                                </div>
                                <div class="col-md-4">
                                    <div id="gm_chart" style="width: 100%;height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="form-group">
                                <label for="">Parameter</label>
                                <select id="pltmh_param" class="form-control">
                                    <option>Kwh Produksi</option>
                                    <option>Beban</option>
                                </select>
                            </div>
                            <div id="chartdiv_pltmh" style="width: 100%;height: 500px;"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="narmada_chart" style="width: 100%;height: 300px;"></div>
                                </div>
                                <div class="col-md-4">
                                    <div id="pengga_chart" style="width: 100%;height: 300px;"></div>
                                </div>
                                <div class="col-md-4">
                                    <div id="santong_chart" style="width: 100%;height: 300px;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>PLTD AMPENAN</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">UNIT #2 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp2_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp2_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp2_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #3 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp3_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp3_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp3_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #4 NIIGATA</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp4_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp4_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp4_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #5 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp5_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp5_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp5_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #6 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp6_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp6_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp6_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #7 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp7_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp7_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp7_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #8 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp8_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp8_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp8_sfc }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>PLTD PAOKMOTONG</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">UNIT #2 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pm2_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $pm2_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $pm2_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #3 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pm3_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $pm3_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $pm3_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #4 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pm4_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $pm4_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $pm4_sfc }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTMH Narmada</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $narmada_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $narmada_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTMH Pengga</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pengga_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $pengga_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTMH Santong</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $santong_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $santong_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTS Gili Trawangan</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">INVERTER 1</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $gt1_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gt1_kwh_ps }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">INVERTER 2</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $gt2_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gt2_kwh_ps }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">INVERTER 3</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $gt3_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gt3_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTS Gili Air</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">INVERTER 1</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi / Energy Today
                            <span class="badge badge-primary badge-pill">{{ $ga1_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $ga1_kwh_ps }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">INVERTER 2</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi / Energy Today
                            <span class="badge badge-primary badge-pill">{{ $ga2_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $ga2_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTS Gili Meno</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">INVERTER 1</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi / Energy Today
                            <span class="badge badge-primary badge-pill">{{ $gm1_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gm1_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div> --}}
@endsection
@section('js')
<script src="{!! asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
<script src="{!! asset('assets/js/page/bootstrap-modal.js') !!}"></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
        var data_chart = @json($data_chart, JSON_PRETTY_PRINT);
        var gt_data_chart = @json($gt_data_chart, JSON_PRETTY_PRINT);
        var ga_data_chart = @json($ga_data_chart, JSON_PRETTY_PRINT);
        var gm_data_chart = @json($gm_data_chart, JSON_PRETTY_PRINT);
        
        loadGrafik('chartdiv', data_chart,"Energy Today","energy_today", "Grafik Kwh Produksi EBT")
        loadGrafik('gt_chart', gt_data_chart,"Energy Today","energy_today", "Gili Trawangan")
        loadGrafik('ga_chart', ga_data_chart,"Energy Today","energy_today", "Gili Air")
        loadGrafik('gm_chart', gm_data_chart,"Energy Today","energy_today", "Gili Meno")
        
        var pltmh_data_chart = @json($pltmh_data_chart, JSON_PRETTY_PRINT);
        loadGrafik('chartdiv_pltmh', pltmh_data_chart,"Kwh Produksi","kwh_prod", "PLTMH")

        var narmada_data_chart = @json($narmada_data_chart, JSON_PRETTY_PRINT);
        loadGrafik('narmada_chart', narmada_data_chart,"Kwh Produksi","kwh_prod", "PLTMH Narmada")

        var santong_data_chart = @json($santong_data_chart, JSON_PRETTY_PRINT);
        loadGrafik('santong_chart', santong_data_chart,"Kwh Produksi","kwh_prod", "PLTMH Santong")

        var pengga_data_chart = @json($pengga_data_chart, JSON_PRETTY_PRINT);
        loadGrafik('pengga_chart', pengga_data_chart,"Kwh Produksi","kwh_prod", "PLTMH Pengga")

        $(document).on('change','#pltmh_param', function(){
            var param = $(this).val()
            if(param === 'Kwh Produksi'){
                loadGrafik('chartdiv_pltmh', pltmh_data_chart,"Kwh Produksi","kwh_prod", "PLTMH Total Kwh Produksi")
                loadGrafik('narmada_chart', narmada_data_chart,"Kwh Produksi","kwh_prod", "PLTMH Narmada")
                loadGrafik('santong_chart', santong_data_chart,"Kwh Produksi","kwh_prod", "PLTMH Santong")                
                loadGrafik('pengga_chart', pengga_data_chart,"Kwh Produksi","kwh_prod", "PLTMH Pengga")
            }else{
                loadGrafik('chartdiv_pltmh', pltmh_data_chart,"Beban","beban", "PLTMH Total Beban")
                loadGrafik('narmada_chart', narmada_data_chart,"Beban","beban", "PLTMH Narmada")
                loadGrafik('santong_chart', santong_data_chart,"Beban","beban", "PLTMH Santong")
                loadGrafik('pengga_chart', pengga_data_chart,"Beban","beban", "PLTMH Pengga")
            }
            console.log(param)
        })

        function loadGrafik(div, datasoucre,cat,value, title) {
            var dataChart = datasoucre
            console.log(dataChart)
            am4core.ready(function () {
                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end
                // Create chart instance
                var chart = am4core.create(div, am4charts.XYChart);

                chart.data = dataChart;

                // Create category axis
                // var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "jam";
                categoryAxis.renderer.opposite = true;

                // Create value axis
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.renderer.inversed = false;
                valueAxis.title.text = title;
                valueAxis.renderer.minLabelPosition = 0.01;

                // Create series
                var series1 = chart.series.push(new am4charts.LineSeries());
                series1.dataFields.valueY = value;
                series1.dataFields.categoryX = "jam";
                series1.name = cat;
                // series1.bullets.push(new am4charts.CircleBullet());
                series1.tooltipText = "{name} : {valueY}";
                series1.legendSettings.valueText = "{valueY}";
                series1.stroke = am4core.color("#3318F2");
                series1.fill = am4core.color("#4F5771");
                series1.visible = false;
                series1.strokeWidth = 0.5;
                series1.fillOpacity = 0.5;

                

                // Add chart cursor
                chart.cursor = new am4charts.XYCursor();
                chart.cursor.behavior = "zoomX";
                // chart.cursor.behavior = "zoomX";

                let hs1 = series1.segments.template.states.create("hover")
                hs1.properties.strokeWidth = 5;
                series1.segments.template.strokeWidth = 1;

                // let hs2 = series2.segments.template.states.create("hover")
                // hs2.properties.strokeWidth = 5;
                // series2.segments.template.strokeWidth = 1;

                // Add legend
                chart.legend = new am4charts.Legend();
                chart.legend.itemContainers.template.events.on("over", function (event) {
                    var segments = event.target.dataItem.dataContext.segments;
                    segments.each(function (segment) {
                        segment.isHover = true;
                    })
                })

                chart.legend.itemContainers.template.events.on("out", function (event) {
                    var segments = event.target.dataItem.dataContext.segments;
                    segments.each(function (segment) {
                        segment.isHover = false;
                    })
                })

            })
        }

        
    </script>
@endsection
