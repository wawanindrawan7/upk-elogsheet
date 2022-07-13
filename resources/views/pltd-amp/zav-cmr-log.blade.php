@extends('layouts.index')
@section('section-header')
    ZAV CMR LOGS
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}"> --}}
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Logsheet</h4>
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
{{-- <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
<script>

    loadData()

    function loadData(){
        var unit_id = "{{ $unit->id }}"
        $.ajax({
            type : 'GET',
            url : "{{ url('pltd-amp/zav/cmr-log/load-data?unit_id=') }}"+unit_id,
            success : function(r){
                console.log(r)

                var data = []
                $.each(r.log, function(i, d){
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
