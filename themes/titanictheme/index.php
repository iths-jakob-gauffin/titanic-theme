<?php get_header(); ?>
    <h1>Det här är Index.php</h1>
    <div class="container">
        <main class="Blog">
        <?php

        while(have_posts()){
            the_post();

            $_SESSION['hamn'];

            $harborField = get_field('hamn')[0];

            echo var_dump('Harborfield är: ' . strtolower($harborField->post_title));
            
            echo var_dump('Sessionsvariabeln är: ' . strtolower($_SESSION['hamn']));

            if(strtolower($harborField->post_title) === strtolower($_SESSION['hamn'])){
                echo 'den körs iaf';
                ?>
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
                <?php
            }

            ?>
            
                    
             
        <?php
        }
        ?>
       </main>
    </div>

<?php get_footer(); ?>