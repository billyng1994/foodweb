<?php require_once dirname(dirname(__DIR__))."/posttitle-control.php"; ?>
<div class="container">
    <div class="row">
    <div class="col-lg-8 col-12">
    <header class="content-header">
        <div class="meta mb-3">
            <div class="category"><?php the_category('/ '); ?></div>
            <h2 class="article-title" style="overflow-wrap: anywhere"><?php the_title(); ?></h2>
            <?php
            $subheading = get_post_custom_values('subheading') ? get_post_custom_values('subheading')[0]:'';
            echo '<h3 class="subheading">' . $subheading . '</h3>';
            ?>
            <hr>
            <div style="display:flex;flex-wrap:wrap;">
            <span class="date" style="padding-right:10px;word-break: keep-all;min-width: 100px;text-wrap:nowrap;"><?php the_date() ?></span>
            <?php 
                the_tags('<div class="tag"><i class="fa fa-tag"></i>', '</div><div class="tag"><i class="fa fa-tag"></i>', '</div>')
            ?>
            </div>
            <div><?php echo the_post_thumbnail('post-thumbnail', array('style' => 'width:100%; height:auto; padding-top:0.1rem;')); ?></div>
        </div>
    </header>    
    <?php
        the_content();
        echo '<div class="d-flex justify-content-between" style="margin: 5% 0">';
        echo '<div>';
        echo previous_post_link('%link','« Previous',true);       
        echo '</div>';
        echo '<div>';
        echo next_post_link('%link','Next »',true);
        echo '</div>';
        echo '</div>';
    ?>
    </div>
    <!--popular post-->

    <div class="col-lg-4 col-12">
    <div class="sidecol"><span style="font-size: 24px;"><b>POPULAR</b></span></div>
    <?php 
        $query2 = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish','orderby' => 'comment_count', 'order' => 'DESC', 'posts_per_page' => 3 ) );
        while ( $query2->have_posts() ) {
            $query2->the_post();
            $subheading = get_post_custom_values('subheading', $query2->post->ID) ? get_post_custom_values('subheading', $query2->post->ID)[0]:'';
            $categories = get_the_category($query2->post->ID);
            echo '<div class="container postlist" style="border:none">    
            <div  style="width:-webkit-fill-available;">';
            echo '<div thumbnailContainer"><a href="'. get_permalink($query2->post->ID).'">'. get_the_post_thumbnail($query2->post->ID). '</a></div>';
            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">';
            echo '<div class="category" style="padding: 0.1rem 0;">'. get_the_category($query2->post->ID)[0]->name .'</div>';
            echo '</a>';
            echo '<div style="overflow-wrap: anywhere;">';
            echo '<a href="'. get_permalink($query2->post->ID) .'">';
            echo  print_title(get_the_title( $query2->post->ID ),120, '<h4 style="padding: 5px 0 0.1rem 0; margin: 5px 0 0.1rem 0; color: black";>','</h4>') ;
            print_title($subheading, 120, '<h5 class="subheading">', '</h5>');
            echo '</a>';
            echo '<div class="date" style="padding: 0.1rem 0">'. date('Y-m-d h:i', get_post_timestamp( $query2->post->ID )) .'</div>';
            //echo '<div class="hideinmobile" style="padding: 0.1rem 0">'. get_the_excerpt($query2->post->ID) .'</div>';
            echo '</div></div>
            </div><hr>';
        }

    ?>
    </div>
    </div>
</div>
