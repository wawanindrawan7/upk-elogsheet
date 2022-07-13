@extends('layouts.index')
@section('section-header')
OUT GOING FEEDER SWITCH GEAR
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
                                    <td colspan="2">PANARAGA</td>
                                    <td colspan="2">PS9</td>
                                    <td colspan="2">PRAYA</td>
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
{{-- <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
<script>

    loadData()

    function loadData(){
        var unit_id = "{{ $unit->id }}"
        $.ajax({
            type : 'GET',
            url : "{{ url('pltd-amp/ogf/sg-log/load-data?unit_id=') }}"+unit_id,
            success : function(r){
                console.log(r)

                var data = []
                $.each(r.log, function(i, d){
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
