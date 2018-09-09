<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en" class="gr__v4-alpha_getbootstrap_com"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
     <!-- Awesome font -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script> 
    <script src="../js/tether.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  
  </head>

  <body style="padding-top: 5em;" data-gr-c-s-loaded="true" cz-shortcut-listen="true">

<?php $this->load->view('navbar');?>
    <div class="container">

      <div class="starter-template">
        <h1>Gov Hack 2018: Giraffii</h1>
        <div id="accordion" style="margin-bottom:20px;">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Team members <i class="fa fa-users"></i> >>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
      <div class="card-body" style="padding:20px;">

        <p class="lead"><?php $this->load->view('teamname');?>
        </p>
        </div>
    </div>
  </div>


</div>

<div class="row">
    <div class="col"><button onclick="window.location.href='/government'" class="col btn btn-primary">Government</button></div>
    <div class="col"><button class="disabled col btn btn-info">User</button>
</div>
    
  </div>
	<div class="main-content" style="border: 1px solid black;
    padding: 20px;
    margin-top: 20px">
		<form action="<?php echo base_url();?>result" method="POST" id="form-1">
  <div class="form-group">
    <label for="age">Age ranges:</label>
	<select id="age" name="age">
	<option value="" selected disabled hidden>Please select..</option>
		<option value="0">3-5 years old</option>
		<option value="1">6-12 years old</option>
		<option value="2">13-17 years old</option>
		<option value="3">18-30 years old</option>
		<option value="4">31-50 years old</option>
		<option value="5">51-65 years old</option>
		<option value="6">65+ years old</option>
	</select>	  
</div>
   <div class="form-group">
    <label for="age">Gender:</label>
	<select id="gender" name="gender">
	<option value="" selected disabled hidden>Please select..</option>
		<option value="0">Male</option>
		<option value="1">Female</option>
		<option value="2">Other</option>
	</select>	  
  </div>
   <div class="form-group">
    <label for="age">Please select area: <small>(Only ACT data from data.gov.au/geoserver...)</small></label>
	<input type="hidden" class="lat_i" name="lat"/>
	<input type="hidden" class="lng_i" name="lng"/>
	<input class="area_i" name="area" type="hidden" value=""/>
    <p class="area-selected" style="text-align:center;font-weight:bold;">No area selected</p>


   </div>
</form>

<style>
#map {  top:0; bottom:0; width:100%;min-height: 500px; }
</style>
<script src='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.css' rel='stylesheet' />
<!-- <script id="polygon-ACT" type="application/json" src='https://data.gov.au/geoserver/act-suburb-locality-boundaries-psma-administrative-boundaries/wfs?request=GetFeature&typeName=ckan_0257a9da_b558_4d86_a987_535c775cf8d8&outputFormat=json'></script>-->
<div id='map'></div>
<script>
  var ACTPolygon;
  var selectedArea = "No area selected";
  var hoveredStateId =  null;
$(document).ready(function(){
	$.getJSON("https://data.gov.au/geoserver/act-suburb-locality-boundaries-psma-administrative-boundaries/wfs?request=GetFeature&typeName=ckan_0257a9da_b558_4d86_a987_535c775cf8d8&outputFormat=json", function(json){
    	ACTPolygon = json;
});
  mapboxgl.accessToken = 'pk.eyJ1Ijoic2tvb3BweWRvbyIsImEiOiJjamx0NDd0ajEwNDlvM2tzNGF5eHpjbjJyIn0.x32XyaJrTk0vbyqQEgG3fA';
  
    var map = new mapboxgl.Map({
    container: 'map',
    zoom: 9.5,
center: [149.1300092, -35.2809368],
    //style: 'mapbox://styles/mapbox/streets-v10'
    style: 'mapbox://styles/mapbox/basic-v9'
});
map.on('load', function () {
console.log(map);
    map.addSource("suburbs", {
        "type": "geojson",
        "data": "http://skooppydoo.com/js/act_suburbs_boundaries.js"   });

    map.addSource("suburbs2", {
        "type": "geojson",
        "data": "https://www.mapbox.com/mapbox-gl-js/assets/us_states.geojson"
    });

    // The feature-state dependent fill-opacity expression will render the hover effect
    // when a feature's hover state is set to true.
    map.addLayer({
        "id": "suburb-fills",
        "type": "fill",
        "source": "suburbs",
        "layout": {},
        "paint": {
            "fill-color": "#5bc0de",
            "fill-opacity": ["case",
                ["boolean", ["feature-state", "hover"], false],
                1,
                0.5
            ]
        }
    });

    map.addLayer({
        "id": "suburb-borders",
        "type": "line",
        "source": "suburbs",
        "layout": {},
        "paint": {
            "line-color": "#5bc0de",
            "line-width": 2
        }
    });

    // When the user moves their mouse over the state-fill layer, we'll update the
    // feature state for the feature under the mouse.
    map.on("mousemove", "suburb-fills", function(e) {
	console.log(e);
	console.log(e.features.length);
        if (e.features.length > 0) {
		console.log(e.features)
            if (hoveredStateId) {
                map.setFeatureState({source: 'suburbs', id: hoveredStateId}, { hover: false});
            }
	  //console.log(e.features[0].properties.lc_ply_pid);
hoveredStateId = e.features[0].id;           
// hoveredStateId = e.features[0].properties.lc_ply_pid;
	 if(e.features.length > 1){
	   if(e.features[0].properties.act_loca_5 == 'D'){
		hoveredStateId = e.features[1].id;
		selectedArea = e.features[1].properties.STATE_NAME; 
		console.log(e.features[1].properties.STATE_NAME);
		}
	   else{
		console.log(e.features[0].properties.STATE_NAME);
		selectedArea = e.features[0].properties.STATE_NAME; 
		}
	 }
	else{
		selectedArea = e.features[0].properties.STATE_NAME; 

		console.log(e.features[0].properties.STATE_NAME);

	  }
            map.setFeatureState({source: 'suburbs', id: hoveredStateId}, { hover: true});
	$('.area-selected').text(selectedArea);
        }
    });

    // When the mouse leaves the state-fill layer, update the feature state of the
    // previously hovered feature.
    map.on("mouseleave", "suburb-fills", function() {
        if (hoveredStateId) {
            map.setFeatureState({source: 'suburbs', id: hoveredStateId}, { hover: false});
        }
        hoveredStateId =  null;
    });
    map.on('click', 'suburb-fills', function (e) {
       console.log(e);
	$('.lat_i').val(e.lngLat.lat);
	$('.lng_i').val(e.lngLat.lng);
	if(selectedArea != 'No area selected'){
		$('.area_i').val(""+selectedArea);
		//$("#form-1").attr("action","<?php echo base_url(); ?>result");
		$("#form-1")[0].submit();
       		//window.location.href="/user/"+selectedArea;
	}
	// map.flyTo({center: e.features[0].geometry.coordinates});
    });
});
});
</script>
<div style="margin-top:15px;text-align:right;">
<button type="submit" class="submitBtn hidden btn btn-primary right">Next</button>
</div>

	</div> 
    </div>

    </div><!-- /.container -->



</body></html>
