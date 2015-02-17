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
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Sida fyra</h1>
         <h2>Triangel</h2>
         <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view/php_sida_4')); ?>" method="post">
            Längd:<br />
            <input type="text" name="langd">
            <br />
            Bredd:<br />
            <input type="text" name="bredd">
            <br />
            <input type="radio" name="radio" value="omkrets" checked>Beräkna omkrets
            <input type="radio" name="radio" value="area">Beräkna area
            <br /><br />
            <input type="submit" value="BERÄKNA">
         </form>
         <div>
         <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            	
            	if( $radio == 'omkrets' )
            	{ echo "<br />Omkretsen på trianglen är " . (string) $omkrets . "."; }
            	else { echo "<br />Arean på trianglen är " . (string) $area . "."; }
            }
         ?>
         </div>
      </div>
   <div class="row col-md-1"></div>
   </div>
</div>