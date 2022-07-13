@extends('layouts.index')
@section('section-header')
    NIIGATA ENGINE LOGS
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
{{-- <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
<script>

    loadData()

    function loadData(){
        var unit_id = "{{ $unit->id }}"
        $.ajax({
            type : 'GET',
            url : "{{ url('pltd-amp/niigata/eng-log/load-data?unit_id=') }}"+unit_id,
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
