@extends('layouts.index')
@section('section-header')
    PLTMH SANTONG LOGS
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
                                <tr bgcolor="#E9E7E7">
                                    <td rowspan="3">Option</td>
                                    <td rowspan="3">Jam</td>
                                    <td rowspan="3">Time Check</td>
                                    <td rowspan="3">Tek.Air Turbin</td>
                                    <td rowspan="3">Gen.Speed</td>
                                    <td colspan="27" align="center">Panel Generator</td>
                                    <td rowspan="4" valign="buttom">Keterangan</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td colspan="3" align="center">Voltage Generator</td>
                                    <td colspan="3" align="center">Arus Generator</td>
                                    <td rowspan="2" align="center">Beban</td>
                                    <td rowspan="2" align="center">COS Q</td>
                                    <td rowspan="2" align="center">FREQ</td>
                                    <td colspan="2" align="center">Excitation</td>
                                    <td colspan="2" align="center">Kwh Line</td>
                                    <td colspan="2" align="center">Kwh Produksi</td>
                                    <td colspan="9" align="center">Temperatur</td>
                                    <td rowspan="2" align="center">Level Air</td>
                                    <td rowspan="2" align="center">Debit</td>
                                    <td rowspan="2" align="center">Kwh PS</td>

                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td align="center">RS</td>
                                    <td align="center">ST</td>
                                    <td align="center">TR</td>
                                    <td align="center">R</td>
                                    <td align="center">S</td>
                                    <td align="center">T</td>
                                    <td align="center">Teg</td>
                                    <td align="center">Arus</td>
                                    <td align="center">EXP</td>
                                    <td align="center">IMP</td>
                                    <td align="center">EXP</td>
                                    <td align="center">IMP</td>
                                    <td align="center">Bearing 1</td>
                                    <td align="center">Bearing 2</td>
                                    <td align="center">Bearing 3</td>
                                    <td align="center">Winding 1</td>
                                    <td align="center">Winding 2</td>
                                    <td align="center">Winding 3</td>
                                    <td align="center">Winding 4</td>
                                    <td align="center">Winding 5</td>
                                    <td align="center">Winding 6</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center">BAR</td>
                                    <td align="center">(RPM)</td>
                                    <td colspan="3" align="center">(V)</td>
                                    <td colspan="3" align="center">(A)</td>
                                    <td align="center">(KW)</td>
                                    <td align="center"></td>
                                    <td align="center">(Hz)</td>
                                    <td align="center">(V)</td>
                                    <td align="center">(A)</td>
                                    <td colspan="2" align="center">(KWH)</td>
                                    <td colspan="2" align="center">(KWH)</td>
                                    <td colspan="9" align="center">(C)</td>
                                    <td align="center">(m)</td>
                                    <td align="center">(m3/det)</td>
                                    <td></td>
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

        function loadData() {
            $.ajax({
                type: 'GET',
                url: "{{ url('plts-gm/log/load-data') }}",
                success: function(r) {
                    console.log(r)

                    var data = []
                    $.each(r.log, function(i, d) {
                        data.push([
                            // (i+1),
                            d.jam,
                            d.real_time,
                            d.tek_air_turbin,
                            d.gen_speed,
                            d.vol_gen_rs,
                            d.vol_gen_st,
                            d.vol_gen_tr,
                            d.arus_gen_r,
                            d.arus_gen_s,
                            d.arus_gen_t,
                            d.beban,
                            d.cos_q,
                            d.freq,
                            d.excit_teg,
                            d.excit_arus,
                            d.kwh_line_exp,
                            d.kwh_line_imp,
                            d.kwh_prod_exp,
                            d.kwh_prod_imp,
                            d.temp_bearing_1,
                            d.temp_bearing_2,
                            d.temp_bearing_3,
                            d.temp_winding_1,
                            d.temp_winding_2,
                            d.temp_winding_3,
                            d.temp_winding_4,
                            d.temp_winding_5,
                            d.temp_winding_6,
                            d.level_air,
                            d.debit,
                            d.kwh_ps,
                            d.ket,
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
