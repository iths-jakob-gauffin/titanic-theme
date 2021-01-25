<?php get_header(); ?>
    <h1>search.php</h1>
    <div class="BackgroundImageWrapper">
        <div class="Search__BackgroundImage" style="background: url('<?php echo get_template_directory_uri() . '/dist/image/search.jpg'; ?>')">
        ¨<div class="Search__TitleWrapper">
            <h1 class="Search__Title">
            Sökresultat för "<?php 
            echo $wp_query->query['s'];
            ?>"
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="Search">
            <?php
            // Visa resultat för olika post_types 
            global $wp_query;

            $eventResults = $postResults = $harborResults = [];

            foreach ($wp_query->posts as $value) {
                
                if($value->post_type === "event"){
                    
                    array_push($eventResults, $value); 

                }elseif($value->post_type === "post"){

                    array_push($postResults, $value);

                }elseif($value->post_type === "harbor"){
                    
                    array_push($harborResults, $value);
                }
            }
            ?>
            <div class="Search__ResultCardsWrapper">
            
            <?php
            if($harborResults){?>
            <section class="Search__ResultCard">
                <?php
                    echo '<h2 class="Search__ResultTitle">Hamnar :</h2>';
                    foreach($harborResults as $harbor){
                        searchResult($harbor);
                    }
                ?>
            </section>
            <?php
            }
            if($eventResults){?>
            <section class="Search__ResultCard">
            <?php
                echo '<h2 
                class="Search__ResultTitle">Events :</h2>';
                foreach($eventResults as $event){
                    searchResult($event, $withHarbor = true);
                }
                ?>
            </section>
            <?php
            }
            if($postResults){?>
            <section class="Search__ResultCard">
                <?php
                echo '<h2 class="Search__ResultTitle">Blogginlägg :</h2>';
                foreach($postResults as $post){
                    searchResult($post, $withHarbor = true);
                }
                ?>
            </section>
            </div>
            <?php
            }
            ?>  
            <?php
            wp_reset_postdata();
            // Visa resultat för hamnar som har den taxonomyn                
            $search_term = explode( ' ', get_search_query( false ) );   
            global $wpdb;
            $select = "
            SELECT DISTINCT t.*, tt.* 
            FROM wp_terms AS t 
            INNER JOIN wp_term_taxonomy AS tt 
            ON t.term_id = tt.term_id 
            WHERE tt.taxonomy IN ('category')";      
            $first = true;
            foreach ( $search_term as $s ){
                if ( $first ){
                    $select .= " AND (t.name LIKE '%s')";
                    $string_replace[] = '%'.$wpdb->esc_like( $s ).'%';
                    $first = false;
                }else{
                    $select .= " OR (t.name LIKE '%s')";
                    $string_replace[] = '%'. $wpdb->esc_like( $s ).'%';
                }
            }
            $select .= " ORDER BY t.name ASC";
            $terms = $wpdb->get_results( $wpdb->prepare( $select, $string_replace ) );

            $args = array(
                'post_type' => 'harbor',
                'tax_query' => array(
                    array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $terms[0]->term_taxonomy_id
                    )
                )
                );
                $harborsWithCategory = new WP_Query( $args ); 
            
            if($terms){
                ?>
                <aside class="Search__Amenities">
                <h2 class="Search__AmenitieTitle">
                Hamnar som erbjuder <?php 
                    foreach ($terms as $term) {
                        echo '<span class="Search__Amenitie">' . $term->name . '</span>';
                    }
                wp_reset_postdata();
            ?> :</h2>
                <ul class="Search__SearchList">
                <?php foreach($harborsWithCategory->posts as $harbor){
                    ?>
                    <li class="Search__AmenitieList"><a class="Search__AmenitieLink" href="<?php the_permalink($harbor); ?>"><?php echo $harbor->post_title; ?></a></li>
                    <?php
                } 
            }?>
                </ul>
            </aside>
        </div>
    </div>

<?php get_footer(); ?>