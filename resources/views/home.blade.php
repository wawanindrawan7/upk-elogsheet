@extends('layouts.index')
@section('section-header')
    DASHBOARD
@endsection
@section('content')
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
