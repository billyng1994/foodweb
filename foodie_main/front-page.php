<?php
require_once __DIR__ . "/posttitle-control.php";
 get_header(); 
 if(have_posts()){
	while(have_posts()){
		the_post();
		the_content();
		//get_template_part( 'template-parts/content/content', 'archive');
	}
} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );				
}
 ?>
<div class="main-wrapper" style="min-height:auto">
	<article class="content px-3 py-5">
		<?php
			// Recent posts
			wp_reset_postdata();

			echo "<div class='stitle'>
				<span>LATEST</span>
			</div>";

			$firstHotpost = true;
			echo 
			'<div class="hottopic">';

			$query = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'offset' => 0 ) );
			$count_small_posts = 1;
			while ( $query->have_posts() ) {
				$query->the_post();
				$categories = get_the_category($query->post->ID);
				if($firstHotpost){
					//echo '<div class="col-8">';
					echo '<div class="hottopicpostscontainer" style="width: 65%;">';
					echo '<div class="category" style="padding: 0.1rem 0;">'. '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . $categories[0]->name . '</a>' .'</div>';
					echo '<a href="'. get_permalink($query->post->ID) .'">'.get_the_post_thumbnail( $query->post->ID, 'thumbnail', array( 'style' => 'max-width:100%;width:100%;height:auto;' )  ) . '</a></div>';
					//echo '</div>';
					echo '<div class="hottopicpostscontainer" style="display: flex; width: 33%; flex-direction: column">';
					$firstHotpost = false;
				} else {

					//echo '<div class="col d-flex">';
					echo '<div style="display:flex; align-items: center; text-align: left; padding: 1rem; border-bottom: 1px solid #eee;">';
					echo '<a style="width:45%; height:45%; min-width: 45%; text-decoration: none" href="'. get_permalink($query->post->ID) .'">';
					//echo get_the_post_thumbnail( $query->post->ID, 'thumbnail', array( 'style' => 'width: 45%; height: 45%;' )  ) ;
					echo get_the_post_thumbnail( $query->post->ID, 'thumbnail', array( 'style' => 'width: 100%; height: 100%;' )  ) ;
					echo '</a>';
					echo '<div style="padding-left: 1rem; overflow-wrap:anywhere;">';
					echo '<div class="category" style="padding: 0.1rem 0;">'. '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . $categories[0]->name . '</a>' .'</div>';
					echo '<a style="text-decoration: none" href="'. get_permalink($query->post->ID) .'"><h4 style="color:black">';

					// $text_threshold = 25;
					// if(strlen(get_the_title( $query->post->ID )) >= $text_threshold ){
					// 	echo substr(get_the_title( $query->post->ID ), 0 , $text_threshold ) . "...";
					// } else { 
					// 	echo get_the_title( $query->post->ID );
					// }
					print_title(get_the_title( $query->post->ID ));

					echo '</h4></a>';
					echo '</div>';
					echo '</div>';
					$count_small_posts++;
				}

			}
			//echo '</div></div>';
			echo '</div></div>';
			echo '</div>';
			
			// Mid banner
			echo apply_filters( 'a3_lazy_load_images', '<div id="midbanner"></div>', null );			

			echo '<div class="main-wrapper" style="min-height:auto">';

			// Trending posts
			echo "<div class='stitle' style='margin:2rem 0'>
				<span>TRENDING</span>
			</div>";

			wp_reset_postdata();
			$query2 = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish','orderby' => 'comment_count', 'order' => 'DESC', 'posts_per_page' => 5 ) );

			echo '<div class="infinite-scroll-wrap" data-next-page="2" data-max-pages="' . $query2->max_num_pages . '" data-ajax-url='. admin_url('admin-ajax.php') .'>';

			while ( $query2->have_posts() ) {
				$query2->the_post();
				$categories = get_the_category($query2->post->ID);
				echo '<div class="container postlist shadow-sm  my-1">    
				<div class="row">';
				echo '<div class="col-5 thumbnailContainer"><a href="'. get_permalink($query2->post->ID).'">'. get_the_post_thumbnail($query2->post->ID). '</a></div>';
				echo '<div class="col">';
				echo '<div class="category" style="padding: 0.1rem 0;">'.  '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' .  $categories[0]->name . '</a>' . '</div>';
				echo '<a href="'. get_permalink($query2->post->ID) .'">';
				echo print_title(get_the_title( $query2->post->ID ),30, '<h2 style="margin: 5px 0; color: black;">','</h2>') ;
				echo '</a>';
				echo '<div class="date" style="padding: 0.1rem 0">'. date('Y-m-d h:i', get_post_timestamp( $query2->post->ID )) .'</div>';
				echo '<div class="hideinmobile" style="padding: 0.1rem 0">'. get_the_excerpt($query2->post->ID) .'</div>';
				echo '</div></div>
				</div>';
			}
			echo '</div>';
		?>
	</article>  
	<hr>
</div> 

<div id="giveawayContainer"></div>  
<?php get_footer() ?>