<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
<!-- 
     Vyn för att skapa ett nytt konto.
-->
<div class="container">
   <div class="row col-md-3"></div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Skapa nytt konto</h1>
         <br /><br />
         <form action="<?php echo htmlspecialchars(site_url('account/create_new_account')); ?>" method="post" class="form-horizontal">
            <div class="form-group">
               <label for="name" class="col-md-3 control-label">Namn:</label>
               <div class="col-md-4">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Namn">
               </div>
            </div>
            <div class="form-group">
               <label for="email" class="col-md-3 control-label">Epost:</label>
               <div class="col-md-4">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Epost">
               </div>
            </div>
            <div class="form-group">
               <label for="password" class="col-md-3 control-label">Lösenord:</label>
               <div class="col-md-4">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Lösenord">
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-offset-3 col-md-4">
                  <button type="submit" class="btn btn-primary">Skapa konto</button>
               </div>
            </div>
         </form>
         <div class="row col-md-12">
            <?php
            if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
         	   echo "<br />$message";
            }
            ?>
         </div>
      </div>
   </div>
   <div class="row col-md-1"></div>
</div>