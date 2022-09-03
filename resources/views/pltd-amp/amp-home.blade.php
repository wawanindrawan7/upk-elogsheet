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

        #chart_amp_2,
        #chart_amp_3,
        #chart_amp_4,
        #chart_amp_5,
        #chart_amp_6,
        #chart_amp_7,
        #chart_amp_8 {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection
@section('section-header')
    PLTD AMPENAN
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
                                    href="#list-4" role="tab" aria-selected="true">Unit #4</a>
                                <a class="list-group-item list-group-item-action" id="list-5-list" data-toggle="list"
                                    href="#list-5" role="tab">Unit #5</a>
                                <a class="list-group-item list-group-item-action" id="list-6-list" data-toggle="list"
                                    href="#list-6" role="tab">Unit #6</a>
                                <a class="list-group-item list-group-item-action" id="list-7-list" data-toggle="list"
                                    href="#list-7" role="tab">Unit #7</a>
                                <a class="list-group-item list-group-item-action" id="list-8-list" data-toggle="list"
                                    href="#list-8" role="tab">Unit #8</a>
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
                                                <a href="{{ url('pltd-amp/zv/eng-log?unit_id=1') }}" class="text-white">ZV
                                                    EGNINE LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zv/gen-log?unit_id=1') }}" class="text-white">ZV
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
                                            <div id="chart_amp_2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-3" role="tabpanel"
                                    aria-labelledby="list-profile-list">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zv/eng-log?unit_id=2') }}" class="text-white">ZV
                                                    EGNINE LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zv/gen-log?unit_id=2') }}" class="text-white">ZV
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
                                            <div id="chart_amp_3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-4" role="tabpanel"
                                    aria-labelledby="list-messages-list">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/niigata/eng-log?unit_id=3') }}"
                                                    class="text-white">NIIGATA EGNINE LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/niigata/gen-log?unit_id=3') }}"
                                                    class="text-white">NIIGATA GENERATOR LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="#" class="btn-export" data-cat="niigata" data-unit_id="3"
                                                    style="color: white;">EXPORT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="chart_amp_4"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-5" role="tabpanel"
                                    aria-labelledby="list-settings-list">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/eng-log?unit_id=4') }}"
                                                    class="text-white">ZAV EGNINE LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/gen-log?unit_id=4') }}"
                                                    class="text-white">ZAV GENERATOR LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/cmr-log?unit_id=4') }}"
                                                    class="text-white">ZAV CMR LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="#" class="btn-export" data-cat="zav" data-unit_id="4"
                                                    style="color: white;">EXPORT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="chart_amp_5"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-6" role="tabpanel"
                                    aria-labelledby="list-settings-list">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/eng-log?unit_id=5') }}"
                                                    class="text-white">ZAV EGNINE LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/gen-log?unit_id=5') }}"
                                                    class="text-white">ZAV GENERATOR LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/cmr-log?unit_id=5') }}"
                                                    class="text-white">ZAV CMR LOGS</a>
                                            </div>
                                        </div>

                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="#" class="btn-export" data-cat="zav" data-unit_id="5"
                                                    style="color: white;">EXPORT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="chart_amp_6"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-7" role="tabpanel"
                                    aria-labelledby="list-settings-list">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/eng-log?unit_id=6') }}"
                                                    class="text-white">ZAV EGNINE LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/gen-log?unit_id=6') }}"
                                                    class="text-white">ZAV GENERATOR LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/gen-log?unit_id=6') }}"
                                                    class="text-white">ZAV CMR LOGS</a>
                                            </div>
                                        </div>

                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="#" class="btn-export" data-cat="zav" data-unit_id="6"
                                                    style="color: white;">EXPORT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="chart_amp_7"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-8" role="tabpanel"
                                    aria-labelledby="list-settings-list">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/eng-log?unit_id=7') }}"
                                                    class="text-white">ZAV EGNINE LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/gen-log?unit_id=7') }}"
                                                    class="text-white">ZAV GENERATOR LOGS</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/zav/cmr-log?unit_id=7') }}"
                                                    class="text-white">ZAV CMR LOGS</a>
                                            </div>
                                        </div>

                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="#" class="btn-export" data-cat="zav" data-unit_id="7"
                                                    style="color: white;">EXPORT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="chart_amp_8"></div>
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
                                                <a href="{{ url('pltd-amp/ogf/cr-log?unit_id=8') }}"
                                                    class="text-white">OUT GOING FEEDER CONTROL ROOM</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="{{ url('pltd-amp/ogf/sg-log?unit_id=8') }}"
                                                    class="text-white">OUT GOING FEEDER SWITCH GEAR</a>
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                <a href="#" class="btn-export" data-unit_id="8" data-cat="ogf"
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
                    <h4>PLTD AMPENAN RESUME</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
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
                        </div>
                        <div class="col-md-4">
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
        
                            
                        </div>
                        <div class="col-md-4">
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

        var amp2_data_chart = @json($amp2_data_chart, JSON_PRETTY_PRINT);
        var amp3_data_chart = @json($amp3_data_chart, JSON_PRETTY_PRINT);
        var amp4_data_chart = @json($amp4_data_chart, JSON_PRETTY_PRINT);
        var amp5_data_chart = @json($amp5_data_chart, JSON_PRETTY_PRINT);
        var amp6_data_chart = @json($amp6_data_chart, JSON_PRETTY_PRINT);
        var amp7_data_chart = @json($amp7_data_chart, JSON_PRETTY_PRINT);
        var amp8_data_chart = @json($amp8_data_chart, JSON_PRETTY_PRINT);

        loadGrafik('chart_amp_2', amp2_data_chart, 'Grafik SFC UNIT #2')
        loadGrafik('chart_amp_3', amp3_data_chart, 'Grafik SFC UNIT #3')
        loadGrafik('chart_amp_4', amp4_data_chart, 'Grafik SFC UNIT #4')
        loadGrafik('chart_amp_5', amp5_data_chart, 'Grafik SFC UNIT #5')
        loadGrafik('chart_amp_6', amp6_data_chart, 'Grafik SFC UNIT #6')
        loadGrafik('chart_amp_7', amp7_data_chart, 'Grafik SFC UNIT #7')
        loadGrafik('chart_amp_8', amp8_data_chart, 'Grafik SFC UNIT #8')
        

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

        $(document).on('click', '.btn-export', function(e) {
            $('#unit_id').val($(this).data('unit_id'))
            $('#cat').val($(this).data('cat'))
            $('#export-modal').modal('show')
        })

        $(document).on('click', '.btn-submit-export', function(e) {
            e.preventDefault()
            var url = ''
            var cat = $('#cat').val()
            if (cat === 'zv') {
                url = "{{ url('pltd-amp/zv/export?unit_id=') }}" + $('#unit_id').val() + '&date=' + $('#date')
                .val()
            } else if (cat === 'zav') {
                url = "{{ url('pltd-amp/zav/export?unit_id=') }}" + $('#unit_id').val() + '&date=' + $('#date')
                    .val()
            } else if (cat === 'niigata') {
                url = "{{ url('pltd-amp/niigata/export?unit_id=') }}" + $('#unit_id').val() + '&date=' + $('#date')
                    .val()
            } else if (cat === 'ogf') {
                url = "{{ url('pltd-amp/ogf/export?unit_id=') }}" + $('#unit_id').val() + '&date=' + $('#date')
                    .val()
            }
            $('#export-modal').modal('hide')
            window.location.href = url
        })
    </script>
@endsection
