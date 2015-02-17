<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Sida ett</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_2'); ?>">Sida två</a></li>
         <li role="presentation" class="active"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_3'); ?>">Sida tre</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_4'); ?>">Sida fyra</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_5'); ?>">Sida fem</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_6'); ?>">Sida sex</a></li>
     </ul>
   </div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Sida tre</h1>
         <h2>Villkorssatser</h2>
           <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view/php_sida_3')); ?>" method="post">
              Värde ett:<br />
              <input type="text" name="varde1">
              <br />
              Värde två:<br />
              <input type="text" name="varde2">
              <br /><br />
              <input type="submit">
           </form>
           <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 $arrVarden[0] = $arrVarden1;
            	 $arrVarden[1] = $arrVarden2;
            	
            	 if( strcmp($arrVarden[0],$arrVarden[1]) == 0 )
            	 { echo "<br />De två elementen i arrayen är lika."; }
            	 else { echo "De två elementen i arrayen är olika."; }
            	
            	 $arrSiffror = array();
            	
            	 echo "<br /><br />En loop som fyller arrayen med siffrorna 0 - 9.<br />";
            	
            	 for($i = 0; $i < 10; ++$i)
            	 {
            	    $arrSiffror[$i] = $i;
            		echo "$arrSiffror[$i], ";
            	 }
              }
           ?>
      </div>
   </div>
</div>