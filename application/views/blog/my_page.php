<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');?>
      <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Blogg</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
           <hr />
           <?php foreach ($result as $data):?>
              <div class="blog-post">
                 <h2 class="blog-post-title"><?php echo $data["title"];?></h2>
                 <p class="blog-post-meta"><?php echo $data["created"];?> av <a href="#"><?php echo $data["fk_user"];?></a></p>
                 <p><?php echo $data["text"];?></p>
                 <p><?php echo $data["fk_image"];?></p>
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

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module">
            <h4>Senaste inlägg</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Nya bloggare</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->