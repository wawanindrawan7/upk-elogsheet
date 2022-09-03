@extends('layouts.index')
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

    #chart_pm_2,
    #chart_pm_3,
    #chart_pm_4,
    {
        width: 100%;
        height: 500px;
    }

</style>
@endsection
@section('section-header')
PLTD PAOK MOTONG
@endsection
@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>LOGSHEET PER UNIT</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active show" id="list-2-list"
                                data-toggle="list" href="#list-2" role="tab" aria-selected="false">Unit #2</a>
                            <a class="list-group-item list-group-item-action" id="list-3-list" data-toggle="list"
                                href="#list-3" role="tab" aria-selected="false">Unit #3</a>
                            <a class="list-group-item list-group-item-action" id="list-4-list" data-toggle="list"
                                href="#list-4" role="tab" aria-selected="false">Unit #4</a>
                            <a class="list-group-item list-group-item-action" id="list-ogf-list" data-toggle="list"
                                href="#list-ogf" role="tab">Out Going Feeder</a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="list-2" role="tabpanel"
                                aria-labelledby="list-home-list">
                                <div class="wizard-steps">
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('pltd-pm/zv/eng-log?unit_id=1') }}" class="text-white">ZV
                                                EGNINE LOGS</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('pltd-pm/zv/gen-log?unit_id=1') }}" class="text-white">ZV
                                                GENERATOR LOGS</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-file-excel"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="#" class="btn-export" data-cat="zv" data-unit_id="1"
                                                style="color: white;">EXPORT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="height: 500px;" id="chart_pm_2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-profile-list">
                                <div class="wizard-steps">
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('pltd-pm/zv/gen-log?unit_id=2') }}" class="text-white">ZV
                                                EGNINE LOGS</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('pltd-pm/zv/gen-log?unit_id=2') }}" class="text-white">ZV
                                                GENERATOR LOGS</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-file-excel"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="#" class="btn-export" data-cat="zv" data-unit_id="2"
                                                style="color: white;">EXPORT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="height: 500px;" id="chart_pm_3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-profile-list">
                                <div class="wizard-steps">
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('pltd-pm/zv/gen-log?unit_id=3') }}" class="text-white">ZV
                                                EGNINE LOGS</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('pltd-pm/zv/gen-log?unit_id=3') }}" class="text-white">ZV
                                                GENERATOR LOGS</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-file-excel"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="#" class="btn-export" data-cat="zv" data-unit_id="2"
                                                style="color: white;">EXPORT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="height: 500px;" id="chart_pm_4"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-ogf" role="tabpanel"
                                aria-labelledby="list-settings-list">
                                <div class="wizard-steps">
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('pltd-pm/ogf?unit_id=4') }}" class="text-white">OUT
                                                GOING FEEDER LOGSHEET</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-file-excel"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="#" class="btn-export" data-unit_id="3" data-cat="ogf"
                                                style="color: white;">EXPORT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>PLTD PAOKMOTONG RESUME</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
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
                    </div>
                    <div class="col-md-4">
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
                    </div>
                    <div class="col-md-4">

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
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="export-modal">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="cat" id="cat">
                <input type="hidden" id="unit_id" name="unit_id">
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" id="date" readonly name="date" value="{{ date('Y-m-d') }}"
                        class="form-control datepicker">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-submit-export">Export</button>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
<script src="{!! asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
<script src="{!! asset('assets/js/page/bootstrap-modal.js') !!}"></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>

    var pm2_data_chart = @json($pm2_data_chart, JSON_PRETTY_PRINT);
    var pm3_data_chart = @json($pm3_data_chart, JSON_PRETTY_PRINT);
    var pm4_data_chart = @json($pm4_data_chart, JSON_PRETTY_PRINT);

    loadGrafik('chart_pm_2', pm2_data_chart, 'Grafik SFC UNIT #2')
    loadGrafik('chart_pm_3', pm3_data_chart, 'Grafik SFC UNIT #3')
    loadGrafik('chart_pm_4', pm4_data_chart, 'Grafik SFC UNIT #4')

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
            series1.bullets.push(new am4charts.CircleBullet());
            series1.tooltipText = "{name} : {valueY}";
            series1.legendSettings.valueText = "{valueY}";
            series1.stroke = am4core.color("#3318F2");
            series1.fill = am4core.color("#3318F2");
            series1.visible = false;

            // Create series
            var series2 = chart.series.push(new am4charts.LineSeries());
            series2.dataFields.valueY = "kwh_prod";
            series2.dataFields.categoryX = "jam";
            series2.name = "kwh Produksi";
            series2.bullets.push(new am4charts.CircleBullet());
            series2.stroke = am4core.color("#28A745");
            series2.fill = am4core.color("#28A745");
            series2.tooltipText = "{name} : {valueY}";
            series2.legendSettings.valueText = "{valueY}";
            series2.visible = false;

            // Create series
            var series3 = chart.series.push(new am4charts.LineSeries());
            series3.dataFields.valueY = "pemakaian";
            series3.dataFields.categoryX = "jam";
            series3.name = "Pemakaian";
            series3.bullets.push(new am4charts.CircleBullet());
            series3.stroke = am4core.color("#6F6967");
            series3.fill = am4core.color("#6F6967");
            series3.tooltipText = "{name} : {valueY}%";
            series3.legendSettings.valueText = "{valueY}%";
            series3.visible = false;

            // Create series
            // var series4 = chart.series.push(new am4charts.LineSeries());
            // series4.dataFields.valueY = "treshold_atas";
            // series4.dataFields.categoryX = "date";
            // series4.name = "Treshold Batas Atas";
            // series4.bullets.push(new am4charts.CircleBullet());
            // series4.stroke = am4core.color("#F22218");
            // series4.fill = am4core.color("#F22218");
            // series4.tooltipText = "{name} : {valueY}%";
            // series4.legendSettings.valueText = "{valueY}%";
            // series4.visible = false;

            // Add chart cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "zoomY";

            let hs1 = series1.segments.template.states.create("hover")
            hs1.properties.strokeWidth = 5;
            series1.segments.template.strokeWidth = 1;

            let hs2 = series2.segments.template.states.create("hover")
            hs2.properties.strokeWidth = 5;
            series2.segments.template.strokeWidth = 1;

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

    $(document).on('click', '.btn-export', function (e) {
        $('#unit_id').val($(this).data('unit_id'))
        $('#cat').val($(this).data('cat'))
        $('#export-modal').modal('show')
    })

    $(document).on('click', '.btn-submit-export', function (e) {
        e.preventDefault()
        var url = ''
        var cat = $('#cat').val()
        if (cat === 'zv') {
            url = "{{ url('pltd-pm/zv/export?unit_id=') }}" + $('#unit_id').val() + '&date=' + $('#date').val()
        } else if (cat === 'ogf') {
            url = "{{ url('pltd-pm/ogf/export?unit_id=') }}" + $('#unit_id').val() + '&date=' + $('#date')
            .val()
        }
        $('#export-modal').modal('hide')
        window.location.href = url
    })

</script>
@endsection
