<?php
/* ========================================================================================================================
Custome Post Type
======================================================================================================================== */

function ctp()
{
    wpFn::cptCreate('offer', 'Oferta', 'oferta', 'dashicons-book-alt');
    wpFn::cptCreate('stage', 'Oferta techniki scenicznej', 'technika-sceniczna', 'dashicons-microphone');
    wpFn::cptCreate('photogallery', 'Fotogaleria', 'fotogaleria', 'dashicons-camera-alt');
    wpFn::cptCreate('events', 'Wydarzenia', 'wydarzenia', 'dashicons-calendar-alt');
    wpFn::cptCreate('our_productions', 'Nasze produkcje', 'nasze-produkcje', 'dashicons-star-filled');
    wpFn::cptCreate('work', 'Praca', 'praca', 'dashicons-megaphone');
    wpFn::cptCreate('albums', 'Płyty', 'plyty', 'dashicons-format-audio');
    wpFn::cptCreate('media', 'Media o nas', 'media-o-nas', 'dashicons-format-audio');
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_sub_page(array(
        'page_title' => 'Obsługiwane wydarzenia',
        'menu_title' => 'Obsługiwane wydarzenia',
        'parent_slug' => 'edit.php?post_type=stage',
    ));

}

function offer_category()
{
    register_taxonomy(
        'offer-category',
        'offer',
        array(
            'label' => __('Kategorie ofert'),
            'rewrite' => array('slug' => 'oferty'),
            'hierarchical' => true,
        )
    );
}

function photogallery_category()
{
    register_taxonomy(
        'photogallery-category',
        'photogallery',
        array(
            'label' => __('Kategorie galerii'),
            'rewrite' => array('slug' => 'fotogaleria-kategorie'),
            'hierarchical' => true,
        )
    );
}

function events_category()
{
    register_taxonomy(
        'events-category',
        'events',
        array(
            'label' => __('Kategorie wydarzeń'),
            'rewrite' => array('slug' => 'wydarzenia-kategorie'),
            'hierarchical' => true,
        )
    );
}

function enable_category($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_category()) {
            $query->set('post_type', array('post', 'photogallery'));
        }
    }
}

function enable_tags($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_tag()) {
            $query->set('post_type', array('post', 'photogallery'));
        }
    }
}

add_action('pre_get_posts', 'enable_category');
add_action('pre_get_posts', 'enable_tags');

add_action('init', 'ctp');
add_action('init', 'offer_category');
add_action('init', 'photogallery_category');
add_action('init', 'events_category');