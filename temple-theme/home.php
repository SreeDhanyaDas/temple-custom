<?php
/**
 * Template Name: Home Page
*/
    get_header();
?> 
<!--Slider menus -->
<div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-header-content">
            <p class="carousel-item-text">Temple of Sri, Irattakulangra Bagavathy</p>
          </div>
          <img src="<?php echo get_stylesheet_directory_uri() .'/assets/images/banner2.jpg'; ?>" width="100%" height="100%"  alt="...">
          <div class="carousel-caption-text">
          <bottom class="text-center slider-content">EXPLORE OUR TEMPLE</bottom>
        </div>
      </div>
      
      <div class="carousel-item">
        <div class="carousel-header-content">
          <p class="carousel-item-text">Temple of Sri, Irattakulangra Bagavathy</p>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri() .'/assets/images/banner3.jpg'; ?>" width="100%" height="100%" alt="...">
        <div class="carousel-caption-text">
        <bottom class="text-center slider-content">EXPLORE OUR TEMPLE</bottom>
        </div>
      </div>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="button-container floating-button">
    
   
  </div>
<!-- menus -->

<?php get_template_part( "template-parts/temple", "homepage" ); ?>

     

    </div>
  </div>
</div>

<?php get_footer(); ?>