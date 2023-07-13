<!DOCTYPE html>
<html lang="en"> 

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="foodie site">
    <meta name="author" content="Billy Ng">    
        
	<!-- Theme CSS -->    
    <?php 
        // use wp hook to inject css in the head including cdn css like bootstrap and fontawesome
        // see foodie_register_styles function in function.php
        wp_head(); 
        if(explode("/",get_page_uri())[0] == 'home'){
            echo '<style>p { font-size: 13px; }</style>';
        } else echo '<style>p { font-size: 17px; }</style>';;
    ?>
</head> 
<body>    
    <header class="header text-center">
        
        <?php  
            // wp_nav_menu(
            //     array(
            //         'menu' => 'primary',
            //         'container' => '',
            //         'theme_location' => 'primary',
            //         'items_wrap' => '<ul id="" class="navbar navbar-expand-lg navbar-light bg-light">%3$s</ul>'
            //     )
            // )
        ?>
        <!--section bar-->

        <div class="container bandhead">
            <div class="row align-items-center">
                <div class="col"><i class="fas fa-bars" id="navbarcontrol"></i></div>
                <div class="col col-lg-12">
                    <?php if(function_exists('the_custom_logo')) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id);
                    }
                    ?>
                    <a href="<?php echo get_site_url(); ?>"><img class="mb-3 mx-auto logo d-block" src="<?php echo $logo[0] ?>" alt="logo"></a>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <nav class="navbar bg-dark" id="mobilesectionbar" style="margin-top: 0px; top: 0">               
            <div class="container-fluid">
                <!-- Links -->
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?php echo get_site_url().'/category/fasion'; ?>">FASHION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#nav-districts" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-districts">DISTRICTS</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-districts">
                        <li><a class="dropdown-item" href="#">HONG KONG 港島</a></li>
                        <li><a class="dropdown-item" href="#">KOWLOON 九龍</a></li>
                        <li><a class="dropdown-item" href="#">NEW TERRITORIES 新界</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" href="#nav-cuisine" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-cuisine">CUISINE</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-cuisine">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/japanese'; ?>">JAPANESE</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/western'; ?>">WESTERN</a></li>
                        <li><a class="dropdown-item" href="#">FRENCH</a></li>
                        <li><a class="dropdown-item" href="#">SPANISH</a></li>
                        <li><a class="dropdown-item" href="#">ITALIAN</a></li>
                        <li><a class="dropdown-item" href="#">KOREAN</a></li>
                        <li><a class="dropdown-item" href="#">THAI</a></li>
                        <li><a class="dropdown-item" href="#">CHINESE</a></li>
                        <li><a class="dropdown-item" href="#">OTHERS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" href="#nav-michelin" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-michelin">MICHELIN</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-michelin">
                        <li><a class="dropdown-item" href="#">1 STARS</a></li>
                        <li><a class="dropdown-item" href="#">2 STARS</a></li>
                        <li><a class="dropdown-item" href="#">3 STARS</a></li>
                        <li><a class="dropdown-item" href="#">MICHELIN GUIDE</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link text-light" href="#nav-topics" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-topics">TOPICS</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-topics">
                        <li><a class="dropdown-item" href="#">BRUNCH</a></li>
                        <li><a class="dropdown-item" href="#">DINING WITH A  VIEW</a></li>
                        <li><a class="dropdown-item" href="#">BAR</a></li>
                        <li><a class="dropdown-item" href="#">CAFE</a></li>
                        <li><a class="dropdown-item" href="#">TEA SET</a></li>
                        <li><a class="dropdown-item" href="#">BUFFET</a></li>
                        <li><a class="dropdown-item" href="#">HK LOCAL FOOD</a></li>
                        <li><a class="dropdown-item" href="#">ENTERTAINMENT</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">TRAVEL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">LIMITED OFFERS</a>
                </li>
                </ul>
            </div>
        </nav>





        <nav class="navbar navbar-expand-sm bg-dark" id="sectionbar">               
            <div class="container-fluid justify-content-around">
                <!-- Links -->
                <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a class="nav-link text-white" href="<?php echo get_site_url().'/category/fasion'; ?>">FASHION</a>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">DISTRICTS</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item my-2" href="#">HONG KONG 港島</a></li>
                        <li><a class="dropdown-item my-2" href="#">KOWLOON 九龍</a></li>
                        <li><a class="dropdown-item my-2" href="#">NEW TERRITORIES 新界</a></li>
                    </ul>      </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">CUISINE</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item my-2" href="<?php echo get_site_url().'/category/cuisine/japanese'; ?>">JAPANESE</a></li>
                        <li><a class="dropdown-item my-2" href="<?php echo get_site_url().'/category/cuisine/western'; ?>">WESTERN</a></li>
                        <li><a class="dropdown-item my-2" href="#">FRENCH</a></li>
                        <li><a class="dropdown-item my-2" href="#">SPANISH</a></li>
                        <li><a class="dropdown-item my-2" href="#">ITALIAN</a></li>
                        <li><a class="dropdown-item my-2" href="#">KOREAN</a></li>
                        <li><a class="dropdown-item my-2" href="#">THAI</a></li>
                        <li><a class="dropdown-item my-2" href="#">CHINESE</a></li>
                        <li><a class="dropdown-item my-2" href="#">OTHERS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">MICHELIN</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item my-2" href="#">1 STARS</a></li>
                        <li><a class="dropdown-item my-2" href="#">2 STARS</a></li>
                        <li><a class="dropdown-item my-2" href="#">3 STARS</a></li>
                        <li><a class="dropdown-item my-2" href="#">MICHELIN GUIDE</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">TOPICS</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item my-2" href="#">BRUNCH</a></li>
                        <li><a class="dropdown-item my-2" href="#">DINING WITH A  VIEW</a></li>
                        <li><a class="dropdown-item my-2" href="#">BAR</a></li>
                        <li><a class="dropdown-item my-2" href="#">CAFE</a></li>
                        <li><a class="dropdown-item my-2" href="#">TEA SET</a></li>
                        <li><a class="dropdown-item my-2" href="#">BUFFET</a></li>
                        <li><a class="dropdown-item my-2" href="#">HK LOCAL FOOD</a></li>
                        <li><a class="dropdown-item my-2" href="#">ENTERTAINMENT</a></li>
                    </ul>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-light" href="#">TRAVEL</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-light" href="#">LIMITED OFFERS</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
        <!-- <header class="page-title theme-bg-light text-center gradient py-5"> -->
            <!-- <h1 class="heading"><?php //echo get_bloginfo('name')?></h1> -->
        <!-- </header> -->