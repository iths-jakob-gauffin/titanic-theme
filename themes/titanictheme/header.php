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

<div class="container">
    <header class="Header">
        <?php 

        if(is_front_page()){

            $_SESSION['hamn'] = "NOLLSTÄLLD";

        } else {
    
            function checkIfUrlContainsString($url, $string){
                if (strpos($url, $string) !== false) {
                    return true;
                } else {
                    return false;
                };
            }
    
            $currentUrl = home_url( add_query_arg( null, null ));

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
            Logotyp - <?php echo $_SESSION['hamn']; ?>
            </a>
        
        </div>
        <?php 
            headerPizza($_SESSION['hamn']);
        ?>
    </header>
</div>

