<?php get_header() ?>
	<div class="main-wrapper">
		<div>this is index</div>
		<article class="content px-3 py-5 p-md-5">
			<?php
				if(have_posts()){
					while(have_posts()){
						the_post();
						//the_content();
						get_template_part( 'template-parts/content/content', 'archive');
					}
				} else {
					// If no content, include the "No posts found" template.
					get_template_part( 'template-parts/content/content-none' );				
				}
			?>
		</article>    
	</div> 
<?php get_footer() ?>