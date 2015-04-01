<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
<!-- 
     Om användaren är inloggad.
-->
<div class="container">
   <div class="row col-md-8"></div>
   <div class="row col-md-4">
      <span>Du är inloggad</span>
      <a href="<?php echo site_url('account/logout'); ?>" class="btn btn-default btn-sm" role="button">
         <span class="glyphicon glyphicon-log-out"></span> Logga ut
      </a>
   </div>
</div>