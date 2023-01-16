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
        </div>
        <div class="container">
        <div class="card-header">
            <i class="fa fa-info-circle"></i>
            <strong></strong>
            <small>MAP VIEW</small>
        </div>
        <div class="form-group">
          <select name='to_owner' id='to_owner' class="form-control input-group-lg reg_name required">
              <option selected disabled>Select Cemetery Location</option>
              @forelse($location as $location)
                  <option value="{{$location}}">{{$location}}</option>
              @empty
              @endforelse
          </select>
      </div>
        <div id="map" style="height: 750%">
           <!-- {!! Mapper::render() !!}
           -->
        </div>
        </div>
</div>

<script>
// Initialize and add the map
// The following example creates five accessible and
// focusable markers.
const graves = {!! json_encode($graves->toArray()) !!};
console.log(graves);
const single_graves = [];

const data_lat = graves.map(function(lat){
  return lat.grave_lat;
});
console.log(data_lat);
const data_lon = graves.map(function(lon){
  return lon.grave_lon;
});
console.log(data_lon);

function initMap() {
  
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 16,
    center: { lat: graves[0].address_lat, lng: graves[0].address_lon },
  });
  
  const single_graves = graves.map(function(loc){
    return { lat: loc.grave_lat, lng: loc.grave_lon };
  });
  
  console.log(single_graves);
  
  // Create an info window to share between markers.
  const infoWindow = new google.maps.InfoWindow();

  // Create the markers.
  single_graves.forEach(([position, title], i) => {
    const marker = new google.maps.Marker({
      position,
      map,
      title: `${i + 1}. ${title}`,
      label: `${i + 1}`,
      optimized: false,
    });

    // Add a click listener for each marker, and set up the info window.
    marker.addListener("click", () => {
      infoWindow.close();
      infoWindow.setContent(marker.getTitle());
      infoWindow.open(marker.getMap(), marker);
    });
  });
}
window.initMap = initMap;
</script>

@endsection