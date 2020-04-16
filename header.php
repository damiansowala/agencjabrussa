<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if (get_field('komunikaty', 'option')): ?>
    <span class="global-alert">
        <p><?php the_field('komunikaty', 'option'); ?></p>
    </span>
    <?php endif; ?>

    <div class="nav-top">
        <a class="nav-brand" href="<?php echo get_site_url(); ?>"><?php logo(); ?></a>

        <ul class="nav-social">
            <?php myacf::social_media(); ?>
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSearch">
                    <i class="fas fa-search"></i>
                </button>
            </li>
        </ul>

        <button class="nav-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="nav">

        <div class="nav-menu">

            <button class="btn nav-menu-close">
                <i class="fas fa-times"></i>
            </button>

            <div id="primaryMenu">
                <?php wp_nav_menu(array(
    'menu' => 'top_menu',
    'theme_location' => 'top_menu',
    'depth' => 2,
    'container' => false,
    'menu_class' => 'nav-menu-top',
    'fallback_cb' => 'bs4navwalker::fallback',
    'walker' => new navwalker()));
?>
            </div>
        </div>

    </div>