<!-- 
     Head taggen är inkluderad i header.php som har kopplats samman med denna sidan i controllern! 
     En stilmal har kopplats till elementen <h1> och <p> , Se filen main.css.
-->

<!-- Definierar en konstant. -->
<?php define('TEXT', 'Denna text är genererad med utskriftskommandot i PHP'); ?>

<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li role="presentation" class="active"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Sida ett</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_2'); ?>">Sida två</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_3'); ?>">Sida tre</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_4'); ?>">Sida fyra</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_5'); ?>">Sida fem</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_6'); ?>">Sida sex</a></li>
     </ul>
   </div>
   <div class="row col-md-9">
      <h1>Sida ett</h1>
      
      <!-- Kallar på modellen och skriver ut en statisk text. --> 
      <p><?php echo TEXT . '.'; ?></p>
      
      <br />
      
      <!-- Enkelt formulär. Skriv in ditt namn. -->
      <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view/php_sida_1')); ?>" method="post">
         Ditt namn: <input type="text" name="strNamn">
         <input type="submit">
      </form>
      
      <br />
      
      <p><?php echo "Hej $strNamn"; ?></p>
      <br />
      <p><?php echo 'Ditt namn innehåller ' . strlen($strNamn) . ' stycken bokstäver!'; ?></p>
      <br />
      <p><?php echo 'Ditt namn om man läser det från höger till vänster ' .
                     ucfirst( mb_strtolower( strrev($strNamn) ) ) . '.'
     		         . ' Där första bokstaven i ditt vända namn ska vara stor bokstav.'; ?>
      </p>
      <br />
      
   </div>
</div>