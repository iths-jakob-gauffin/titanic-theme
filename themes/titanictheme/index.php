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

    global $query_string;
    // echo var_dump($query_string);
    
    $test = wp_parse_str( $query_string, $search_query );
    echo var_dump($search_query);
    $search = new WP_Query( $search_query );
    ?>
    
    <h1>Det hääär är Index.php</h1>
    <!-- --------Header-------- -->
    <div class="Blog">
        <div class="Blog__BackgroundImage" style="background: url('<?php echo $imgUrl; ?>')">
        ¨<div class="Blog__TitleWrapper">
            <h1 class="Blog__Title">
               Blogg
            </h1>
        </div>
    </div>
<!-- --------Header slut---------- -->

    <?php

    while(have_posts()){
        the_post();
        $hamnen = get_field("hamn")[0]->post_title;
        echo var_dump($hamnen);
        echo var_dump($_SESSION['hamn']);

        if (strtolower($hamnen) === strtolower($_SESSION['hamn'])){
        ?>
        <div class="container">
            <main class="Blog">
                <article class="Blog__Post">
                    <a href="<?php the_permalink(); ?>" class="Blog__PostLink"></a>


                    <!-- här gör vi en container, bestäm storlek i scccen-->
                    <div class="Blog__ImageContainer">
                        <img src="<?php echo get_the_post_thumbnail_url();?>" class="Blog__Image">
                    </div>
                        <h2 class="Blog__PostTitle">
                            <?php the_title(); ?>
                        </h2>
                    <div class="Blog__Text">
                        <?php 
                            
                            $text = get_the_content();
                            echo wp_trim_words($text, 15);
                            
                            ?>
                    </div>
                </article>
            </main>
        </div>
        <?php
        }
    }
    ?>

<?php get_footer(); ?>