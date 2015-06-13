<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
<!-- 
     Skapa nytt blogg inlägg.
-->
<div class="container">
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Nytt inlägg</h1>
         <br /><br />
         <div data-ng-app="MyJavascript" data-ng-controller="FormController">
         <form action="<?php echo htmlspecialchars(site_url('blog/set_post')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" name="upload">
            <div class="form-group">
               <label for="title" class="col-md-3 control-label">Rubrik:</label>
               <div class="col-md-4">
                  <input type="text" id="title" name="title" class="form-control" placeholder="Rubrik" data-ng-model="checkName" required>
               </div>
            </div>
             <div class="form-group">
               <label for="meddelande" class="col-md-3 control-label">Meddelande:</label>
               <div class="col-md-6">
                  <textarea id="meddelande" name="message" class="form-control" rows="3" placeholder="Meddelande" data-ng-model="checkMessage" required></textarea>
               </div>
            </div>
            <div class="form-group">
               <label for="image" class="col-md-3 control-label">Bild:</label>
               <div class="col-md-6">
                  Lägg till bild: gif|jpg|png <br />
                  <input type="file" id="image" name="userfile">
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-offset-3 col-md-4">
                  <button type="submit" class="btn btn-primary">
                     <span class="glyphicon glyphicon-share"></span> Inlägg
                  </button>
               </div>
            </div>            
         </form>
         </div>
         <div class="row col-md-12">
         <?php
               if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
               	
               	echo validation_errors(); // Fält validering.
               	if( isset($error) ){ echo $error; } // Fil validering.
            }
         ?>
         </div>
      </div>
      <div class="row col-md-1"></div>
   </div>
</div>