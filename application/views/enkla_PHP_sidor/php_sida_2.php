<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Sida ett</a></li>
         <li role="presentation" class="active"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_2'); ?>">Sida två</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_3'); ?>">Sida tre</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_4'); ?>">Sida fyra</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_5'); ?>">Sida fem</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_6'); ?>">Sida sex</a></li>
     </ul>
   </div>
   <div class="row col-md-9">
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Sida två</h1>
         <h2>Tre olika djur</h2>
         <!-- Tre djur. -->
         <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view/php_sida_2')); ?>" method="post">
            Djur ett:<br />
            <input type="text" name="djur1" />
            <br />
            Djur två:<br />
            <input type="text" name="djur2" />
            <br />
            Djur tre:<br />
            <input type="text" name="djur3" />
            <br /><br />
            <input type="submit">
         </form>
         
         <!-- Behandlar djur. -->
         <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            	// Array med tre djur.
            	$arrBondgard[0] = $arrBondgard1;
            	$arrBondgard[1] = $arrBondgard2;
            	$arrBondgard[2] = $arrBondgard3;
            	
            	echo '<br />Rad 1: Elementet som finns på andra platsen i arrayen är = ' . $arrBondgard[1] . '.';
            	echo '<br />'; 
            	echo 'Rad 2: Arrayen i råformat med funktionen "print_r" blir = ' . print_r($arrBondgard, true) . '.';
            	echo '<br />';
            	
            	$arrBondgard[1] = 'Gris'; // Ersätter med en gris.
            	unset($arrBondgard['0']); // Tar bort första djuret.
            	
            	echo 'Rad 3: Den nya djurbesättningen i arrBondgard = ' . print_r($arrBondgard, true) . '.';
            	echo '<br /><br />';
            	echo 'Andra elementet har ersatts med en Gris.';
            	echo '<br />';
            	echo 'Djuret på första positionen i arrayen har tagits bort.';
            }
         ?>
      </div>
      <div class="row col-md-1"></div>
   </div>
</div>