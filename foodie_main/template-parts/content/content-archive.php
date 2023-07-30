<?php 
require_once dirname(dirname(__DIR__))."/posttitle-control.php";
?>
<div class="container postlist shadow-sm my-1">    
    <div class="row">
        <div class="col-5 thumbnailContainer"><a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail();?></a></div>
        <div class="col">
            <div class="category"><?php the_category('/ ');?></div>
            <a href="<?php the_permalink(); ?>" style="color: black">                
                <h2 style="margin: 5px 0; color: black; overflow-wrap: anywhere; margin-bottom:0.1rem;"><b>
                    <?php 
                    // $text_threshold = 25;
                    // if(strlen(the_title()) >= $text_threshold ){
                    //     echo substr(get_the_title( $query->post->ID ), 0 , $text_threshold ) . "...";
                    // }
                    // echo the_title(); 
                    print_title(the_title($before = '', $after = '', $display = false ), 30);
                    ?>
                </b></h2>
                <?php
                $subheading = get_post_custom_values('subheading') ? get_post_custom_values('subheading')[0]:'';
                print_title($subheading, 120, '<h5 class="subheading">', '</h5>');
                ?>
            </a>
            <?php echo '<div class="date">'. date('Y-m-d h:i', get_post_timestamp()) .'</div>'; ?>
            <?php echo the_excerpt(); ?>
            <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>'); ?>
        </div>
    </div>    
</div>
