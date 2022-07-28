@extends('layouts.index')
@section('section-header')
    NIIGATA ENGINE LOGS
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <style>
        .modal-backdrop {
      /* bug fix - no overlay */
      display: none;
}

.modal{
    /* bug fix - custom overlay */
    background-color: rgba(10,10,10,0.45);
}
    </style>
@endsection
@section('content')
    <div class="modal fade" tabindex="-1" role="dialog" id="cari-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="get" action="{{ url('pltd-amp/niigata/eng-log') }}">
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
                    {{-- tampilkan tgl --}}
                    <h4>Logsheet {{ date('d-m-Y', strtotime($date)) }}</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#cari-modal"><i class="fa fa-calendar"></i> Cari</a>
                      </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-md">
                            <thead>
                                <tr align="center">
                                    <td rowspan="3" width="5%"><b>Jam</b></td>
                                    <td colspan="8" width="40%" align="center"><b>Tekanan ( Kg/Cm2 )</b></td>
                                    <td rowspan="3" width="5%"><b>Gas Buang ( mmH2O )</b></td>
                                    <td rowspan="3" width="5%"><b>Load Limit Governor</b></td>
                                    <td rowspan="3" width="10%"><b>Waktu Check</b></td>
                                    {{-- <td rowspan="3" width="10%"><b>Operator</b></td> --}}
                                    <td rowspan="3" width="7%"><b>Option</b></td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2"><b>Air Pendingin</b></td>
                                    <td rowspan="2"><b>Minyak Pelumas Masuk Mesin</b></td>
                                    <td colspan="2" width="10%"><b>Udara Bilas</b></td>
                                    <td rowspan="2"><b>Bahan Bakar Masuk Mesin</b></td>
                                    <td rowspan="2"><b>Minyak Pelumas Tuas Katup</b></td>
                                    <td rowspan="2"><b>Minyak Pendingin Injektor</b></td>
                                </tr>
                                <tr align="center">
                                    <td><b>Masuk Mesin</b></td>
                                    <td><b>Masuk Intercooler</b></td>
                                    <td><b>A</b></td>
                                    <td><b>B</b></td>
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
{{-- <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
<script src="{!! asset('assets/js/page/bootstrap-modal.js') !!}"></script>
<script>
    // ambil tgl dari controller ke js
    var date = "{{ $date }}"

    loadData()

    function loadData(){
        var unit_id = "{{ $unit->id }}"
        $.ajax({
            type : 'GET',
            url : "{{ url('pltd-amp/niigata/eng-log/load-data?unit_id=') }}"+unit_id+"&date="+date, //tambahkan &date=date
            success : function(r){
                console.log(r)

                var data = []
                $.each(r.log, function(i, d){
                    data.push([
                        // (i+1),
                        d.jam,
                        d.tek_air_pen_mas_mes,
                        d.tek_air_pen_mas_inter,
                        d.tek_minyak_pelumas_mas_mes,
                        d.tek_udara_bilas_a,
                        d.tek_udara_bilas_b,
                        d.tek_bah_bak_mas_mes,
                        d.tek_minyak_pelumas_tuas_katup,
                        d.tek_minyak_pend_injektor,
                        d.gas_buang,
                        d.load_limit_gov,
                        d.time_check,
                        ''
                    ])
                })

                var mytable = $('#dataTable').DataTable({
                    sDom: 'lrtip',
                    "paging": true,
                    "pageLength" : 100,
                    "lengthChange": false,
                    "ordering": true,
                    "data" : data,
                    "autoWidth": false,
                    "responsive": true,
                });

                $('#key_search').on('keyup', function () {
                    mytable.search(this.value).draw();
                });
            }
        })
    }
</script>
@endsection
