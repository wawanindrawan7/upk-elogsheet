@extends('layouts.index')
@section('section-header')
OUT GOING FEEDER
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
                                    <td rowspan="2">Jam</td>
                                    <td colspan="6">SIKUR</td>
                                    <td colspan="6">MASBAGIK</td>
                                    <td rowspan="2">Waktu Check</td>
                                    <td rowspan="2">Operator</td>
                                    <td rowspan="2">Option</td>
                                </tr>
                                <tr align="center">
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>MW</td>
                                    <td>EXP</td>
                                    <td>IMP</td>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>MW</td>
                                    <td>EXP</td>
                                    <td>IMP</td>
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
            url : "{{ url('pltd-pm/ogf/load-data?unit_id=') }}"+unit_id,
            success : function(r){
                console.log(r)

                var data = []
                $.each(r.log, function(i, d){
                    data.push([
                        // (i+1),
                        d.jam,
                        d.sikur_r,
                        d.sikur_s,
                        d.sikur_t,
                        d.sikur_mw,
                        d.sikur_exp,
                        d.sikur_imp,
                        d.masbagik_r,
                        d.masbagik_s,
                        d.masbagik_t,
                        d.masbagik_mw,
                        d.masbagik_exp,
                        d.masbagik_imp,
                        d.time_check,
                        // d.users.name,
                        '',
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
