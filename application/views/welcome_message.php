<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en" class="gr__v4-alpha_getbootstrap_com"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
 <title><?php echo 'Skooppydoo: Gov Hack 2018';?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
    <!-- Awesome font -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
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

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
      <div class="card-body" style="padding:20px;">

        <p class="lead"><?php $this->load->view('teamname');?>
        </p>
	<hr/>
	<p>Our goal is to improve the health and lifestyle of people using our application. Using open data such as public facility locations and health surveys. SparkLife is an application that allows everyday people to improve their health and wellbeing through a series of recommendations for physical exercise and a suitable location for it.</p>
        </div>
    </div>
  </div>


</div>

<div class="row">
    <div class="col"><button onclick="window.location.href='/government';" class="col btn btn-primary">Government</button></div>
    <div class="col"><button onclick="window.location.href='/user';" class="col btn btn-info">User</button>
</div>
  </div> 
<div class="row" style="margin-top:20px;">
<img class="col" style="margin:auto;" src="../logo.png"/>
<img class="col" style="" src="../data-gov.png"/>
</div>    
<div class="row" style="margin: 20px auto 20px auto; width:90%">
<img class="col-md-4 col-sd-12" style="" src="../font-awesome-card.png"/>
<img class="col-md-4 col-sd-12" style="" src="../mapbox_logo.png"/>
<img class="col-md-4 col-sd-12" style="" src="../bootstrap-logo.png"/>
</div>    
    </div>

    </div><!-- /.container -->


  

</body></html>
