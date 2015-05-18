      <?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
      <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Blogg</h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
           <hr />
           <?php foreach ($posts as $data):?>
              <div class="blog-post">
                 <h2 class="blog-post-title"><?php echo $data["title"];?></h2>
                 <p class="blog-post-meta">
                    <?php echo strftime(" %e %B, %Y", strtotime( $data["created"] ));?>. Inlägg av 
                    <a href="<?php echo site_url('blog/show_user_page/' . $data["fk_user"]); ?>" title="Länk till användarens blogg"><?php echo $data["fk_user"];?></a>
                 </p>
                 <p><?php echo $data["text"];?></p>
                 <?php echo img('uploads/' . $data["imagename"]); ?>
                 <hr />
              </div><!-- /.blog-post -->
           <?php endforeach;?>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module">
            <h4>Nya bloggare</h4>
            <ol class="list-unstyled">
              <?php foreach ($bloggers as $data):?>
                <li><a href="<?php echo site_url('blog/show_user_page/' . $data["username"]); ?>" title="Länk till användarens blogg"><?php echo $data["username"];?></a></li>
              <?php endforeach;?>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->