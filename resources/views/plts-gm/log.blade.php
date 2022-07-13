@extends('layouts.index')
@section('section-header')
    PLTS GILI MENO LOGS
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
                                    <td rowspan="3">Waktu Check</td>
                                    <td colspan="5" align="center">PV Modul DC</td>
                                    <td rowspan="2">Irradians</td>
                                    <td rowspan="2">Irradiations</td>
                                    <td colspan="10" align="center">Grid AC</td>
                                    <td rowspan="3">Gen Power (kW)</td>
                                    <td colspan="3" align="center">Energy</td>
                                    <td colspan="2">Temp</td>
                                    <td rowspan="3">Kwh PS</td>
                                    {{-- <td rowspan="3">Petugas</td> --}}
                                    <td rowspan="3">Ket</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td>Volt</td>
                                    <td>Curr</td>
                                    <td>Power</td>
                                    <td>Today</td>
                                    <td>Acc</td>
                                    <td colspan="3">Volt (V)</td>
                                    <td colspan="3">Current (A)</td>
                                    <td colspan="3">Power (kW)</td>
                                    <td>Freq.</td>
                                    <td>Today</td>
                                    <td>Acc</td>
                                    <td>EB</td>
                                    <td>PV</td>
                                    <td>Ambien</td>
                                </tr>
                                <tr bgcolor="#E9E7E7">
                                    <td>( V )</td>
                                    <td>( A )</td>
                                    <td>( kW )</td>
                                    <td>( kWh )</td>
                                    <td>( kWh )</td>
                                    <td>(W/m²)</td>
                                    <td>(kWh/m²)</td>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>R</td>
                                    <td>S</td>
                                    <td>T</td>
                                    <td>HZ</td>
                                    <td>(kWh)</td>
                                    <td>(kWh)</td>
                                    <td>(kWh)</td>
                                    <td></td>
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
                            d.pv_modul_volt,
                            d.pv_modul_curr,
                            d.pv_modul_power,
                            d.pv_modul_today,
                            d.pv_modul_acc,
                            d.irradians,
                            d.irradiations,
                            d.grid_volt_r,
                            d.grid_volt_s,
                            d.grid_volt_t,
                            d.grid_curr_r,
                            d.grid_curr_s,
                            d.grid_curr_t,
                            d.grid_power_r,
                            d.grid_power_s,
                            d.grid_power_t,
                            d.freq,
                            d.gen_power,
                            d.energy_today,
                            d.energy_acc,
                            d.energy_eb,
                            d.temp_pv,
                            d.temp_ambien,
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
                        "scrollX" : true,
                    });

                    $('#key_search').on('keyup', function() {
                        mytable.search(this.value).draw();
                    });
                }
            })
        }
    </script>
@endsection
