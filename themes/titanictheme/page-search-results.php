<?php get_header(); ?>
    <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo get_template_directory_uri() . '/dist/image/search.jpg'; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                Tillgängliga hamnplatser <?php 
                $dateCheckIn = new DateTime($_REQUEST['mphb_check_in_date']);
        
                $checkInDate = $dateCheckIn->format('d M');
                $dateCheckOut = new DateTime($_REQUEST['mphb_check_out_date']);
                $checkOutDate = $dateCheckOut->format('d M, Y');
                echo $checkInDate; ?> - <?php echo $checkOutDate; ?>
                </h1>
            </div>
        </div>  
    </div>
    <div class="container">
        <main class="SearchResults">
            <h2 class="SearchResults__QueryTitle">Det går att boka plats på 3 hamnar mellan dina valda datum.</h2>
            <?php
            $currentUrl = home_url( add_query_arg( null, null ));
    
            while(have_posts()){
                the_post(); 
            ?>

            <div class="SearchResults__FormWrapper"><?php the_content(); ?></div>

        <?php
    }


    ?>
        </main>
    </div>



<?php get_footer(); ?>