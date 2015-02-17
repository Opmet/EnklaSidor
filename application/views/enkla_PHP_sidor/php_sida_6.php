<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Sida ett</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_2'); ?>">Sida två</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_3'); ?>">Sida tre</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_4'); ?>">Sida fyra</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_5'); ?>">Sida fem</a></li>
         <li role="presentation" class="active"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_6'); ?>">Sida sex</a></li>
     </ul>
   </div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Sida sex</h1>
         <h2>Sända och ta emot data</h2>
         
         <!-- Två värden namn och telefon. -->
           <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view/php_sida_6')); ?>" method="get">
               Namn:<br />
               <input type="text" name="namn">
               <br />
               Telefon:<br />
               <input type="text" name="telefon">
               <br />
               <input type="radio" id="get" name="data" value="get" checked>Get()
               <input type="radio" id="post" name="data" value="post">Post()
               <br /><br />
               <input type="submit" value="Sänd">
           </form>
         
         <!-- Skriver ut resultat. -->
         <div class="row col-md-12">
            <?php
            if ( isset($_REQUEST["data"]) ) {
         	   echo "<br />Ditt namn: $namn och telefon: $telefon skickades med $data metoden.";
            }
            ?>
         </div>
      </div>
      <div class="row col-md-1"></div>
   </div>
</div>