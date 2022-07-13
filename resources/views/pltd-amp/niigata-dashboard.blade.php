@extends('layouts.index')
@section('section-header')
    NIIGATA LOGSHEET
@endsection
@section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-header">
          <h4>GENERATOR LOGS</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
            @foreach ($unit as $ug)
            <li class="media">
              <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png">
              <div class="media-body">
                <div class="media-title">{{ '#'.$ug->nama }}</div>
                <div class="text-job"><a href="{{ url('pltd-amp/niigata/gen-log?unit_id='.$ug->id) }}">Open Detail</a></div>
              </div>
              <div class="media-items">
                <div class="media-item">
                  <div class="media-value">1,239</div>
                  <div class="media-label">Posts</div>
                </div>
                <div class="media-item">
                  <div class="media-value">10K</div>
                  <div class="media-label">Followers</div>
                </div>
                <div class="media-item">
                  <div class="media-value">2,312</div>
                  <div class="media-label">Following</div>
                </div>
              </div>
            </li>
            @endforeach 
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mt-4">
        <div class="card-header">
          <h4>ENGINE LOGS</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
            @foreach ($unit as $ue)
            <li class="media">
              <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png">
              <div class="media-body">
                <div class="media-title">{{ '#'.$ue->nama }}</div>
                <div class="text-job"><a href="{{ url('pltd-amp/niigata/eng-log?unit_id='.$ue->id) }}">Open Detail</a></div>
              </div>
              <div class="media-items">
                <div class="media-item">
                  <div class="media-value">1,239</div>
                  <div class="media-label">Posts</div>
                </div>
                <div class="media-item">
                  <div class="media-value">10K</div>
                  <div class="media-label">Followers</div>
                </div>
                <div class="media-item">
                  <div class="media-value">2,312</div>
                  <div class="media-label">Following</div>
                </div>
              </div>
            </li>
            @endforeach 
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection