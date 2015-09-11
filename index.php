<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="description" content="hírcímek generálása"/>
  <meta name="author" content="Náday Ádám">
  <link rel="icon" href="includes/favicon.ico">
  <title>Álhírgenerátor</title>

  <meta property="og:url" content=<?php echo '"'."http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'"'?> />
  <meta property="og:site_name" content="Blog" />
  <meta property="og:type" content="article" />
  <meta property="og:locale" content="hu_HU" />
  <meta property="og:title" content="Álhírgenerátor" />
  <meta property="og:description" content="hírcímek generálása" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script src="ajax.js"></script>


		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
		  <link rel="stylesheet" href="/style/main.min.css">
    <style type="text/css">

      #toTop {
       display: block;
       position: fixed;
       top: 90%;
       right: 1%;
      }
     #ajax {
       margin: 0 auto 5% auto;
       width: 100%;
      }
      </style>
</head>
<body>
  <?php include('../../includes/nav.php');?>
  <div class="container">
    <div class="jumbotron">
      <h1 class="text-center">Álhírgenerátor</h1>
      <p class="text-center">Értelmetlen vagy vicces címek generálása</p>
      <div class="text-center">

        <button id="top" class="btn btn-info"><b>Toplista</b>
          <i class="fa fa-list-ol"></i>
          <img id='load-top'  src='ajax-loader-top.gif'></img>
        </button>

        <button id="random" class="btn btn-success"><b>Random hírek</b>
         <i class="fa fa-magic"></i>
         <img id='load-gen' src='ajax-loader.gif'></img>
        </button>

      </div>
    </div>
    <div class="row center-block">
      <div class="col-md-10 col-md-offset-1">
        <h1 class="page-header">Legjobb hírek</h1>

        <div id=hirek>
          <ul class="list-group center-block">
            <?php include("toplista.php"); ?>
          </ul>
        <div>
        </div>
        </div>
        <button id="ajax" type="button" class="btn btn-default"><h3>Van még!<h3></button>
      </div>
    </div>
  </div>

  <div>

 </div>


<a class="btn btn-default" role="button" id="toTop" href="#"><span class="glyphicon glyphicon-arrow-up"></span></a>

</body>
</html>
