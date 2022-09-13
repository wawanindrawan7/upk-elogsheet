@extends('layouts.index')
@section('section-header')
    DASHBOARD
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik SFC Total PLTD</h4>
                </div>
                <div class="card-body">
                    <div id="chartdiv" style="width: 100%;height: 500px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="chartdiv_amp2" style="width: 100%;height: 300px;"></div>
        </div>
        <div class="col-md-4">
            <div id="chartdiv_amp3" style="width: 100%;height: 300px;"></div>
        </div>
        <div class="col-md-4">
            <div id="chartdiv_amp4" style="width: 100%;height: 300px;"></div>
        </div>
        <div class="col-md-4">
            <div id="chartdiv_amp5" style="width: 100%;height: 300px;"></div>
        </div>
        <div class="col-md-4">
            <div id="chartdiv_amp6" style="width: 100%;height: 300px;"></div>
        </div>
        <div class="col-md-4">
            <div id="chartdiv_amp7" style="width: 100%;height: 300px;"></div>
        </div>
        <div class="col-md-4">
            <div id="chartdiv_amp8" style="width: 100%;height: 300px;"></div>
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
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
        var data_chart = @json($data_chart, JSON_PRETTY_PRINT);
        var data_chart_amp2 = @json($data_chart_amp2, JSON_PRETTY_PRINT);
        var data_chart_amp3 = @json($data_chart_amp3, JSON_PRETTY_PRINT);
        var data_chart_amp4 = @json($data_chart_amp4, JSON_PRETTY_PRINT);
        var data_chart_amp5 = @json($data_chart_amp5, JSON_PRETTY_PRINT);
        var data_chart_amp6 = @json($data_chart_amp6, JSON_PRETTY_PRINT);
        var data_chart_amp7 = @json($data_chart_amp7, JSON_PRETTY_PRINT);
        var data_chart_amp8 = @json($data_chart_amp8, JSON_PRETTY_PRINT);

        loadGrafik('chartdiv', data_chart, "Grafik SFC PLTD {{ $date }}")
        loadGrafik('chartdiv_amp2', data_chart_amp2, "Grafik SFC PLTD AMP #2 {{ $date }}")
        loadGrafik('chartdiv_amp3', data_chart_amp3, "Grafik SFC PLTD AMP #3 {{ $date }}")
        loadGrafik('chartdiv_amp4', data_chart_amp4, "Grafik SFC PLTD AMP #4 {{ $date }}")
        loadGrafik('chartdiv_amp5', data_chart_amp5, "Grafik SFC PLTD AMP #5 {{ $date }}")
        loadGrafik('chartdiv_amp6', data_chart_amp6, "Grafik SFC PLTD AMP #6 {{ $date }}")
        loadGrafik('chartdiv_amp7', data_chart_amp7, "Grafik SFC PLTD AMP #7 {{ $date }}")
        loadGrafik('chartdiv_amp8', data_chart_amp8, "Grafik SFC PLTD AMP #8 {{ $date }}")
        

        function loadGrafik(div, datasoucre, title) {
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
                series1.dataFields.valueY = "sfc";
                series1.dataFields.categoryX = "jam";
                series1.name = "SFC";
                series1.tooltipText = "{name} : {valueY}";
                series1.legendSettings.valueText = "{valueY}";
                series1.stroke = am4core.color("#3318F2");
                series1.fill = am4core.color("#4F5771");
                series1.visible = false;
                series1.strokeWidth = 2;
                // series1.fillOpacity = 0.5;

                

                // Add chart cursor
                chart.cursor = new am4charts.XYCursor();
                chart.cursor.behavior = "zoomY";

                let hs1 = series1.segments.template.states.create("hover")
                hs1.properties.strokeWidth = 5;
                series1.segments.template.strokeWidth = 1;

               

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
