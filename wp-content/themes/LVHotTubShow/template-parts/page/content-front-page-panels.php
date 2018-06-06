<?php
/**
 * Template part for displaying pages on front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >
	<div class="dontmissthis"></div><div class="thisweekend"><h2 class="cornermsg">THIS<br>WEEKEND<br>ONLY!</h2></div>
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>

		<div class="site-branding" style="margin-bottom:0 !important;">
			<div class="wrap">
<div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
				<div class="htl_logo"><img src="/wp-content/themes/LVHotTubShow/images/HTL_logo.png" alt="Hot Tub Liquidators!">
				<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :
			?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php endif; ?>
				</div>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">SWIM SPAS<br>LAS VEGAS</a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">SWIM SPAS<br>LAS VEGAS</a></p>
			<?php endif; ?>

			<div class="menu-scroll-up-pseudo nobg up"><img src="/wp-content/themes/LVHotTubShow/images/up.png" alt="Up Arrow" class="opacity77"></div>
			
		<div class="menu-scroll-down-pseudo nobg down"><img src="/wp-content/themes/LVHotTubShow/images/down.png" alt="Down Arrow" class="opacity77"></div>
		</div><!-- .site-branding-text -->
		
		

			</div><!-- .wrap -->
			</div>
			
			</div><!-- .panel-image -->

	<?php endif; ?>
	
	<div class="panel-content">
		<div class="wrap">
			<!--<header class="entry-header">
				< ?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				< ?php twentyseventeen_edit_link( get_the_ID() ); ?>

			</header> .entry-header -->

			<div class="entry-content fullwidth">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
				<?php twentyseventeen_edit_link( get_the_ID() ); ?>
			</div><!-- .entry-content -->

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>

				<?php // Show four most recent posts.
				$recent_posts = new WP_Query( array(
					'posts_per_page'      => 3,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				?>

		 		<?php if ( $recent_posts->have_posts() ) : ?>

					<div class="recent-posts">

						<?php
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->
</article><!-- #post-## -->


<?php
$loudmessage = get_post_meta(get_the_ID(), 'loudmessage', true);
if ($loudmessage) {
echo '<div class="loudmessage"><h1>'.$loudmessage.'</h1></div>';}			
?><!-- .loudmessage -->
