<?php get_header(); ?>

    <h1>Det här är page-staff-gallery.php</h1>
    <div class="container">
    <?php

    $gallery = new WP_Query(array('post_type' => 'gallery'));

    while($gallery->have_posts()){    
        $gallery->the_post();

        $staff = get_field('hamn')[0]->post_title;  

        $image = get_field('gallery_image')['sizes']['medium'];

        if(strtolower($staff) === strtolower($_SESSION['hamn'])){
            ?>
        
            <ul class="Events__List">
                <li class="Events__ListItem">
                    <h1 class="Events__Title">
                        <?php the_title(); ?>
                    </h1>   
                    <?php the_content(); the_excerpt(); 
                    ?>
                    <div class="StaffGallery__ImageWrapper">
                        <img src="<?php echo $image; ?>" class="StaffGallery__Image" alt="">
                    </div>
                </li>
            </ul>
        
        <?php

        }

    }
    wp_reset_postdata();
    ?>
    </div>

<?php get_footer(); ?>