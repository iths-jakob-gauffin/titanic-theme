<?php get_header(); ?>
    <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo get_template_directory_uri() . '/dist/image/search.jpg'; ?>')">
            <div class="Search__TitleWrapper">
                <h1 class="Search__Title">
                <?php echo "Våra hamnar"; ?>
                </h1>
            </div>
        </div>  
    </div>  
    <div class="container">
        <main class="ArchiveHarbor">
        <?php 
            while(have_posts()){
                the_post();

                $cats = wp_get_post_categories(get_the_ID());
                foreach($cats as $cat){
                    $name = get_cat_name( $cat );                       
                }

                $icons = array('butik' => "fas fa-store-alt",
                            'restaurang' => "fas fa-utensils",
                            'toalett' => "fas fa-restroom",
                            'kreditkort' => "far fa-credit-card",
                            'wifi' => "fas fa-wifi",
                            'handikappsanpassat' => "fab fa-accessible-icon",
                            'övernattning' => "fas fa-bed",
                            'bensinstation' => "fas fa-gas-pump",
                            'laddstation' => "fas fa-charging-station",
                            'dusch' => "fas fa-shower",
                            'motionsspår' => "fas fa-running",
                            'rastplats' => 'fas fa-paw',
                            'matsal' => 'fas fa-apple-alt',
                            'dusch' => "fas fa-shower",
                            'handikappsanpassat' => 'fas fa-wheelchair',
                            'tennis' => 'fas fa-baseball-ball',
                        );
            ?> 
            <div class="ArchiveHarbor__HarborCard ArchiveHarbor__HarborCard--Drop">
                <div class="ArchiveHarbor__HarborCardImage" style="background: url('<?php the_post_thumbnail_url(); ?>')">
                </div>
                <a class="ArchiveHarbor__HarborLink" href="<?php the_permalink(); ?>"></a>
                <div class="ArchiveHarbor__PriceWrapper">
                    <p class="ArchiveHarbor__Price"><?php echo get_field("price"); ?><span class="ArchiveHarbor__Price ArchiveHarbor__Price--Per"> kr</span></p>
                    <p class="ArchiveHarbor__Price ArchiveHarbor__Price--Per">per natt</p>
                </div>
                <div class="ArchiveHarbor__ContentWrapper">
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="ArchiveHarbor__Title"><?php the_title(); ?>s gästhamn</h2>
                    </a>
                    <div class="ArchiveHarbor__AmenitieTitleAndAmenitieListWrapper">
                        <h5 class="ArchiveHarbor__AmenitieTitle">Bekvämligheter</h5>
                        <ul class="ArchiveHarbor__AmenitieList"> 
                        <?php                        
                        foreach($cats as $cat){
                                $name = get_cat_name( $cat ); 
                                ?> 
                                <li class="ArchiveHarbor__AmenitieListItem">
                                <i class="<?php echo $icons[mb_strtolower($name)]; ?>" aria-hidden=true></i>
                                <?php echo $name; ?>
                                </li>
                            <?php
                            }
                        ?>
                        </ul>
                    </div>
                    <div class="ArchiveHarbor__BookButtonWrapper">
                        <a href="<?php echo site_url("accommodation/" . strtolower(get_the_title())); ?>" class="ArchiveHarbor__BookButton">Boka</a>
                    </div>
                        
                </div>

            </div>
            <?php
            }
        ?>
        </main>
    </div>



<?php get_footer(); ?>






