<div class="container">
   <div class="row col-md-3"></div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Logga in</h1>
         <br /><br />
         <form action="<?php echo htmlspecialchars(site_url('account_contr/account/login')); ?>" method="post" class="form-horizontal">
            <div class="form-group">
               <label for="epost" class="col-md-3 control-label">Epost:</label>
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
                  <button type="submit" class="btn btn-primary">
                     <span class="glyphicon glyphicon-log-in"></span> Logga in
                  </button>
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
      <div class="row col-md-1"></div>
   </div>
</div>