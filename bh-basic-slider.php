<?php
/**
 * @package BH Basic Slider
 * @version 1.0
 */
/*
Plugin Name: BH Basic Slider
Plugin URI: http://wordpress.org/plugins/bh-basic-slider
Description: This plugin made with flexslider. Supported all crosebrowser and Responsive. very nice and helpful slider plugin
Author: Masum Billah
Version: 1.0
Author URI: http://getmasum.com
*/


/*Some Set-up*/
define('BH_SLIDER_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

// Enqueue Flexslider Files

	function bh_slider_scripts() {
		wp_enqueue_script( 'jquery' );
		/* Adding Plugin custom CSS file */
	wp_enqueue_style('bh-flexslider-plugin-style', BH_SLIDER_PLUGIN_PATH.'css/flexslider.css');

	/* Adding plugin javascript active file */
	wp_enqueue_script('bh-flexslider-min-plugin-script', BH_SLIDER_PLUGIN_PATH.'js/jquery.flexslider-min.js', array('jquery'));
	
	}
	add_action( 'wp_enqueue_scripts', 'bh_slider_scripts' );

// Initialize Slider
	
function bh_slider_initialize() { ?>
	<script type="text/javascript">
		jQuery(function(){
			  SyntaxHighlighter.all();
			});
			jQuery(window).load(function(){
			  jQuery('.flexslider').flexslider({
				animation: "fade",
				animationLoop: true,
				itemMargin: 5,
				autoplay: 1,
				start: function(slider){
				  jQuery('body').removeClass('loading');
				}
			  });
			});
  </script>
<?php }
add_action( 'wp_footer', 'bh_slider_initialize' );
	
/*Files to Include*/
require_once('register-custom-post-type.php');
// Create Slider

// Bh Slider loop

/* BH slider Loop */
function bh_slider_template()
{ ?>
	<?php if(!is_paged()) { 
		$args = array( 'post_type' => 'bh_slider_post', 'posts_per_page' => -1 );
		$loop = new WP_Query( $args );
		?>
		<div class="flexslider">
			<ul class="slides">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<li>
					<?php the_post_thumbnail('sliderimage', array('class' => 'bh_slider_image')); ?>
					<h3 class="bh_s_caption"><?php the_title();?></h3>
				</li>
				<?php endwhile;?>
			</ul>
		</div>
<?php	wp_reset_query(); 
	} 
}


/**add the shortcode for the Slider- for use in editor**/
function bh_slider_shortcode($atts, $content=null){
	$bhslider= bh_slider_template();
	return $bhslider;
}
add_shortcode('BH-Slider', 'bh_slider_shortcode');

