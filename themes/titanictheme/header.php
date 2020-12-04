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
        <div class="Header__Logo">
            <a href="<?php echo esc_url(site_url('/'));?>" class="Header__LogoLink">
            Logotyp
            </a>
        
        </div>
        <nav class="Header__Nav">
            <ul class="Header__NavList">
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('events')); ?>" class="Header__Link">
                        Events
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('butiken')); ?>" class="Header__Link">
                        Butiken
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('boka')); ?>" class="Header__Link">
                        Boka
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('hamnar')); ?>" class="Header__Link">
                        Hamnar
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('service')); ?>" class="Header__Link">
                        Service
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('blog')); ?>" class="Header__Link">
                        Blogg
                    </a>
                </li>
                <li class="Header__ListItem">
                    <a href="<?php echo esc_url(site_url('persongalleri')); ?>" class="Header__Link">
                        Persongalleri
                    </a>
                </li>
            </ul>
        </nav>
    </header>
</div>

