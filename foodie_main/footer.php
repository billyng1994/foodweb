<!-- Bootstrap Javascript -->          
<footer class="footer text-center py-2 bg-dark text-light" style="max-width:100%">
    <div class="container" style="max-width:1200px;">
    <div class="row">		   
        <div class="col-12 col-sm-3 d-flex flex-column align-items-start mx-sm-4">		   
            <p class="m-2 m-sm-3"><a href="" style="text-decoration: none; color: white;">CONTACT US</a></p>   
            <p class="m-2 m-sm-3"><a href="" style="text-decoration: none; color: white;">ABOUT US</a></p>       
            <p class="m-2 m-sm-3"><a href="" style="text-decoration: none; color: white;">ADVERTISE</a></p>
            <p class="m-2 m-sm-3"><a href="" style="text-decoration: none; color: white;">TERMS & CONDITIONS</a></p>

        </div>
        <div class="col d-flex flex-column justify-content-end">
            <div class="social-media-icon">
                <a href="https://www.facebook.com/profile.php?id=100063727974911" target="_blank"><img style="width: 40px; margin: 1%;" src="<?php echo get_template_directory_uri()?>/assests/images/icons8-facebook-50.png" alt="FBLogo"></a>
                <a href="https://www.instagram.com/foodcafealcoholic/" target="_blank"><img style="width:50px; height:50px; margin: 1%;" src="<?php echo get_template_directory_uri()?>/assests/images/icons8-instagram-48.png" alt="IGLogo"></a>
            </div>
            <p class="m-2 m-sm-3">COPYRIGHT © 2023</p>
        </div>
    </div>
    </div>
</footer>
<?php 
    // use wp hook to inject js file in the head including cdn js file like bootstrap
    // see foodie_register_script function in function.php
    wp_footer(); 
?>
</body>
</html> 