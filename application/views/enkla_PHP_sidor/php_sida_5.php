<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_1'); ?>">Sida ett</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_2'); ?>">Sida två</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_3'); ?>">Sida tre</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_4'); ?>">Sida fyra</a></li>
         <li role="presentation" class="active"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_5'); ?>">Sida fem</a></li>
         <li role="presentation"><a href="<?php echo site_url('enkla_PHP_sidor/view/php_sida_6'); ?>">Sida sex</a></li>
     </ul>
   </div>
   <div class="row col-md-9">
      <h1>Sida fem</h1>
      
      <!-- Två värden. -->
      <div>
         <h2>Servervariabler</h2>
 
         <!-- Skriver ut resultat. -->
         <div>
         <?php
         echo '<p>';
         echo '<b>Användarens IP-adress:</b><br />' . $_SERVER['REMOTE_ADDR'] . '<br /><br />';
         echo '<b>Namnet på den server som skriptet körs på:</b><br />' . $_SERVER['SERVER_NAME'] . '<br /><br />';
         echo '<b>Filnamnet på PHP-sidan:</b><br />' . $_SERVER['PHP_SELF'] . '<br /><br />';
         echo '<b>Vilken port som används för att kommunicera med webbservern:</b><br />' . $_SERVER['SERVER_PORT'] . '<br /><br />';
         echo '<b>Vilken metod som använts för att köra PHP-sidan:</b><br />' . $_SERVER['REQUEST_METHOD'] . '<br /><br />';
         echo '</p>';
         ?>
         </div>
      </div>
   </div>
</div>