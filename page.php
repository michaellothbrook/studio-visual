<?php

/**
 * Template Name: Page (Default)
 * Description: Page template Default.
 *
 */

get_header();

the_post();
?>
<div class="row">
	<?php
	the_content(); ?>
</div><!-- /.row -->
<?php
get_footer();
