<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">
<div class="dontmissthis"></div><div class="thisweekend"><h2 class="cornermsg">THIS<br>WEEKEND<br>ONLY!</h2></div>
		<div class="custom-header-media">
			<?php the_custom_header_markup(); ?>
		</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

</div><!-- .custom-header -->
