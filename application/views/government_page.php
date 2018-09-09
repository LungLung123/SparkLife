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

    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Skooppydoo</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="hidden navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	</li>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Gov Hack 2018: Team 3</h1>
        <p class="lead">1. Shelan<br>
			2. Rathapon Phoochai<br>
			3. Palang<br>
			4. Xiuhua He<br>
			5. Granduff (the lord). 
	</p> 

<div class="row">
    <div class="col"><button onclick="window.location.href='/government'" class="col btn btn-primary">Government</button></div>
    <div class="col"><button class="disabled col btn btn-info">User</button>
</div>
    
  </div>
	<div class="main-content" style="border: 1px solid black;
    padding: 20px;
    margin-top: 20px">
		<form action="/action_page.php">
  <div class="form-group">
    <label for="age">Age ranges:</label>
	<select id="age">
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
	<select id="gender">
		<option value="0">Male</option>
		<option value="1">Female</option>
		<option value="2">Other</option>
	</select>	  
  </div>
<style>
#map {  top:0; bottom:0; width:100%;min-height: 500px; }
</style>
<script src='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.css' rel='stylesheet' />
<!-- <script id="polygon-ACT" type="application/json" src='https://data.gov.au/geoserver/act-suburb-locality-boundaries-psma-administrative-boundaries/wfs?request=GetFeature&typeName=ckan_0257a9da_b558_4d86_a987_535c775cf8d8&outputFormat=json'></script>-->
<div id='map'></div>
<script>
var ACTPolygon;
  var hoveredStateId =  null;
$(document).ready(function(){
	$.getJSON("https://data.gov.au/geoserver/act-suburb-locality-boundaries-psma-administrative-boundaries/wfs?request=GetFeature&typeName=ckan_0257a9da_b558_4d86_a987_535c775cf8d8&outputFormat=json", function(json){
    	ACTPolygon = json;
});
  mapboxgl.accessToken = 'pk.eyJ1Ijoic2tvb3BweWRvbyIsImEiOiJjamx0NDd0ajEwNDlvM2tzNGF5eHpjbjJyIn0.x32XyaJrTk0vbyqQEgG3fA';
  
    var map = new mapboxgl.Map({
    container: 'map',
    zoom: 9,
center: [149.1300092, -35.2809368],
    //style: 'mapbox://styles/mapbox/streets-v10'
    style: 'mapbox://styles/mapbox/basic-v9'
});
map.on('load', function () {
console.log(map);

    map.addSource("suburbs", {
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
            "fill-color": "#627BC1",
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
            "line-color": "#627BC1",
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
            map.setFeatureState({source: 'suburbs', id: hoveredStateId}, { hover: true});
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
});
});
</script>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

	</div> 
    </div>

    </div><!-- /.container -->



</body></html>
