<?php
/**
 * The header for template-home.php
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<?php wp_head(); ?>
<section id='ivory'>
<div class='col-md-12'>

INI SECTION
</div>
</section>
</head>
<section class='ivory'>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gateway' ); ?></a>

<div class="bg-image bg-image-header bg-center-center">

  <div class="site-branding">

    <?php 
      $header_logo = get_theme_mod( 'header_logo', customizer_library_get_default( 'header_logo' ) ); if ( ! $header_logo ) { ?>

      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" alt="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

      <h2><?php bloginfo( 'description' ); ?></h2>

    <?php } else { ?>

    <div class='pull-right'>
      <ul class="menu-atas">
          
          <li class="list-menus">
		<a class='tombols' href="#"> Login</a>
	  </li> <li class="list-menus">
		<a class='tombols' href="#"> Register</a>
	  </li>
       </ul>
    </div>
<br><br><br>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img width='150' height='auto' class="logo" src="<?php echo esc_url( $header_logo ); ?>" alt=""></a>
<br><br><br>
<h1 class='black text-center'> Alumni Pascasarjana Arsitektur </h1>
<br><br><br>
<!--menu-->
 
	<ul class="menu-atas">
          
          <li class="list-menu">
		<a class='tombol' href="#"> Visi, Misi, Sejarah</span></a>
	  </li>
 <li class="list-menu">
		<a class='tombol' href="#"> Kegiatan</span></a>
	  </li>
 <li class="list-menu">
		<a class='tombol' href="#"> Alumni S2</span></a>
	  </li>
 <li class="list-menu">
		<a class='tombol' href="#"> Alumni S3</span></a>
	  </li>
 <li class="list-menu">
		<a class='tombol' href="#"> Publikasi Alumni</span></a>
	  </li>
 <li class="list-menu">
		<a class='tombol' href="#"> Forum</span></a>
	  </li>
        </ul>
<br><br><br>
<!--menu End-->

    <?php } ?>

  </div><!-- .site-branding -->

</div><!-- .bg-image .bg-image-header .bg-center-center -->
</section>
 <!-- .row #masthead -->

  <div id="content" class="site-content">