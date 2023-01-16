@extends('master')
@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('graves')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('createGrave')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle"></i>
                                <strong>View Stand</strong>
                                <small>Table</small>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-detail" class="table table-bordered table-sm table-striped">
                                        <tbody>

                                        <tr>
                                        <td>ID</td>
                                        <td>{{$grave->grave_id}}</td>
                                        </tr>

                                        <tr>
                                        <td>Site</td>
                                        <td>{{$grave->g_site}}</td>
                                        </tr>

                                        <tr>
                                        <td>Lot</td>
                                        <td>{{$grave->g_lot}}</td>
                                        </tr>

                                        <tr>
                                        <td>#</td>
                                        <td>{{$grave->g_batch}}</td>
                                        </tr>

                                        <tr>
                                        <td>Status</td>
                                        <td>{{$grave->g_status}}</td>
                                        </tr>

                                        <tr>
                                        <td>Date</td>
                                        <td>{{$grave->g_date}}</td>
                                        </tr>

                                    </tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle"></i>
                                <strong>Owner</strong>
                                <small>Table</small>
                            </div>
                            <div class="card-body">
                                @if ($grave->owner != null)
                                    {{$grave->owner->name.' '.$grave->owner->surname}}

                                    <a href="{{route('showCemeteryOwner',$grave->owner->id )}}" class="text-success"> <i class="fa fa-street-view"></i></a>
                                @endif
                            </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-info-circle"></i>
                            <strong></strong>
                            <small>MAP VIEW</small>
                        </div>
                        <div id="map" style="width: 500px; height: 300px;">
                           <!-- {!! Mapper::render() !!}
                           -->
                        </div>
        </div>
        </div>
            </div>
            </div>
        
            </div>
            </div>
            </div>
            </div>
  <script>
            // Initialize and add the map
            var grave = {!! json_encode($grave->toArray()) !!};
            console.log(grave["address_lat"]);
            function initMap() {
              // The location of Uluru
              
              const grave_loc = { lat: grave["grave_lat"], lng: grave["grave_lon"] };
              // The map, centered at Uluru
              const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: grave_loc,
              });
              // The marker, positioned at Uluru
              const marker = new google.maps.Marker({
                position: grave_loc,
                map: map,
              });
            }
            
            window.initMap = initMap;
        </script>

@endsection