<?php get_header(); 
    

    global $query_string;
    // echo var_dump($query_string);
    
    $test = wp_parse_str( $query_string, $search_query );
    echo var_dump($search_query);
    $search = new WP_Query( $search_query );
    // echo var_dump($search);
    
?>
    <h1>Det här är Index.php</h1>

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
                        <h2 class="Blog__PostTitle">
                            <?php the_title(); ?>
                        </h2>
                    <div class="Blog__Text">
                        <?php 
                            
                            $text = get_the_content();
                            echo wp_trim_words($text, 5);
                            
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