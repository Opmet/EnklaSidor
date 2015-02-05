<!-- 
     Head taggen är inkluderad i header.php som har kopplats samman med denna sidan i controllern! 
     En stilmal har kopplats till elementen <h1> och <p> , Se filen main.css.
-->

<!-- Definierar en konstant. -->
<?php define('TEXT', 'Denna text är genererad med utskriftskommandot i PHP'); ?>

<div class="container">
   <div class="row col-md-3">
      <ul class="nav nav-pills nav-stacked">
         <li role="presentation" class="active"><a href="#">Sida ett</a></li>
         <li role="presentation"><a href="#">Sida två</a></li>
         <li role="presentation"><a href="#">Sida tre</a></li>
         <li role="presentation"><a href="#">Sida fyra</a></li>
         <li role="presentation"><a href="#">Sida fem</a></li>
         <li role="presentation"><a href="#">Sida sex</a></li>
     </ul>
   </div>
   <div class="row col-md-9">
      <h1>Sida ett</h1>
      
      <!-- Kallar på modellen och skriver ut en statisk text. --> 
      <p><?php echo TEXT . '.'; ?></p>
      
      <br />
      
      <!-- Enkelt formulär. Skriv in ditt namn. -->
      <form action="<?php echo htmlspecialchars(site_url('enkla_PHP_sidor/view')); ?>" method="post">
         Ditt namn: <input type="text" name="strNamn">
         <input type="submit">
      </form>
      
      <br />
      
      <p><?php echo $strNamn; ?></p>
      <p><?php echo $title; ?></p>
      
   </div>
</div>