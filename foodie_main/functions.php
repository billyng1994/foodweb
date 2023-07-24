<?php
require_once __DIR__ . "/posttitle-control.php";

function foodie_theme_support(){
    // Add dynamic title tag support
    add_theme_support('title_tag');

    // Add custome logo
    add_theme_support('custom-logo', array(''));

    // Add post thumbnails
    add_theme_support('post-thumbnails');
}

// 1st prarm: action of wp rending
add_action('after_setup_theme','foodie_theme_support');

function foodie_menus(){
    $locations = array(
        'primary' => "Desktop Primary Lefts Sidebar",
        'footer' => "Footer Menu Items"
    );
    register_nav_menus($locations);
}

add_action('init', 'foodie_menus');

function foodie_register_styles(){
    // this will get the version number specified in the css file
    $version = wp_get_theme()->get('Version');
    // 1st param: style name
    // 2nd param: style sheet location
    // 3rd param: stylesheet dependency e.g. main style sheet overwrite bootstrap css 
    // 4th param: version number
    // 5th param: leave it the all
    wp_enqueue_style('foodie-mainstyle', get_template_directory_uri()."/style.css", array('foodie-bootstrap'),$version,"all");
    wp_enqueue_style('foodie-fontawesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(),"5.13.0","all");
    wp_enqueue_style('foodie-bootstrap',"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", array(),"5.0.2","all");    
    //wp_enqueue_style('foodie-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(),"4.4.1","all");
}

// link up the style function to wp
add_action("wp_enqueue_scripts", "foodie_register_styles");

function foodie_register_scripts(){
    // 1st param: script name
    // 2nd param: js file location
    // 3rd param: dependency 
    // 4th param: version number
    // 5th param: true-insert in footer; false-insert in head
    wp_enqueue_script('foodie-mainjs', get_template_directory_uri()."/assests/js/main.js", array('foodie-jquery'),"1.0",true);
    //wp_enqueue_script('foodie-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array('foodie-jquery'),"4.4.1",true);
    wp_enqueue_script('foodie-bootstrap',"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js", array('foodie-jquery'),"5.0.2",true);
    wp_enqueue_script('foodie-jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array(),"3.4.1",true);
    wp_enqueue_script('foodie-popperjs',"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", true);
    wp_enqueue_script( 'full-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" , array(), "3.6.4", true );
    wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assests/js/infinite-scroll.js', array( 'full-jquery' ), '1.0', true );
}

// link up the script function to wp
add_action("wp_enqueue_scripts", "foodie_register_scripts");

function infinite_scroll() {
    $paged = $_POST['page'];

    // show only 5 pages, then give a category page menu
    if($paged > 5) {
        echo '
        <div style="display: flex; flex-wrap: wrap; margin: 1%;">
        <button style="margin: 0.3rem;border-radius: 20px;" type="button" class="btn btn-outline-secondary" onclick="window.location.href=\''. get_home_url() . '/category/districts' .'\'">DISTRICTS</button>
        <button style="margin: 0.3rem;border-radius: 20px;" type="button" class="btn btn-outline-secondary" onclick="window.location.href=\''. get_home_url() . '/category/cuisine' .'\'">CUISINE</button>
        <button style="margin: 0.3rem;border-radius: 20px;" type="button" class="btn btn-outline-secondary" onclick="window.location.href=\''. get_home_url() . '/category/michelin' .'\'">MICHELIN</button>
        <button style="margin: 0.3rem;border-radius: 20px;" type="button" class="btn btn-outline-secondary" onclick="window.location.href=\''. get_home_url() . '/category/topics' .'\'">TOPICS</button>
        <button style="margin: 0.3rem;border-radius: 20px;" type="button" class="btn btn-outline-secondary" onclick="window.location.href=\''. get_home_url() . '/category/travel' .'\'">TRAVEL</button>
        <button style="margin: 0.3rem;border-radius: 20px;" type="button" class="btn btn-outline-secondary" onclick="window.location.href=\''. get_home_url() . '/category/limited-offers' .'\'">LIMITED OFFERS</button>
        </div>
        ';
        exit;
    }

    wp_reset_postdata();
    $args = array( 'post_type' => 'post', 'post_status' => 'publish', 'orderby' => 'comment_count', 'order' => 'DESC', 'posts_per_page' => 5, 'paged' => $paged );
    $loop = new WP_Query( $args );
    while( $loop->have_posts() ) {
        $loop->the_post();
        $currentPostId = $loop->post->ID;
        if(in_array($currentPostId, $_SESSION['showposts'])) continue;
        // your post display code here
        echo '<div class="container postlist shadow-sm my-1">   
        <div class="row w-100">';
        echo '<div class="col-5 thumbnailContainer"><a href="'. get_permalink($currentPostId) .'">'. get_the_post_thumbnail($currentPostId) . '</a></div>';
        echo '<div class="col">';
        echo '<div class="category"  style="padding: 0.1rem 0;">'. get_the_category($currentPostId)[0]->name .'</div>';
        echo '<a href="'. get_permalink($currentPostId) .'">';
        echo print_title(get_the_title($currentPostId),80, '<h2 style="padding: 5px 0; margin: 5px 0; color: black; overflow-wrap: anywhere;"><b>','</b></h2>') ;
        echo '</a>';
        echo '<div class="date"  style="padding: 0.1rem 0">'. date('Y-m-d h:i', get_post_timestamp( $currentPostId )) .'</div>';
        echo '<div class="hideinmobile" style="padding: 0.1rem 0">'. get_the_excerpt($currentPostId) .'</div>';
        echo '</div></div>
        </div>';
        $_SESSION['showposts'][] = $currentPostId;
    }
    wp_reset_postdata();
    exit;
}
add_action( 'wp_ajax_infinite_scroll', 'infinite_scroll' );
add_action( 'wp_ajax_nopriv_infinite_scroll', 'infinite_scroll' );

function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" rel="nofollow">...Read More</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function mytheme_custom_excerpt_length( $length ) {
    global $post;
    //check if its chinese character input
    $chinese_output = preg_match_all("/\p{Han}+/u", $post->post_content, $matches);
    if($chinese_output) return 10;
    else  return 50;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

function wp_init_session() {
    if ( ! session_id() ) {
        session_start();
    }
}
// Start session on init hook.
add_action( 'init', 'wp_init_session' );
    

// if you create category then change the permerlink structure, this will help redirect
// function t5_redirect_to_category( $template )
// {
//     if ( ! is_404() )
//         return $template;

//     global $wp_rewrite, $wp_query;

//     if ( '/%category%/%postname%/' !== $wp_rewrite->permalink_structure )
//         return $template;

//     if ( ! $post = get_page_by_path( $wp_query->query['category_name'], OBJECT, 'post' ) )
//         return $template;

//     $permalink = get_permalink( $post->ID );

//     wp_redirect( $permalink, 301 );
//     exit;
// }

// add_filter( '404_template', 't5_redirect_to_category' );
?>