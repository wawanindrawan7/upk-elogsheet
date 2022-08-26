@extends('layouts.index')
@section('section-header')
    OUT GOING FEEDER SWITCH GEAR
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
                <form method="get" action="{{ url('pltd-amp/ogf/sg-log') }}">
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
                                <tr align="center">
                                    <td rowspan="2">Jam</td>
                                    <td colspan="2">PANARAGA</td>
                                    <td colspan="2">PS9</td>
                                    <td colspan="2">BENGKEL</td>
                                    <td colspan="2">SENGGIGI</td>
                                    <td colspan="2">KOPANG</td>
                                    <td colspan="2">GOMONG</td>
                                    <td rowspan="2">Waktu Check</td>
                                    <td rowspan="2">Operator</td>
                                    <td rowspan="2">Option</td>
                                </tr>
                                <tr align="center">
                                    <td>ANALOG</td>
                                    <td>DIGITAL</td>
                                    <td>ANALOG</td>
                                    <td>DIGITAL</td>
                                    <td>ANALOG</td>
                                    <td>DIGITAL</td>
                                    <td>ANALOG</td>
                                    <td>DIGITAL</td>
                                    <td>ANALOG</td>
                                    <td>DIGITAL</td>
                                    <td>ANALOG</td>
                                    <td>DIGITAL</td>
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
                url: "{{ url('pltd-amp/ogf/sg-log/load-data?unit_id=') }}" + unit_id + "&date=" +
                date, //tambahkan &date=date
                success: function(r) {
                    console.log(r)

                    var data = []
                    $.each(r.log, function(i, d) {
                        data.push([
                            // (i+1),
                            d.jam,
                            d.panaraga_analog,
                            d.panaraga_digital,
                            d.ps9_analog,
                            d.ps9_digital,
                            d.praya_analog,
                            d.praya_digital,
                            d.seng_analog,
                            d.seng_digital,
                            d.kopang_analog,
                            d.kopang_digital,
                            d.gomong_analog,
                            d.gomong_digital,
                            d.real_time,
                            d.users.name,
                            ''
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
    </script>
@endsection
