@extends('layouts.index')
@section('section-header')
    ZAV CMR LOGS
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
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
                <form method="get" action="{{ url('pltd-amp/zav/cmr-log') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Cari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- setting unit id --}}
                        <input type="hidden" name="unit_id" value="{{ $unit->id }}">

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
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <td rowspan="2" width="3%"><b>JAM</b></td>
                                    <td colspan="7" width="20%" align="center"><b>Tekanan (Bar)</b></td>
                                    <td rowspan="2" width="5%"><b>Waktu Check</b></td>
                                    <td rowspan="2" width="5%"><b>Operator</b></td>
                                    <td rowspan="2" width="5%" valign="center"><b>Option</b></td>
                                </tr>
                                <tr>
                                    <td>Udara Start</td>
                                    <td>Air Pendingin Mesin</td>
                                    <td>Air Pendingin Injektor</td>
                                    <td>Raw Water</td>
                                    <td>Minyak Pelumas</td>
                                    <td>Bahan Bakar</td>
                                    <td>Udara Masuk</td>
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
@endsection
@section('js')
    <script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{!! asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
    <script src="{!! asset('assets/js/page/bootstrap-modal.js') !!}"></script>
    <script>

        // ambil tgl dari controller ke js
        var date = "{{ $date }}"

        loadData()

        function loadData() {
            var unit_id = "{{ $unit->id }}"
            $.ajax({
                type: 'GET',
                url: "{{ url('pltd-amp/zav/cmr-log/load-data?unit_id=') }}" + unit_id + "&date=" +
                date, //tambahkan &date=date
                success: function(r) {
                    console.log(r)

                    var data = []
                    $.each(r.log, function(i, d) {
                        data.push([
                            // (i+1),
                            d.jam,
                            d.udara_start,
                            d.air_pen_mesin,
                            d.air_pen_injektor,
                            d.raw_water,
                            d.minyak_pelumas,
                            d.bahan_bakar,
                            d.udara_masuk,
                            d.time_check,
                            d.users.name,
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
    </script>
@endsection
