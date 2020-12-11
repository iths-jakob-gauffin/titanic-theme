<?php get_header(); ?>
<h1>archive-harbor.php</h1>

<?php 

    while(have_posts()){
        the_post();
        ?>
            <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
        <?php
    }
?>



<?php get_footer(); ?>






