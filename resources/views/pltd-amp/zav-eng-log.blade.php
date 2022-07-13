@extends('layouts.index')
@section('section-header')
    ZAV ENGINE LOGS
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
                                    <td rowspan="5" width="3%">Jam</td>
                                    <td colspan="15" width="30%" align="center">Temperatur ( ⁰C )</td>
                                    <td rowspan="5" width="10%">Waktu Check</td>
                                    <td rowspan="5" width="10%">Operator</td>
                                    <td rowspan="5" width="7%">Option</td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="3">Udara Masuk Disalurkan</td>
                                    <td colspan="5">Minyak Pelumas</td>
                                    <td colspan="8">Raw Water</td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="2">Masuk Mesin</td>
                                    <td colspan="2" rowspan="2">Oil Cooler</td>
                                    <td rowspan="3">Masuk Filter</td>
                                    <td colspan="4">Inter Cooler</td>
                                    <td colspan="2" rowspan="2">Oil Cooler</td>
                                    <td colspan="2" rowspan="2">Radiator</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Sisi A</td>
                                    <td colspan="2">Sisi B</td>
                                </tr>
                                <tr>
                                    <td>Sisi A</td>
                                    <td>Sisi B</td>
                                    <td>Sisi A</td>
                                    <td>Sisi B</td>
                                    <td>Masuk</td>
                                    <td>Keluar</td>
                                    <td>Masuk</td>
                                    <td>Keluar</td>
                                    <td>Masuk</td>
                                    <td>Keluar</td>
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
            url : "{{ url('pltd-amp/zav/eng-log/load-data?unit_id=') }}"+unit_id,
            success : function(r){
                console.log(r)

                var data = []
                $.each(r.log, function(i, d){
                    data.push([
                        // (i+1),
                        d.jam,
                        d.temp_ud_mas_dis_sis_a,
                        d.temp_ud_mas_dis_sis_b,
                        d.temp_minyak_pel_mas_mes_sis_a,
                        d.temp_minyak_pel_mas_mes_sis_b,
                        d.temp_minyak_pel_oil_cooler_masuk,
                        d.temp_minyak_pel_oil_cooler_keluar,
                        d.temp_minyak_pel_masuk_filter,
                        d.temp_raw_mater_inter_cooler_sisi_a_masuk,
                        d.temp_raw_mater_inter_cooler_sisi_a_keluar,
                        d.temp_raw_mater_inter_cooler_sisi_b_masuk,
                        d.temp_raw_mater_inter_cooler_sisi_b_keluar,
                        d.temp_raw_mater_oil_cooler_masuk,
                        d.temp_raw_mater_oil_cooler_keluar,
                        d.temp_raw_mater_rad_masuk,
                        d.temp_raw_mater_rad_keluar,
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
