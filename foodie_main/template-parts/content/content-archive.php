<?php 
require_once dirname(dirname(__DIR__))."/posttitle-control.php";
?>
<div class="container postlist">    
    <div class="row">
        <div class="col-5 thumbnailContainer"><a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail();?></a></div>
        <div class="col">
            <div class="category"><?php the_category('/ ');?></div>
            <a href="<?php the_permalink(); ?>" style="color: black">
                <h2 style="padding: 5px 0; margin: 5px 0;">
                    <?php 
                    // $text_threshold = 25;
                    // if(strlen(the_title()) >= $text_threshold ){
                    //     echo substr(get_the_title( $query->post->ID ), 0 , $text_threshold ) . "...";
                    // }
                    // echo the_title(); 
                    print_title(the_title($before = '', $after = '', $display = false ), 30);
                    ?>
                </h2>
            </a>
            <?php echo '<div class="date">'. date('Y-m-d h:i', get_post_timestamp()) .'</div>'; ?>
            <?php echo the_excerpt(); ?>
            <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>'); ?>
        </div>
    </div>    
</div>
