<!DOCTYPE html>
<html>
  <head>
    <title>D0019E Webbutveckling II – Skriptspråk, VT15</title>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
  </head>
  
  <!-- Teckenkodning --> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
  <body>

<!-- Fixed navbar -->
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
    </nav>