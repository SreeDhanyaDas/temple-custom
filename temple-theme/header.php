<!DOCTYPE html>
<html <?php language_attributes(); header('Access-Control-Allow-Origin: *'); ?>>
  <head>
    <title>
    <?php if(is_front_page() || is_home()){
        echo get_bloginfo('name');
    } else{
        echo wp_title('');
    }?>
    </title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

  <!--Navbar-->
  <nav class="navbar navbar-secondary navbar-expand-lg navbar-dark  p-3">
  <div class="container">
    <div class="secondary-nav-content">
      <!-- <div class="left-nav-content"> -->
        <span style="color:#FCB132; padding-right:0.5rem">999-555-000-11</span>
        <span style="color:#fff; padding-right:30rem">temple@domaiun.com</span>
      <!-- </div> -->
      <!-- <div class="right-nav-content"> -->
        <span style="color:#fff; padding-right:1rem">EVENTS</span>
        <span style="color:#fff">POOJA BOOKING</span>
      <!-- </div> -->
    </div>
  </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-dark  p-3">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <?php if ( has_nav_menu( 'header_menu' ) ) : ?>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'header_menu',
            'depth'          => '1',
            'menu_class'     => 'header-nav navbar-nav ms-auto',
            'container'      => '',
            'fallback_cb'    => '',
          ) );
        ?>
        <?php endif; ?>

        <?php if ( has_nav_menu( 'header_second_menu' ) ) : ?>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'header_second_menu',
            'depth'          => '1',
            'menu_class'     => 'header-nav navbar-nav ms-auto',
            'container'      => '',
            'fallback_cb'    => '',
          ) );
        ?>
        <?php endif; ?>
      </div>
    </div>
  </nav>
<!--/.Navbar-->

<div class="main-section">
  
