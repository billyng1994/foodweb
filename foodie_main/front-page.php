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
	<article class="content px-3 py-5 p-md-5">
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
				if($firstHotpost){
					//echo '<div class="col-8">';
					echo '<div class="hottopicpostscontainer" style="width: 65%;"><a href="'. get_permalink($query->post->ID) .'">'.get_the_post_thumbnail( $query->post->ID, 'thumbnail', array( 'style' => 'max-width:100%;width:100%;height:auto;' )  ) . '</a></div>';
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
					echo '<div style="padding-left: 1rem; overflow-wrap:anywhere;"><a style="text-decoration: none" href="'. get_permalink($query->post->ID) .'">'.'<h4>';

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
			echo '<div id="midbanner"><img src="wp-content\themes\foodie_main\assests\images\midbanner.png"/></div>';

			echo '<div class="main-wrapper" style="min-height:auto">';

			// Trending posts
			echo "<div class='stitle' style='margin:1rem 0'>
				<span  style='background-color: white; color: black;'>TRENDING</span>
			</div>";

			wp_reset_postdata();
			$query2 = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish','orderby' => 'comment_count', 'order' => 'DESC', 'posts_per_page' => 5 ) );

			echo '<div class="infinite-scroll-wrap" data-next-page="2" data-max-pages="' . $query2->max_num_pages . '" data-ajax-url='. admin_url('admin-ajax.php') .'>';

			while ( $query2->have_posts() ) {
				$query2->the_post();

				echo '<div class="container postlist">    
				<div class="row">';
				echo '<div class="col-5 thumbnailContainer"><a href="'. get_permalink($query2->post->ID).'">'. get_the_post_thumbnail($query2->post->ID). '</a></div>';
				echo '<div class="col">';
				echo '<a href="'. get_permalink($query2->post->ID) .'">';
				echo print_title(get_the_title( $query2->post->ID ),30, '<h2 style="padding: 5px 0; margin: 5px 0;">','</h2>') ;
				echo '</a>';
				echo '<div style="padding: 0.1rem 0">'. get_the_category($query2->post->ID)[0]->name .'</div>';
				echo '<div style="padding: 0.1rem 0">'. date('Y-m-d h:i', get_post_timestamp( $query2->post->ID )) .'</div>';
				echo '<div class="hideinmobile" style="padding: 0.1rem 0">'. get_the_excerpt($query2->post->ID) .'</div>';
				echo '</div></div>
				</div>';
			}
			echo '</div>';
		?>
	</article>  
</div> 
<div id="giveawayContainer"></div>  
<?php get_footer() ?>