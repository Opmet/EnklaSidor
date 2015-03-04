<!DOCTYPE html>
<html lang="sv">
  <head>
    <title>D0019E Webbutveckling II – Skriptspråk, VT15</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    <script>
       $(document).ready(function(){
          $("#get").click(function(){
             $("form").attr("method", "get");
          });
          $("#post").click(function(){
    	     $("form").attr("method", "post");
          });
       });
    </script>
    <meta charset="UTF-8" />
    <meta name="beskrivning" content="En övning på att skapa enkla webbsidor" />
    <meta name="keywords" content="HTML,CSS,XML,JavaScript" />
    <meta name="author" content="Joakim Andersson" />
  </head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('webbutveckling/view'); ?>">D0019E Webbutveckling II – Skriptspråk, VT15</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('webbutveckling/view'); ?>">Om</a></li>
            <li class="active"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Enkla PHP-sidor</a></li>
          </ul>
        </div>
      </div>
      <?php
         //Starta session om inaktiv.
         if ( $this->mysession->is_session_started() === FALSE ) session_start();
      
         //Om inloggad
         //Annars utloggad
         if ( isset($_SESSION['session']) ){
         	require_once( APPPATH.'views/templates/online.php');
         }else{
         	require_once( APPPATH.'views/templates/offline.php');
         } 
      ?>
    </nav>