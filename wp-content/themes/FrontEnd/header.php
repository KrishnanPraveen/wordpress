<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/fonts.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/root.css">
    <?php if(is_front_page()):?>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/frontpage.css">
    <?php endif; ?>
    <?php if(is_home()):?>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/blog.css">
    <?php endif; ?>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="logo"><?php the_custom_logo(); ?></div>
    <nav>
        <?php 
            wp_nav_menu( array(
                'menu'   => 'Top Menu',
                'menu_class' => 'nav-list',
                'container' => '',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            ));
        ?>
    </nav>
</header>