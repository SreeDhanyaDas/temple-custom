      </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small indigo">

      <!-- Footer Links -->
      <div class="container text-md-left">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-md-3 mx-auto footer-contents">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
              <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php else : ?>
                <h4>Sidebar is not active</h4>
            <?php endif; ?>

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none">

          <!-- Grid column -->
          <div class="col-md-3 mx-auto footer-contents">


            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
              <?php dynamic_sidebar( 'footer-2' ); ?>
            <?php else : ?>
                <h4>Sidebar is not active</h4>
            <?php endif; ?>

          </div>
          <!-- Grid column -->
          <!-- Grid column -->
          <div class="col-md-3 mx-auto footer-contents">


            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
              <?php dynamic_sidebar( 'footer-3' ); ?>
            <?php else : ?>
                <h4>Sidebar is not active</h4>
            <?php endif; ?>

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none">

          <!-- Grid column -->
          <div class="col-md-3 mx-auto">
          
            <h2>Recen Post</h2>
            <!-- <div class="social-media-icons">
              <a href="https://facebook.com/temple"><img alt="facebook" src="<?php echo get_stylesheet_directory_uri() .'/assets/images/footer_fb.png'; ?>"></a>
              <a href="https://twitter.com/temple"><img alt="twitter" src="<?php echo get_stylesheet_directory_uri() .'/assets/images/footer_twitter.png'; ?>"></a>
            </div>
            <div class="footer-email">
              <a href="mailto:info@temple.org">info@temple.org</a>
            </div> -->
          

          </div>
          <!-- Grid column -->

          <hr class="clearfix w-100 d-md-none">
        </div>
        
      </footer>
      <div class="secondary-footer"> 
        <div class="container">
          <div class="secondary-footer-content"> 
            <span>COPYRIGHT © TEMPLE 2022</span>
            
            <span class="footer-icons">
            <a href="https://facebook.com/temple" class="facebook-icon"><img alt="facebook" src="<?php echo get_stylesheet_directory_uri() .'/assets/images/facebook-f.svg'; ?>" width= "20px", height= "15px;"></a>
            <a href="https://instagram.com/temple" class="instagram-icon"><img alt="instagram" src="<?php echo get_stylesheet_directory_uri() .'/assets/images/instagram.svg'; ?>" width= "20px", height= "20px;"></a>
            <a href="https://google.com/temple" class="google-icon"><img alt="google" src="<?php echo get_stylesheet_directory_uri() .'/assets/images/google-plus-g.svg'; ?>" width= "20px", height= "20px;"></a>
              
            </span>
          </div>

        </div>
      </div>
    
    <?php wp_footer(); ?>
  </body>
</html>