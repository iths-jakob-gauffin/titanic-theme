<?php get_header(); 
    

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
    echo var_dump("terms är: ", $terms);
    // $args = array(
    //     'posts_per_page'   => -1,
    //     'category'         => $terms[0]->term_id,
    //     'orderby'          => 'name',
    //     'order'            => 'ASC',
    //     'post_type'        => 'harbor'
    // );
    
    // $catPosts = get_posts($args);
    // echo var_dump("kategorisvaret är: ", $catPosts);
    // var_dump("termen är: ", $posts[0]->post_title);

    // if ( count($terms) > 0 ){
    //     echo '<ul>';
    //     foreach ( $terms as $term ) {
    //         echo '<li><a href="'.esc_url( get_term_link( $term ) ).'" title="'.esc_attr( $term->name ).'">' . esc_html( $term->name ) . '</a></li>';
    //     }
    //     echo '</ul>';
    // }
    
    global $wp_query;
    $total_results = $wp_query->posts;
    // echo var_dump("querryn ger: ",  $wp_query);
?>

<?php
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
$stuff = new WP_Query( $args ); 
echo var_dump("STUFFEN ÄR SÅHÄR: ", $stuff->posts);
?>

    <h1>search.php</h1>
    <h3>Sökresultat för "<?php 
    echo $wp_query->query['s'];
    ?>"</h3>

    <?php 
        foreach ($wp_query->posts as $value) {
            ?>
                <a href="<?php the_permalink($value); ?>">
                    <h4><?php echo $value->post_title; ?></h4>
                </a>        
                <h4><?php echo $value->post_type; ?></h4>        
            <?php
        }
        ?>
        <p><?php echo var_dump($terms); ?></p>
        <?php 
        
        
        if($terms){
            ?>
            Hamnar som erbjuder <?php 
                foreach ($terms as $term) {
                    echo "jo den körs";
                    echo $term->name;
                }
            wp_reset_postdata();
        } ?>
        
    ?>
    

<?php get_footer(); ?>