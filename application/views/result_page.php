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
		<form action="" method="POST" id="form-1">
  <div class="form-group">
    <label for="age" class="bold">Age ranges:</label>
    <span><?php echo $age; ?></span>  
</div>
   <div class="form-group">
    <label for="age" class="bold">Gender:</label>
    <span><?php echo $gender; ?></span>  
</div>
   <div class="form-group">
	<ul>
	<?php foreach($recommendation as $rec):?>
	<li><?php echo $rec;?></li>
	<?php endforeach;?>
	</ul>
   </div>
   <div class="form-group">
    <p style="text-align:center;"> Recommended places for doing activities in <span class="bold" style="text-decoration: underline black;"><?php echo $area;?></span></p>  


   </div>
</form>

<style>
#map {  top:0; bottom:0; width:100%;min-height: 500px; }
.markerbasketball {
  background-image: url('basketball.jpg');
  background-size: cover;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}

.markerfitness {
  background-image: url('mapbox-icon.png');
  background-size: cover;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}


.markerPLayGround {
  background-image: url('playground.png');
  background-size: cover;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}

.markerSkate {
  background-image: url('skate.jpg');
  background-size: cover;
  width: 50px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}


.mapboxgl-popup {
  max-width: 200px;
}

.mapboxgl-popup-content {
  text-align: center;
  font-family: 'Open Sans', sans-serif;
}
</style>
<script src='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.css' rel='stylesheet' />
<!-- <script id="polygon-ACT" type="application/json" src='https://data.gov.au/geoserver/act-suburb-locality-boundaries-psma-administrative-boundaries/wfs?request=GetFeature&typeName=ckan_0257a9da_b558_4d86_a987_535c775cf8d8&outputFormat=json'></script>-->
<div id='map'></div>
<script>

var ACTBaskSite;
var ACTFitness;
var ACTPLayGround;
var ACTSkate;
var suburbName="<?php echo $area;?>";
$(document).ready(function(){
  mapboxgl.accessToken = 'pk.eyJ1Ijoic2tvb3BweWRvbyIsImEiOiJjamx0NDd0ajEwNDlvM2tzNGF5eHpjbjJyIn0.x32XyaJrTk0vbyqQEgG3fA';
  
    var map = new mapboxgl.Map({
    container: 'map',
    zoom: 12,
center: [<?php echo $lng;?>, <?php echo $lat;?>],
    //style: 'mapbox://styles/mapbox/streets-v10'
    style: 'mapbox://styles/mapbox/basic-v9'
});
map.on('load', function () {
console.log(map);

	$.getJSON("https://www.data.act.gov.au/resource/sde8-8gwg.json", function(json){
    //console.log(json);
    ACTBaskSite = json;

    console.log(ACTBaskSite);

    ACTBaskSite.forEach(function(marker) {
      if(marker.division.toLowerCase()==suburbName.toLowerCase()){

      // create a HTML element for each feature
      var el = document.createElement('div');
      el.className = 'markerbasketball';
	  var mtype = "";
	  console.log("xxx"+typeof marker.type +" "+marker.location+" "+marker.type);
	  if(typeof marker.type !== 'undefined')
		mtype = marker.type;
		console.log("1will add "+ mtype);
	
      var $content = $('<div><i class="fa fa-user"></i> interest: 10, going: 4</br><button onclick="window.location.href=\'/user/user1\'" class="btn btn-primary">Join</button><button class="btn btn-info" style="margin-left:10px;">Interest</button><div>');
      //console.log(marker.location_1.coordinates);
      // make a marker for each feature and add to the map
      new mapboxgl.Marker(el)
      .setLngLat(marker.location_1.coordinates)
      .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
      .setHTML('<h4>' + marker.location + '</h4><p style="margin-bottom:5px;">' + mtype + '</p>'+$content.html()))
      .addTo(map);

      }
});
});
$.getJSON("https://www.data.act.gov.au/resource/4x3y-6wz4.json", function(json){
    ACTFitness = json;

    //console.log(ACTFitness);
    ACTFitness.forEach(function(marker) {
      if(marker.division.toLowerCase()==suburbName.toLowerCase()){
       //console.log(ACTFitness);
      // create a HTML element for each feature
      var el = document.createElement('div');
      el.className = 'markerfitness';
	  var mtype = "";
	  console.log("xxx"+typeof marker.type +" "+marker.location+" "+marker.type);
	  if(typeof marker.type !== 'undefined')
		mtype = marker.type;
	console.log("2will add "+ mtype);
      var $content = $('<div><i class="fa fa-user"></i> interest: 20, going: 15</br><button onclick="window.location.href=\'/user/user1\'" class="btn btn-primary">Join</button><button class="btn btn-info" style="margin-left:10px;">Interest</button><div>');
      // make a marker for each feature and add to the map
      new mapboxgl.Marker(el)
      .setLngLat(marker.location_1_2.coordinates)
      .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
      .setHTML('<h4>' + marker.location + '</h4><p style="margin-bottom:5px;">' + mtype + '</p>'+$content.html()))
      .addTo(map);

      }
});
});


$.getJSON("https://www.data.act.gov.au/resource/9y36-yxpi.json", function(json){
  ACTPLayGround = json;

    console.log(ACTPLayGround);
    ACTPLayGround.forEach(function(marker) {
      console.log(marker.division_name);
      if(marker.division_name.toLowerCase()==suburbName.toLowerCase()){
       //console.log(ACTPLayGround);
      // create a HTML element for each feature
      var el = document.createElement('div');
      el.className = 'markerPLayGround';
	  var mtype = "";
	  console.log("xxx"+typeof marker.type +" "+marker.location+" "+marker.type);
	  if(typeof marker.type !== 'undefined')
		mtype = marker.type;
	console.log("3will add "+ mtype);
	
      var $content = $('<div><i class="fa fa-user"></i> interest: 15, going: 13</br><button onclick="window.location.href=\'/user/user1\'" class="btn btn-primary">Join</button><button class="btn btn-info" style="margin-left:10px;">Interest</button><div>');
      // make a marker for each feature and add to the map
      new mapboxgl.Marker(el)
      .setLngLat(marker.location_1.coordinates)
      .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
      .setHTML('<h4>' + marker.location + '</h4><p style="margin-bottom:5px;">' + mtype + '</p>'+$content.html()))
      .addTo(map);

      }
});
});


$.getJSON("https://www.data.act.gov.au/resource/5yva-w7wu.json", function(json){
  ACTSkate = json;

    console.log(ACTSkate);
    ACTSkate.forEach(function(marker) {
      console.log(marker.division);
      if(marker.division.toLowerCase()==suburbName.toLowerCase()){
       //console.log(ACTSkate);
      // create a HTML element for each feature
      var el = document.createElement('div');
      el.className = 'markerSkate';
	  var mtype = "";
	  console.log("xxx"+typeof marker.type +" "+marker.location+" "+marker.type);
	  if(typeof marker.type !== 'undefined')
		mtype = marker.type;
	console.log("4will add "+ mtype);
      var $content = $('<div><i class="fa fa-user"></i> interest: 30, going: 21</br><button onclick="window.location.href=\'/user/user1\'" class="btn btn-primary">Join</button><button class="btn btn-info" style="margin-left:10px;">Interest</button><div>');
      // make a marker for each feature and add to the map
      new mapboxgl.Marker(el)
      .setLngLat(marker.location_1.coordinates)
      .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
      .setHTML('<h4>' + marker.location + '</h4><p style="margin-bottom:5px;">' + mtype + '</p>'+$content.html()))
      .addTo(map);

      }
});
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
