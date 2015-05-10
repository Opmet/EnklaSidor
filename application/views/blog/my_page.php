      <?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
      <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Blogg</h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
           <hr />
           <?php foreach ($myposts as $data):?>
              <div class="blog-post">
                 <h2 class="blog-post-title"><?php echo $data["title"];?></h2>
                 <p class="blog-post-meta"><?php echo $data["created"];?> av <a href="#"><?php echo $data["fk_user"];?></a></p>
                 <p><?php echo $data["text"];?></p>
                 <?php echo img('uploads/' . $data["imagename"]); ?>
                 <hr />
              </div><!-- /.blog-post -->
           <?php endforeach;?>

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </div><!-- /.container -->