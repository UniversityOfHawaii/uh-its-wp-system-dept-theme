<?php
/**
 * The loop that displays a page
 *
 * The loop displays the posts and the post content. See
 * https://codex.wordpress.org/The_Loop to understand it and
 * https://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 */
?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) :
    the_post();
  ?>

    <div id="container">
      <div id="content" role="main">

        <?php system2018_get_breadcrumbs(); ?>

        <div class="featured-image">
          <?php the_post_thumbnail( 'full' ); ?>
        </div>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-content">

            <?php if(is_page_template('page-onecolumn.php')) : ?>
              <div class="container">
            <?php endif; ?>

            <?php the_content(); ?>

            <?php if(is_page_template('page-onecolumn.php')) : ?>
              </div>
            <?php endif; ?>

            <?php
            wp_link_pages(
              array(
                'before' => '<div class="page-link">' . __( 'Pages:', 'system2018' ),
                'after'  => '</div>',
              )
            );
            ?>
            <?php edit_post_link( __( 'Edit', 'system2018' ), '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-content -->
        </div><!-- #post-## -->

        <?php //comments_template( '', true ); ?>
      </div>
    </div>

<?php endwhile;
}; // end of the loop. ?>
