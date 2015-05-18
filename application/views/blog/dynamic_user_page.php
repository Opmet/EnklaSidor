      <?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
      <div class="container">

      <div class="blog-header">
        <h1 class="blog-title"><?php echo $username;?></h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row">
      
        <div class="col-sm-8 blog-main">
           <hr />
           <?php foreach ($post as $data):?>
              <div class="blog-post">
                 <h2 class="blog-post-title"><?php echo $data["title"];?></h2>
                 <p class="blog-post-meta"><?php echo strftime(" %e %B, %Y", strtotime( $data["created"] ));?></p>
                 <p><?php echo $data["text"];?></p>
                 <?php echo img('uploads/' . $data["imagename"]); ?>
                 <hr />
              </div><!-- /.blog-post -->
           <?php endforeach;?>
        </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </div><!-- /.container -->