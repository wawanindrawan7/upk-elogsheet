@extends('layouts.index')
@section('css')
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<style>
    .modal-backdrop {
        /* bug fix - no overlay */
        display: none;
    }

    .modal {
        /* bug fix - custom overlay */
        background-color: rgba(10, 10, 10, 0.45);
    }

</style>
@endsection
@section('section-header')
PLTS GILI MENO
@endsection
@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>LOGSHEET PER UNIT</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="list-2" role="tabpanel"
                                aria-labelledby="list-home-list">
                                <div class="wizard-steps">
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('plts-gm/log?inverter_id=1') }}" class="text-white">MESIN 1</a>
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="{{ url('plts-gm/log?inverter_id=2') }}" class="text-white">
                                                MESIN 2</a>
                                        </div>
                                    </div>

                                    <div class="wizard-step wizard-step-active">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-file-excel"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            <a href="#" class="btn-export"
                                                style="color: white;">EXPORT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="export-modal">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <input type="hidden" id="unit_id" name="unit_id"> --}}
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" id="date" readonly name="date" value="{{ date('Y-m-d') }}"
                        class="form-control datepicker">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-submit-export">Export</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{!! asset('assets/js/page/bootstrap-modal.js') !!}"></script>
<script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{!! asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>

<script>
    $(document).on('click', '.btn-export', function (e) {
        $('#export-modal').modal('show')
    })

    $(document).on('click', '.btn-submit-export', function (e) {
        e.preventDefault()
        url = "{{ url('plts-gm/log/export-all') }}" + '?date=' + $('#date').val()
        $('#export-modal').modal('hide')
        window.location.href = url
    })

</script>
@endsection
