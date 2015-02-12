<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Sida ett</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_2'); ?>">Sida två</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_3'); ?>">Sida tre</a></li>
         <li role="presentation" class="active"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_4'); ?>">Sida fyra</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_5'); ?>">Sida fem</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_6'); ?>">Sida sex</a></li>
     </ul>
   </div>
   <div class="row col-md-9">
      <h1>Sida fyra</h1>
      
      <!-- Två värden. -->
      <div>
         <h2>Villkorssatser</h2>
  
         <div class="row col-md-6">
           <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view/php_sida_4')); ?>" method="post">
  
            <div class="row col-md-12">
               <div class="row col-md-4">
                 <div>Längd:</div>
               </div>
               <div class="row col-md-8">
                 <input type="text" name="langd">
               </div>
            </div>
            <div class="row col-md-12">
               <div class="row col-md-4">
                 <div>Bredd:</div>
               </div>
               <div class="row col-md-8">
                 <input type="text" name="bredd">
               </div>
            </div>

<p>
<input type="radio" name="radio" value="omkrets" checked>Beräkna omkrets
<br>
<input type="radio" name="radio" value="area">Beräkna area
</p>
            <p><input type="submit" value="BERÄKNA"></p>
           </form>
         </div>
 
         <!-- Skriver ut resultat. -->
         <div>
         <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            	
            	if( $radio == 'omkrets' )
            	{ echo "Omkretsen på trianglen är " . (string) $omkrets; }
            	else { echo "Arean på trianglen är " . (string) $area; }
            }
         ?>
         </div>
      </div>
   </div>
</div>