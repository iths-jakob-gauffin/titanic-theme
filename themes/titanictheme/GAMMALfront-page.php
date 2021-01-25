<?php get_header(); 

    while(have_posts()){
        the_post();
        ?>
        <div class="BackgroundImageWrapper">
            <div class="Search__BackgroundImage Search__BackgroundImage--FrontPage" style="background: url('<?php echo get_template_directory_uri() . '/dist/image/search.jpg'; ?>')">
                <div class="Search__TitleWrapper">
                    <p style="font-size: 3rem; color: white;">front-page.php</p>
                </div>
                <h1 class="FrontPage__WelcomeText">
                    Varmt välkommen!
                </h1>
            </div>  
        </div>  
        <div class="container">
            <div class="FrontPage">       
                <h2 class="FrontPage__Title">Fyll in- & utcheckningsdatum för att se tillgängliga hamnar</h2>         
                <?php echo do_shortcode('[mphb_availability_search class="is-style-horizontal-form"]'); ?>
                <hr class="FrontPage__Hr">
                <h2 class="FrontPage__Title">Eller välj särskild hamn för att se tillgänglighet</h2>
                <?php echo do_shortcode('[mphb_rooms gallery="false" excerpt="false" details="false" price="false" view_button="false" class="FrontPage__FlexWrapper"]'); ?>
                <hr class="FrontPage__Hr">
                <h2 class="FrontPage__Title">Skriv in vart du är och se avståndet till våra hamnar</h2>
                <div class="map">
                    <?php echo do_shortcode('[wpgmza id="1"]'); ?>
                </div>    
            </div>
        </div>
    <?php
    }
    ?>

<?php get_footer(); ?>