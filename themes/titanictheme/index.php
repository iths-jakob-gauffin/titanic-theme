<?php get_header(); ?>
    <h1>Det här är Index.php</h1>

    <?php

    while(have_posts()){
        the_post();
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
    ?>

<?php get_footer(); ?>