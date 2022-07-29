@extends('layouts.index')
@section('section-header')
    PLTS GILI TRAWANGAN LOGS
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}"> --}}
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
                <form method="get" action="{{ url('plts/log') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Cari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- setting unit id --}}
                        <input type="hidden" name="inverter_id" value="{{ $inverter->id }}">

                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" id="date" readonly name="date" value="{{ date('Y-m-d') }}"
                                class="form-control datepicker">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-submit-export">Cari</button>
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
                    </div>
                    <a href="#" class="btn btn-success btn-export ml-2" data-cat="nar-log"><i class="fa fa-print"></i>
                        Export</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-md">
                            <thead>
                                <tr bgcolor="#E9E7E7">
                                    <td rowspan="3">Option</td>
                                    <td rowspan="3">Jam</td>
                                    <td rowspan="3">Time Check</td>
                                    <td colspan="5" align="center">PV Modul DC</td>
                                    <td rowspan="2">Irradians</td>
                                    <td rowspan="2">Irradiations</td>
                                    <td colspan="10" align="center">Grid AC</td>
                                    <td rowspan="3">Gen Power (kW)</td>
                                    <td colspan="3" align="center">Energy</td>
                                    <td colspan="2">Temp</td>
                                    <td rowspan="3">Kwh PS</td>
                                    {{-- <td rowspan="3">Petugas</td> --}}
                                    <td rowspan="3">Ket</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td>Volt</td>
                                    <td>Curr</td>
                                    <td>Power</td>
                                    <td>Today</td>
                                    <td>Acc</td>
                                    <td colspan="3" align="center">Volt (V)</td>
                                    <td colspan="3" align="center">Current (A)</td>
                                    <td colspan="3" align="center">Power (kW)</td>
                                    <td>Freq.</td>
                                    <td>Today</td>
                                    <td>Acc</td>
                                    <td>EB</td>
                                    <td>PV</td>
                                    <td>Ambien</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td>( V )</td>
                                    <td>( A )</td>
                                    <td>( kW )</td>
                                    <td>( kWh )</td>
                                    <td>( kWh )</td>
                                    <td>(W/m²)</td>
                                    <td>(kWh/m²)</td>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>HZ</td>
                                    <td>(kWh)</td>
                                    <td>(kWh)</td>
                                    <td>(kWh)</td>
                                    <td></td>
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
            var inverter_id = "{{ $inverter->id }}"
            $.ajax({
                type: 'GET',
                url: "{{ url('plts/log/load-data?inverter_id=') }}" inverter_id + "&date=" +
                date, //tambahkan &date=date
                success: function(r) {
                    console.log(r)

                    var data = []
                    $.each(r.log, function(i, d) {
                        data.push([
                            // (i+1),
                            d.jam,
                            d.real_time,
                            d.pv_modul_volt,
                            d.pv_modul_curr,
                            d.pv_modul_power,
                            d.pv_modul_today,
                            d.pv_modul_acc,
                            d.irradians,
                            d.irradiations,
                            d.grid_volt_r,
                            d.grid_volt_s,
                            d.grid_volt_t,
                            d.grid_curr_r,
                            d.grid_curr_s,
                            d.grid_curr_t,
                            d.grid_power_r,
                            d.grid_power_s,
                            d.grid_power_t,
                            d.freq,
                            d.gen_power,
                            d.energy_today,
                            d.energy_acc,
                            d.energy_eb,
                            d.temp_pv,
                            d.temp_ambien,
                            d.kwh_ps,
                            d.ket,
                            ''
                        ])
                    })

                    var mytable = $('#dataTable').DataTable({
                        sDom: 'lrtip',
                        "paging": true,
                        "pageLength": 100,
                        "lengthChange": false,
                        "ordering": true,
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
            url = "{{ url('plts/log/export') }}" + '?date=' + $('#date').val()
            $('#export-modal').modal('hide')
            window.location.href = url
        })
    </script>
@endsection
