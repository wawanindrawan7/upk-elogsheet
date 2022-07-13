@extends('layouts.index')
@section('section-header')
    ZV GENERATOR LOGS
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
                                    <td rowspan="3" width="5%"><b>Jam</b></td>
                                    <td colspan="12" align="center"><b>Generator</b></td>
                                    <td rowspan="3" width="5%"><b>Bearing</b></td>
                                    <td rowspan="3" width="10%"><b>Waktu Check</b></td>
                                    <td rowspan="3" width="10%"><b>Operator</b></td>
                                    <td rowspan="3" width="10%"><b>Option</b></td>
                                </tr>
                                <tr>
                                    <td rowspan="2" width="5%">Teg</td>
                                    <td rowspan="2" width="5%">Frek</td>
                                    <td rowspan="2" width="5%">Faktor Daya</td>
                                    <td rowspan="2" width="5%">Daya Semu</td>
                                    <td rowspan="2" width="5%">Beban</td>
                                    <td align="center" colspan="3" width="15%">Arus</td>
                                    <td width="5%">Penguat</td>
                                    <td align="center" colspan="3" width="15%">Winding</td>
                                </tr>
                                <tr>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>Arus</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
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
            url : "{{ url('pltd-amp/zv/gen-log/load-data?unit_id=') }}"+unit_id,
            success : function(r){
                console.log(r)

                var data = []
                $.each(r.log, function(i, d){
                    data.push([
                        // (i+1),
                        d.jam,
                        d.teg,
                        d.freq,
                        d.faktor_daya,
                        d.daya_semu,
                        d.beban,
                        d.arus_r,
                        d.arus_s,
                        d.arus_t,
                        d.penguat,
                        d.winding_1,
                        d.winding_2,
                        d.winding_3,
                        d.bearing,
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
