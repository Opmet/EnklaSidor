<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
<!-- 
     Sida 1. Behandlar ett formulär med två funktioner.
-->

<!-- Definierar en konstant. -->
<?php define('TEXT', 'Denna text är genererad med utskriftskommandot i PHP'); ?>

<!-- Bootstraps grid-system med rader och kollomner anpassat för Medium devices Desktops -->
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
      <div class="row col-md-1"></div>
      <div class="row col-md-10">
         <h1>Sida ett</h1>
         <p><?php echo TEXT . '.'; ?></p><br />
         
         <!-- Formulär. Innan länken anges konverteras tecknen för att förhindra Cross-site Scripting attacks -->
         <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view/php_sida_1')); ?>" method="post">
            Ditt namn: <input type="text" name="strNamn">
            <input type="submit" value="Skicka">
         </form>
      <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
         	echo "<br />Hej $strNamn <br />";
            echo 'Ditt namn innehåller ' . strlen($strNamn) . ' stycken bokstäver!<br />';
            echo 'Ditt namn om man läser det från höger till vänster är ' .
                  ucfirst( mb_strtolower( strrev($strNamn) ) ) . '.<br />'
         		  . ' Där första bokstaven i ditt vända namn ska vara stor bokstav.';
            }
      ?>
      </div>
      <div class="row col-md-1"></div>
   </div>
</div>