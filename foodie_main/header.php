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
                    <a class="nav-link text-light" href="#nav-districts" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-districts">DISTRICTS</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-districts">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/districts/hkl'; ?>">HONG KONG 港島</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/districts/kln'; ?>">KOWLOON 九龍</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/districts/nt'; ?>">NEW TERRITORIES 新界</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" href="#nav-cuisine" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-cuisine">CUISINE</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-cuisine">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/japanese'; ?>">JAPANESE</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/western'; ?>">WESTERN</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/french'; ?>">FRENCH</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/spanish'; ?>">SPANISH</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/italian'; ?>">ITALIAN</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/korean'; ?>">KOREAN</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/thai'; ?>">THAI</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/chinese'; ?>">CHINESE</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/others'; ?>">OTHERS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" href="#nav-michelin" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-michelin">MICHELIN</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-michelin">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/one-stars'; ?>">1 STARS</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/two-stars'; ?>">2 STARS</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/three-stars'; ?>">3 STARS</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/michelin-guide'; ?>">MICHELIN GUIDE</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link text-light" href="#nav-topics" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nav-topics">TOPICS</a>
                    <ul class="collapse  p-0 m-0 w-100 bg-light" id="nav-topics">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/brunch'; ?>">BRUNCH</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/dinning'; ?>">DINING WITH A VIEW</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/bar'; ?>">BAR</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/cafe'; ?>">CAFE</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/tea-set'; ?>">TEA SET</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/buffet'; ?>">BUFFET</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/hk-food'; ?>">HK LOCAL FOOD</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/entertainment'; ?>">ENTERTAINMENT</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?php echo get_site_url().'/category/topics/travel'; ?>">TRAVEL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?php echo get_site_url().'/category/topics/limited-offers'; ?>">LIMITED OFFERS</a>
                </li>
                </ul>
            </div>
        </nav>





        <nav class="navbar navbar-expand-sm bg-dark" id="sectionbar">               
            <div class="container-fluid justify-content-around">
                <!-- Links -->
                <ul class="navbar-nav">
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">DISTRICTS</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/districts/hkl'; ?>">HONG KONG 港島</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/districts/kln'; ?>">KOWLOON 九龍</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/districts/nt'; ?>">NEW TERRITORIES 新界</a></li>
                    </ul>      
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">CUISINE</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/japanese'; ?>">JAPANESE</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/western'; ?>">WESTERN</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/french'; ?>">FRENCH</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/spanish'; ?>">SPANISH</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/italian'; ?>">ITALIAN</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/korean'; ?>">KOREAN</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/thai'; ?>">THAI</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/chinese'; ?>">CHINESE</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/cuisine/others'; ?>">OTHERS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">MICHELIN</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/one-stars'; ?>">1 STARS</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/two-stars'; ?>">2 STARS</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/three-stars'; ?>">3 STARS</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/michelin/michelin-guide'; ?>">MICHELIN GUIDE</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">TOPICS</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/brunch'; ?>">BRUNCH</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/dinning'; ?>">DINING WITH A VIEW</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/bar'; ?>">BAR</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/cafe'; ?>">CAFE</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/tea-set'; ?>">TEA SET</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/buffet'; ?>">BUFFET</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/hk-food'; ?>">HK LOCAL FOOD</a></li>
                        <li><a class="dropdown-item" href="<?php echo get_site_url().'/category/topics/entertainment'; ?>">ENTERTAINMENT</a></li>
                    </ul>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-light" href="<?php echo get_site_url().'/category/topics/travel'; ?>">TRAVEL</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-light" href="<?php echo get_site_url().'/category/topics/limited-offers'; ?>">LIMITED OFFERS</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
        <!-- <header class="page-title theme-bg-light text-center gradient py-5"> -->
            <!-- <h1 class="heading"><?php //echo get_bloginfo('name')?></h1> -->
        <!-- </header> -->