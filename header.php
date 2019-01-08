<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="fa-events-icons-ready">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) {
  echo " | $site_description";
}

  // Add a page number if necessary:
if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
  echo esc_html( ' | ' . sprintf( __( 'Page %s', 'system2018' ), max( $paged, $page ) ) );
}
  ?>
  </title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- get favicon -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icon.png" />
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
<!-- load google fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700|Source+Code+Pro" rel="stylesheet">
<!-- load font awesome icons -->
<script src="https://use.fontawesome.com/bfcbe1540c.js"></script>
<?php if( is_page_template('page-onecolumn.php') || is_front_page() ) : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="top">
  <a href="#main_area" id="skip2main">Skip to Main Content</a>
  <div id="header_top">
    <div id="header_top_content">
      <ul id="header_mainmenu">
        <li><a href="https://www.hawaii.edu/">Home</a></li>
        <li><a href="https://www.hawaii.edu/calendar/">Calendar</a></li>
        <li><a href="https://www.hawaii.edu/directory/">Directory</a></li>
        <li><a href="https://myuh.hawaii.edu/">MyUH</a></li>
        <li><a href="http://workatuh.hawaii.edu/">Work at UH</a></li>
      </ul>
      <div id="header_smrow">
        <a href="https://twitter.com/UHawaiiNews">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" class="header_smicon" />
        </a> &nbsp;
        <a href="https://www.facebook.com/universityofhawaii">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" class="header_smicon" />
        </a> &nbsp;
        <a href="https://instagram.com/uhawaiinews/">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" alt="instagram" class="header_smicon" />
        </a> &nbsp;
        <a href="http://www.flickr.com/photos/uhawaii">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon-flickr.png" alt="flickr" class="header_smicon" />
        </a> &nbsp;
        <a href="https://www.youtube.com/user/uhmagazine">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" alt="youtube" class="header_smicon" />
        </a>
      </div>
    </div>
  </div>
  <div id="header_mid">
    <div class="container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
        <img id="header_mid_logo" src="<?php echo get_template_directory_uri(); ?>/images/uh-nameplate.png" srcset="<?php echo get_template_directory_uri(); ?>/images/uh-nameplate.png 1x, <?php echo get_template_directory_uri(); ?>/images/uh-nameplate-2x.png 2x" alt="University of Hawai&#699;i at M&#257;noa" />
      </a>
      <?php get_search_form(); ?>
    </div>
  </div>
  <div id="department_name">
    <div class="container">
      <div class="site-name-description">
        <h1 id="header_sitename">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>
        <?php if( $site_description): ?>
          <div id="header_sitedescription">
            <?php echo $site_description; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <nav id="header_btm">
    <button class="menu-toggle" aria-expanded="false">Menu <span class="screen-reader-text">Open Mobile Menu</span></button>
    <?php if ( has_nav_menu( 'primary' ) ) : ?>

      <div id="header_btm_content">
        <?php wp_nav_menu(
          array(
            'theme_location'  => 'primary',
            'menu_id'         => 'header_sitemenu',
            'container'       => false,
            'container_id'    => false,
            'depth'           => 2
          )
        ); ?>
      </div>

    <?php else : ?>

      <?php $menu = array(
        'depth'        => 1,
        'sort_column'  => 'menu_order, post_title',
        'menu_class'   => 'menu page-menu',
        'menu_id'      => 'header_btm_content',
        'echo'         => 1,
        'authors'      => '',
        'sort_column'  => 'menu_order',
        'link_before'  => '',
        'link_after'   => '',
      );
      wp_page_menu( $menu ); ?>

    <?php endif; ?>

    <?php get_search_form(); ?>
  </nav>
</header>

