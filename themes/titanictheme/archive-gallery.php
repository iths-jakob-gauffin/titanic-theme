<?php get_header(); 

    $harbors = new WP_Query(array(
        'post_type' => 'harbor'
    ));

    $harborsArray = $harbors->posts;
    // jag vill ta fram posten med samma post_title som sessionsvariabeln, för att komma åt den postens thumbnail

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
<!-- 
    <h1>Det här är archive-gallery.php</h1> -->
    <?php 
    
    ?>
    <div class="Gallery">
        <div class="Gallery__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
        ¨<div class="Gallery__TitleWrapper">
            <h1 class="Gallery__Title">
                Personal
            </h1>
        </div>
        <div class="Gallery__StaffBox">
            <p class="Gallery__StaffTitle">Här kan du logga in</p>
            <a href="<?php echo wp_login_url();?>" class="Gallery__Button">Logga in</a>
            <a href="<?php echo wp_registration_url();?>" class="Gallery__Button">Skapa konto</a>
        </div>
    </div>


    <div class="container"> 
    <!-- <div class="blogcontainer">       -->
    <ul class="Gallery__List">
        
        <?php
        // global $post;
        // echo var_dump($post);
        while(have_posts()){    
            the_post();

            // $hamnIVillkoret = get_field("hamn");
            // echo var_dump($hamnIVillkoret);

            $staff = get_field('hamn')[0]->post_title;  

            // echo var_dump($staff);

            // $image = get_field('gallery_image')['sizes']['medium'];
            $image = get_field('gallery_image')['sizes']['pizza'];
            $galleryName = get_field('gallery_name');
            $galleryTitle =get_field('gallery_title');
            $galleryContactEmail =get_field('gallery_contactemail');
            $galleryContactNumber =get_field('gallery_contactnumber');

            if(strtolower($staff) === strtolower($_SESSION['hamn'])){
                ?>
                <li class="Gallery__ListItem">
                    <ul class="Gallery__CardList">
                        <li class="Gallery__CardListItem">
                            <div class="Gallery__CardImageWrapper">
                                <img src="<?php echo $image; ?>" class="Gallery__Image" alt="">
                            </div>

                            <div class="Gallery__ContentWrapper">
                            <h1 class="Gallery__CardTitle">
                                <?php  echo $galleryName;?>
                            </h1>

                            <h2 class="Gallery__CardExcerpt">
                            <!-- <?php the_excerpt(); ?> -->
                            <?php echo $galleryTitle; ?>
                            </h2>   

                            <h2 class="Gallery__CardContent">
                            <!-- <?php the_content(); ?> -->
                            Email: 
                            <?php echo $galleryContactEmail;  ?>

                            </h2>   
                            <h2 class="Gallery__CardContent">
                            <!-- <?php the_content(); ?> -->
                            Tel: 
                            <?php echo $galleryContactNumber;  ?>
                            </h2>   
                            </div>
                        </li>
                    </ul>    
                </li>
                <?php

                }   

                }
                wp_reset_postdata();
                ?>
            
        </ul>
    </div>
</div>

<?php get_footer(); ?>