<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/style.css" rel="stylesheet">

  </head>

  <body <?php body_class(); ?>>

  <!-- Navigation -->
  <header>
    <nav class="navbar" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">
            <img class="logo" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo.png" alt="Logo" width="100">
        </a>
        
        <div class="menu">
        <ul>
          <?php 
            if(!isset($_COOKIE['q_token_key'])) {
          ?>
              <li><a href="/api-login">API Login</a></li>
          <?php }else{ ?>
              <li><a href="/profile">Profile</a></li>
          <?php } ?>
        </ul>
        </div>
      </div>
    </nav>
  </header>