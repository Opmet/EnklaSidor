<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
<!-- 
     Skicka epost till mig.
-->
<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li><a href="<?php echo site_url('enkla_javascript_sidor/sorted_array'); ?>">Sortera array</a></li>
         <li class="active"><a href="<?php echo site_url('enkla_javascript_sidor/email_us'); ?>">Kontakta oss</a></li>
         <li><a href="<?php echo site_url('enkla_javascript_sidor/index'); ?>">Vilken webbläsare</a></li>
      </ul>
   </div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Kontakta oss</h1>
         <br /><br />
         <div ng-app="MyJavascript" ng-controller="FormController">
         <form action="<?php echo htmlspecialchars(site_url('enkla_javascript_sidor/email_us')); ?>" method="post" class="form-horizontal" name="checkForm">
            <div class="form-group">
               <label for="password" class="col-md-3 control-label">Ditt namn:</label>
               <div class="col-md-4">
                  <input type="text" name="name" class="form-control" placeholder="Namn" ng-model="checkName" required>
               </div>
            </div>
            <div class="form-group">
               <label for="email" class="col-md-3 control-label">Din epost:</label>
               <div class="col-md-4">
                  <input type="email" name="email" class="form-control" placeholder="Epost" ng-model="checkEmail" required>
               </div>
            </div>
             <div class="form-group">
               <label for="meddelande" class="col-md-3 control-label">Meddelande:</label>
               <div class="col-md-6">
                  <textarea name="message" class="form-control" rows="3" placeholder="Meddelande" ng-model="checkMessage" required></textarea>
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-offset-3 col-md-4">
                  <button type="submit" class="btn btn-primary">
                     <span class="glyphicon glyphicon-send"></span> Skicka
                  </button>
               </div>
            </div>            
         </form>
         </div>
         <div class="row col-md-12">
         <?php
               if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
               	
               	//Skriv ut meddelande.
               	if( $message == true ){
               		echo "<br />" . "Tack för meddelandet!";
               	}
               	else{ echo "<br />" . "Meddelandet kunde inte skickas!";}
            }
         ?>
         </div>
      </div>
      <div class="row col-md-1"></div>
   </div>
</div>