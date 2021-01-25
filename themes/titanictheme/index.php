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

    // global $query_string;
    // echo var_dump($query_string);
    
    // $test = wp_parse_str( $query_string, $search_query );
    // echo var_dump($search_query);
    // $search = new WP_Query( $search_query );
?>
    
    <!-- <h1>Det hääär är Index.php</h1> -->
    <!-- --------Header-------- -->
    <!-- <div class="Blog"> -->
        <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                <?php echo ucfirst($_SESSION['hamn']); ?>s blogg
                </h1>
            </div>
        </div>  
    </div>  
    <!-- </div> -->
<!-- --------Header slut---------- -->

    <div class="container">
    <main class="Blog">
    <?php
        while(have_posts()){
        the_post();
        $hamnen = get_field("hamn")[0]->post_title;
        // echo var_dump($hamnen);
        // echo var_dump($_SESSION['hamn']);

        if (strtolower($hamnen) === strtolower($_SESSION['hamn'])){
        ?>
        
        <article class="Blog__Post">
            <a href="<?php the_permalink(); ?>" class="Blog__PostLink"></a>
                <div class="Blog__ImageContainer">
                    <img src="<?php echo get_the_post_thumbnail_url();?>" class="Blog__Image">
                </div>
                <h2 class="Blog__PostTitle"><?php the_title(); ?></h2>
                <h5 class="Blog__PostDate">Skrivet av  <?php  echo get_the_author(); ?> , <?php  echo get_the_date(); ?>
                </h5>
                <div class="Blog__Text">
                    <?php $text = get_the_content();?> <?php echo wp_trim_words($text, 50); ?> 
                </div>    
        </article> 
            <div class="Blog__HrLine"><hr class="FrontPage__Hr"></div>    
        
    <?php
        }
    }
    wp_reset_postdata();
    ?>   
        </main>
    </div>

<?php get_footer(); ?>