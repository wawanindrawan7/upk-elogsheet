@extends('layouts.index')
@section('section-header')
    PLTMH PENGGA LOGS
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}"> --}}
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
                <form method="get" action="{{ url('pltmh-pengga/log') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Cari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- setting unit id --}}
                        <input type="hidden" name="generator_id" value="{{ $generator->id }}">

                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" id="date" readonly name="date" value="{{ date('Y-m-d') }}"
                                class="form-control datepicker">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Logsheet {{ date('d-m-Y', strtotime($date)) }}</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#cari-modal"><i
                                class="fa fa-calendar"></i> Cari</a>
                        <a href="#" class="btn btn-success btn-export" data-cat="nar-log"><i class="fa fa-print"></i>
                            Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-md">
                            <thead>
                                <tr bgcolor="#E9E7E7">
                                    <td rowspan="3">Option</td>
                                    <td rowspan="3">Jam</td>
                                    <td rowspan="3">Time Check</td>
                                    <td rowspan="3">Tek.Air Turbin</td>
                                    <td rowspan="3">Gen.Speed</td>
                                    <td colspan="20" align="center">Panel Generator</td>
                                    {{-- <td rowspan="4" valign="buttom">Operator</td> --}}
                                    <td rowspan="4" valign="buttom">Keterangan</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td colspan="3" align="center">Voltage Generator</td>
                                    <td colspan="3" align="center">Arus Generator</td>
                                    <td rowspan="2" align="center">Beban</td>
                                    <td rowspan="2" align="center">COS Q</td>
                                    <td rowspan="2" align="center">FREQ</td>
                                    <td colspan="2" align="center">Excitation</td>
                                    <td colspan="2" align="center">Kwh Produksi</td>
                                    <td colspan="4" align="center">Temperatur</td>
                                    <td rowspan="2" align="center">Level Air</td>
                                    <td rowspan="2" align="center">Debit</td>
                                    <td rowspan="2" align="center">Kwh PS</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td align="center">RS</td>
                                    <td align="center">ST</td>
                                    <td align="center">TR</td>
                                    <td align="center">R</td>
                                    <td align="center">S</td>
                                    <td align="center">T</td>
                                    <td align="center">Teg</td>
                                    <td align="center">Arus</td>
                                    <td align="center">EXP</td>
                                    <td align="center">IMP</td>
                                    <td align="center">Bearing 1</td>
                                    <td align="center">Bearing 2</td>
                                    <td align="center">Gear Box</td>
                                    <td align="center">Wind Gen</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center">BAR</td>
                                    <td align="center">(RPM)</td>
                                    <td colspan="3" align="center">(V)</td>
                                    <td colspan="3" align="center">(A)</td>
                                    <td align="center">(KW)</td>
                                    <td align="center"></td>
                                    <td align="center">(Hz)</td>
                                    <td align="center">(V)</td>
                                    <td align="center">(A)</td>
                                    <td colspan="2" align="center">(KWH)</td>
                                    <td colspan="4" align="center">(C)</td>
                                    <td align="center">(m)</td>
                                    <td align="center">(m3/det)</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
                    {{-- <input type="hidden" id="unit_id" name="unit_id"> --}}
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
    <script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{!! asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
    <script src="{!! asset('assets/js/page/bootstrap-modal.js') !!}"></script>
    {{-- <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    <script>
        var date = "{{ $date }}"

        loadData()

        function loadData() {

            var generator_id = "{{ $generator->id }}"

            $.ajax({
                type: 'GET',
                url: "{{ url('pltmh-pengga/log/load-data?generator_id=') }}" + generator_id + "&date=" +
                    date, //tambahkan &date=date
                success: function(r) {
                    console.log(r)

                    var data = []
                    $.each(r.log, function(i, d) {
                        data.push([
                            '',
                            d.jam,
                            d.real_time,
                            d.tek_air_turbin,
                            d.gen_speed,
                            d.vol_gen_rs,
                            d.vol_gen_st,
                            d.vol_gen_tr,
                            d.arus_gen_r,
                            d.arus_gen_s,
                            d.arus_gen_t,
                            d.beban,
                            d.cos_q,
                            d.freq,
                            d.excit_teg,
                            d.excit_arus,
                            d.kwh_prod_exp,
                            d.kwh_prod_imp,
                            d.temp_bearing_1,
                            d.temp_bearing_2,
                            d.temp_gear_box,
                            d.temp_wind_gen,
                            d.level_air,
                            d.debit,
                            d.kwh_ps,
                            d.ket,
                            
                        ])
                    })

                    var mytable = $('#dataTable').DataTable({
                        sDom: 'lrtip',
                        "paging": true,
                        "pageLength": 100,
                        "lengthChange": false,
                        "ordering": false,
                        "data": data,
                        "autoWidth": false,
                        "responsive": true,
                    });

                    $('#key_search').on('keyup', function() {
                        mytable.search(this.value).draw();
                    });
                }
            })
        }


        $(document).on('click', '.btn-export', function(e) {
            $('#export-modal').modal('show')
        })

        $(document).on('click', '.btn-submit-export', function(e) {
            e.preventDefault()
            url = "{{ url('pltmh-pengga/log/export') }}" + '?date=' + $('#date').val()
            $('#export-modal').modal('hide')
            window.location.href = url
        })
    </script>
@endsection
