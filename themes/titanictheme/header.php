<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >


    <header class="Header">
        
        <?php 

        
        function checkIfUrlContainsString($url, $string){
            if (strpos($url, $string) !== false) {
                return true;
            } else {
                return false;
            };
        }
        
        $hamn = get_field("hamn");
        $currentUrl = home_url( add_query_arg( null, null ));

        if(is_front_page() || is_search() || is_post_type_archive('harbor') || is_page("search-results")){

            $_SESSION['hamn'] = "NOLLSTÄLLD";

        } 
        elseif (is_page("booking-confirmation") && !checkIfUrlContainsString($currentUrl, "?step=booking")){
            $keys = array_keys($_REQUEST['mphb_rooms_details']);
            $rooms = new WP_Query(array(
                'post_type' => 'mphb_room_type',
            ));
            foreach ($rooms->posts as $room) {
                if($room->ID === $keys[0]){
                    $_SESSION['hamn'] = strtolower($room->post_title);
                }
            }
        }
        elseif ($hamn && !is_search()){
            $_SESSION['hamn'] = $hamn[0]->post_name;
        }
        else {

            $harbors = get_posts( array(
                'post_type' => 'harbor'
            ));

            foreach($harbors as $post){
                if(checkIfUrlContainsString($currentUrl, strtolower($post->post_title))){
                    $_SESSION['hamn'] = strtolower($post->post_title);
                };
            };
            
        }
            

        ?>
        <div class="Header__Logo">
            <a href="<?php echo esc_url(site_url('/'));?>" class="Header__LogoLink">
                <img src="<?php echo get_template_directory_uri() . '/dist/icons/Ankra_Logo2.svg'; ?>" alt="">
            </a>
        
        </div>
        <?php 
            navList($_SESSION['hamn']);
            echo "<div class='Header__SearchWrapper'>";
            echo get_search_form();
            echo "</div>";
            
        ?>
    </header>

