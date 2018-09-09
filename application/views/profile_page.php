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

    
	<div class="main-content" style="border: 1px solid black;
    padding: 20px;
    margin-top: 20px">
	<span style="text-align:right;">
	<h4>Hello, user1</h4></span>
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
    <p style="text-align:center;"><span class="bold" style="text-decoration: underline black;">List of your activities</span></p>  


   </div>
</form>
<div class="alert alert-primary" role="alert" style="color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;">
  You are attending an event at John Knight Memorial Park, Belconen Today (6.00 pm).
  <style>
  .nereby-selection img{width:50px;cursor:pointer;}
  .nereby-selection img:hover{width:70px;cursor:pointer;}
  </style>
  <h4 style="margin-top:20px;">Nearby facilities search:</h4>
  <div class="row" >
  
  <div class ="col nereby-selection"><img onclick="test();" src="../water.png"/></div><div class ="col nereby-selection"><img  src="../hospital.png"/></div><div class ="col nereby-selection"><img  src="../toilet.png"/></div></div>
</div>
<style>
#map {  top:0; bottom:0; width:100%;min-height: 500px; }
.markerbasketball {
  background-image: url('../basketball.jpg');
  background-size: cover;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}

.markerfitness {
  background-image: url('../mapbox-icon.png');
  background-size: cover;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}


.markerPLayGround {
  background-image: url('../playground.png');
  background-size: cover;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}

.markerSkate {
  background-image: url('../skate.jpg');
  background-size: cover;
  width: 50px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}


.mapboxgl-popup {
  max-width: 350px;
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
var temName = "Moderate work out";
var temAddress = "at John Knight Memorial Park, Belconen";
var suburbName="<?php echo $area;?>";
$(document).ready(function(){
  mapboxgl.accessToken = 'pk.eyJ1Ijoic2tvb3BweWRvbyIsImEiOiJjamx0NDd0ajEwNDlvM2tzNGF5eHpjbjJyIn0.x32XyaJrTk0vbyqQEgG3fA';
  
    var map = new mapboxgl.Map({
    container: 'map',
    zoom: 12,
center: [<?php echo $lng;?>, <?php echo $lat;?>],
    style: 'mapbox://styles/mapbox/streets-v10'
    //style: 'mapbox://styles/mapbox/basic-v9'
});
map.on('load', function () {
console.log(map);


var popup = new mapboxgl.Popup({closeOnClick: false})
    .setLngLat([149.065874, -35.240509])
    .setHTML('<h4>'+temName+'</h4><p>'+temAddress+' <i class="fa fa-map-pin"></i></p><p>Today 18.00 \'clock</p><div><a href="https://goo.gl/maps/KE62VwFWRsj" target="_blank" class="btn btn-primary">direction <i class="fa fa-location-arrow"></i></a><button style="margin-left:15px" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Invite <i class="fa fa-users"></i></button></div>')

    .addTo(map);


});
});
</script>
<div style="margin-top:15px;text-align:right;">
<button type="submit" class="submitBtn hidden btn btn-primary right">Next</button>
</div>

	</div> 
    </div>

    </div><!-- /.container -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Friend list</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Alex Sandrea <button onclick="invited(this);" class="btn btn-primary" style="float:right">invite <i class="fa fa fa-location-arrow"></i></button></p>
		<p>John Poo <button onclick="invited(this);" class="btn btn-primary" style="float:right">invite <i class="fa fa fa-location-arrow"></i></button></p>
		<p>Banana Spark <button onclick="invited(this);" class="btn btn-primary" style="float:right">invite <i class="fa fa fa-location-arrow"></i></button></p>
		<p>Jood Jard <button onclick="invited(this);" class="btn btn-primary" style="float:right">invite <i class="fa fa fa-location-arrow"></i></button></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
function test(){
$.getJSON("https://www.data.act.gov.au/api/views/8eg4-uskm/rows.json?accessType=DOWNLOAD", function(json){
  ACTPLayGround = json.data;

    console.log(ACTPLayGround);
    ACTPLayGround.forEach(function(marker) {
      console.log(marker);
	  console.log(marker[9].toLowerCase() + " "+suburbName.toLowerCase());
      if(marker[9].toLowerCase()==suburbName.toLowerCase()){
       //console.log(ACTPLayGround);
      // create a HTML element for each feature
      var el = document.createElement('div');
      el.className = 'markerPLayGround';
	
	
	console.log(marker[14]);
      // make a marker for each feature and add to the map
      //new mapboxgl.Marker(el)
     // .setLngLat([marker[14], marker[13])
      //.addTo(map);

      }
});
});
}
function invited(e){
	console.log($(e));
	$(e).html("invited");
	$(e).attr("disabled", true);
}
</script>

</body></html>
