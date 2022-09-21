<?php
/**
*		CAMPERS LOOP PART
*  	---------------
*
* 	@version 0.0.2
*   @package WordPress
*   @subpackage Mybooking campers Plugin
*   @since 1.0.3
*
*   @see https://wordpress.stackexchange.com/a/232879
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Register shortcodes
 *
 */
function register_camper_shortcodes() {
  add_shortcode( 'mybooking_campers_loop', 'mybooking_campers_shortcode' );
}
add_action( 'init', 'register_camper_shortcodes' );


/**
 * campers shortcode callback
 *
 */
function mybooking_campers_shortcode() {
    global $wp_query,
           $post;

    $campers_loop = new WP_Query( array(
        'posts_per_page'    => 6,
        'post_type'         => 'camper',
    ) );

    if( ! $campers_loop->have_posts() ) {
        return false;
    } ?>

    <div class="mb-shortcode mybooking-campers">
    	<div class="mb-container">
    		<div class="mb-row">
    			<div class="mb-col-md-12">
            <div class="mybooking-campers_grid">

              <?php if ( have_posts() ) : ?>
    					  <?php while ( have_posts() ) : the_post(); ?>

    					    <?php include('loop-part.php'); ?>

    					  <?php endwhile; ?>

    					<!-- No content -->
    					<?php else : ?>
    					  <h3><?php echo esc_html_x( 'No content found. Please publish at least one post to show something at here', 'blog_message', 'mybooking' ); ?></h3>
    					<?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>

  <?php  wp_reset_postdata();
}
