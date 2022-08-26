@extends('layouts.index')
@section('section-header')
    DASHBOARD
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>PLTD AMPENAN</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">UNIT #2 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp2_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp2_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp2_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #3 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp3_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp3_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp3_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #4 NIIGATA</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp4_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp4_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp4_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #5 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp5_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp5_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp5_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #6 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp6_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp6_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp6_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #7 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp7_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp7_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp7_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #8 ZAV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $amp8_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $amp8_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $amp8_sfc }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>PLTD PAOKMOTONG</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">UNIT #2 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pm2_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $pm2_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $pm2_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #3 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pm2_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $pm2_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $pm2_sfc }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">UNIT #4 ZV</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pm2_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pemakaian
                            <span class="badge badge-primary badge-pill">{{ $pm2_pemakaian }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SFC
                            <span class="badge badge-primary badge-pill">{{ $pm2_sfc }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTMH Narmada</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $narmada_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $narmada_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTMH Pengga</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $pengga_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $pengga_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTMH Santong</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $santong_kwh_prod }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $santong_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTS Gili Trawangan</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">INVERTER 1</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $gt1_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gt1_kwh_ps }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">INVERTER 2</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $gt2_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gt2_kwh_ps }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">INVERTER 3</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi
                            <span class="badge badge-primary badge-pill">{{ $gt3_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gt3_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTS Gili Air</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">INVERTER 1</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi / Energy Today
                            <span class="badge badge-primary badge-pill">{{ $ga1_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $ga1_kwh_ps }}</span>
                        </li>
                    </ul>

                    <div class="section-title mt-3">INVERTER 2</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi / Energy Today
                            <span class="badge badge-primary badge-pill">{{ $ga2_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $ga2_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>PLTS Gili Meno</h4>
                </div>
                <div class="card-body">
                    <div class="section-title mt-0">INVERTER 1</div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh Produksi / Energy Today
                            <span class="badge badge-primary badge-pill">{{ $gm1_energy_today }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kwh PS
                            <span class="badge badge-primary badge-pill">{{ $gm1_kwh_ps }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
