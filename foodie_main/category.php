<?php 
get_header();
?>
<div class="main-wrapper">
<h1 style="text-align: center; background-color: grey; padding: 36px; color: white; margin: 2% 0;border: solid; border-style: double; border-width: 10px;"><?php echo wp_title('');?></h1>

<?php 
/* Start the Loop */
while ( have_posts() ) :
	the_post();
    //the_content();
	get_template_part( 'template-parts/content/content', 'archive');

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
the_posts_pagination(array(
    'mid_size'  => 2,
    'prev_text' => '«',
    'next_text' => '»',
) );

echo "</div> ";
get_footer();