<?php get_header(); 
    $harbors = new WP_Query(array(
        'post_type' => 'harbor'
    ));
    $harborsArray = $harbors->posts;

    $imgUrl = "";
    
    foreach ($harborsArray as $value) {
        // echo var_dump($_SESSION['hamn']);
        // echo var_dump($value->post_title);
        if(strtolower($_SESSION['hamn']) === strtolower($value->post_title)){
            // echo var_dump($value);
            $stuff = get_post_thumbnail_id( $value->ID );
            // echo var_dump(get_the_post_thumbnail(  ));
            $imgUrl = get_the_post_thumbnail_url($value->ID, "backgroundImage");
        }
    }
    // echo var_dump($imgUrl);
?>
  
    <!-- --------Header-------- -->
    <div class="Blog">
        <div class="Blog__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
        <h1 class="SingleBlog__Title">
                Single.php
            </h1>
        ¨<div class="Blog__TitleWrapper">
            <h1 class="Blog__Title">
                <!-- här vill man göra Stor första bokstav -->
               <?php echo ucfirst($_SESSION['hamn']);?> Inlägg
            </h1>
        </div>
    </div>
<!-- --------Header slut---------- -->
    <?php

    while(have_posts()){
        the_post(); 
            ?>
            <div class="container">
                <main class="SingleBlog">
                    <article class="SingleBlog__Post">
                        <div class="SingleBlog__PostTitle">
                            <?php the_title(); ?>
                        </div>
                        <div class="SingleBlog__Text">
                            <?php the_content(); ?>
                        </div>
                        <div class="SingleBlog__ImageContainer">
                            <img src="<?php echo get_the_post_thumbnail_url();?>"class="Blog__Image">
                        </div>  
                    </article> 
                </main>
            </div>

        <?php 
    }
    ?>
     



<?php get_footer(); ?>