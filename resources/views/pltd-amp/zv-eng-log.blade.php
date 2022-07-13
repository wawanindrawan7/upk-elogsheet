@extends('layouts.index')
@section('section-header')
    ZV ENGINE LOGS
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
                                <tr align="center">
                                    <td rowspan="4" width="3%">Jam</td>
                                    <td colspan="12" width="30%" align="center">Temperatur ( ⁰C )</td>
                                    <td rowspan="4" width="10%">Waktu Check</td>
                                    <td rowspan="4" width="10%">Operator</td>
                                    <td rowspan="4" width="10%">Option</td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2" rowspan="2">Udara Masuk</td>
                                    <td colspan="4">Oli</td>
                                    <td colspan="6">Air Pendingin</td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2">Masuk Mesin</td>
                                    <td colspan="2">Radiator</td>
                                    <td colspan="2">Masuk Mesin</td>
                                    <td colspan="2">Radiator</td>
                                    <td colspan="2">Injektor</td>
                                </tr>
                                <tr align="center">
                                    <td>Sisi A</td>
                                    <td>Sisi B</td>
                                    <td>A</td>
                                    <td>B</td>
                                    <td>Masuk</td>
                                    <td>Keluar</td>
                                    <td>A</td>
                                    <td>B</td>
                                    <td>Masuk</td>
                                    <td>Keluar</td>
                                    <td>Masuk</td>
                                    <td>Keluar</td>
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
            url : "{{ url('pltd-amp/zv/eng-log/load-data?unit_id=') }}"+unit_id,
            success : function(r){
                console.log(r)

                var data = []
                $.each(r.log, function(i, d){
                    data.push([
                        // (i+1),
                        d.jam,
                        d.udmas_sisi_a,
                        d.udmas_sisi_b,
                        d.oli_masmes_a,
                        d.oli_masmes_b,
                        d.oli_rad_mas,
                        d.oli_rad_kel,
                        d.air_pen_masmes_a,
                        d.air_pen_masmes_b,
                        d.air_pen_rad_mas,
                        d.air_pen_rad_kel,
                        d.air_pen_inj_mas,
                        d.air_pen_inj_kel,
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
