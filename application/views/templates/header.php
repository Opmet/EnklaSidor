<!DOCTYPE html>
<!-- Html 5 -->
<!-- Visar webbläsaren att innehållet är på Svenska -->
<html lang="sv">
  <head>
    <title>D0019E Webbutveckling II – Skriptspråk, VT15</title>
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    
    <!-- Eget css -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    <script>
       // Byter överförings metod till sida 6.
       $(document).ready(function(){
          $("#get").click(function(){
             $("form").attr("method", "get"); //Get
          });
          $("#post").click(function(){
    	     $("form").attr("method", "post"); //Post
          });
       });
    </script>
    
    <!-- Teckenkodning med åäö-->
    <meta charset="UTF-8" />
    <meta name="beskrivning" content="En övning på att skapa enkla webbsidor" />
    <meta name="keywords" content="HTML,CSS,XML,JavaScript" />
    <meta name="author" content="Joakim Andersson" />
  </head>
<body>

    <!-- Navigation header -->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('welcome/about'); ?>">D0019E Webbutveckling II – Skriptspråk, VT15</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li<?php echo $header_nav_link1; ?>><a href="<?php echo site_url('welcome/about'); ?>">Om</a></li>
            <li<?php echo $header_nav_link2; ?>><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Enkla PHP-sidor</a></li>
            <li<?php echo $header_nav_link3; ?>><a href="<?php echo site_url('help_center/email_us'); ?>">Kontakta mig</a></li>
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