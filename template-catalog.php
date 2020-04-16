<?php
/*
 * Template Name: Katalog
 */?>

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

    <div class="catalog-link-to-site">
        <a target="_blank" href="<?php echo get_site_url(); ?>">
            <?php echo __('Nasza strona'); ?>
        </a>
    </div>


    <section class="container mb-5 mt-5 pb-5 pt-5">
        <?php if (have_posts()): ?>
        <div class="row catalog-content">
            <?php while (have_posts()): the_post(); ?>
            <div class="col-12">
                <a class="navbar-brand" href="<?php echo get_site_url(); ?>"><?php logo(); ?></a>
                <h2 class="mb-5">
                    <?php echo __('Oferta firmy'); ?>
                </h2>
                <div class="text">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </section>

    <section class="container">
        <?php $args = array('post_type' => 'our_productions', 'posts_per_page' => -1);
            $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()): ?>

        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

        <article class="row catalog-offer">
            <span class="catalog-our">
                <p><?php echo __('Nasza produkcja'); ?></p>
            </span>
            <span class="col-12 col-md-4">
                <img src="<?php the_post_thumbnail_url('cover'); ?>" class="img-fluid"
                    alt="Oferta: <?php the_title(); ?>">
            </span>
            <span class="col-12 col-md-8">
                <h1 class="catalog-subheader"><?php the_title(); ?></h1>
                <?php the_excerpt(); ?>
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-secondary btn-block" href="<?php the_permalink(); ?>" rel="bookmark">
                            <?php echo __('Więcej informacji'); ?>
                        </a>
                    </div>
                </div>
            </span>
        </article>

        <?php wp_reset_postdata(); ?>
        <hr class="m-5">
        <?php endwhile; ?>

        <?php endif; ?>
    </section>

    <section class="container">
        <?php $args = array('post_type' => 'offer', 'posts_per_page' => -1);
            $the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()): ?>
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

        <article class="row catalog-offer">
            <span class="col-12 col-md-4">
                <img src="<?php the_post_thumbnail_url('cover'); ?>" class="img-fluid"
                    alt="Oferta: <?php the_title(); ?>">
            </span>
            <span class="col-12 col-md-8">
                <h1 class="catalog-subheader"><?php the_title(); ?></h1>
                <?php the_excerpt(); ?>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#modalSlowDate"> <i class="fas fa-comment-dots mr-2"></i>
                            <?php echo __('Wolne terminy'); ?>
                        </button>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="button" class="btn btn-secondary btn-block" data-toggle="modal"
                            data-target="#modalContact"> <i class="fas fa-comment-dots mr-2"></i>
                            <?php echo __('Prośba o kontakt'); ?>
                        </button>
                    </div>
                    <div class="col-12 col-md-4">
                        <a class="btn btn-secondary btn-block" href="<?php the_permalink(); ?>" rel="bookmark">
                            <?php echo __('Więcej informacji'); ?>
                        </a>
                    </div>
                </div>
            </span>
        </article>
        <?php wp_reset_postdata(); ?>
        <hr class="m-5">
        <?php endwhile; ?>
        <?php endif; ?>
    </section>


    <div class="modal fade" id="modalSlowDate" tabindex="-1" role="dialog" aria-labelledby="modalSlowDateTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSlowDateTitle">
                        <?php echo __('Zapytaj o wolny termin'); ?><br><em><?php the_title(); ?> </em></h5>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-offer-2" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>"
                        method="POST">
                        <input id="artist" name="artist" type="hidden" value="<?php the_title(); ?>">
                        <input id="name" name="name" placeholder="Imię i nazwisko" type="text" class="form-control">
                        <input id="phone" name="phone" placeholder="Telefon" type="phone" class="form-control">
                        <input id="mail" name="email" placeholder="E-mail" type="mail" class="form-control">
                        <span class="form-m">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="input-check2" value="1">
                            <label class="form-info" for="input-check2">
                                <?php echo __(get_field('zgoda_na_przedstawienie_oferty', 'option')); ?>
                            </label>
                        </span>
                        <p class="form-info form-info__p">
                            <?php echo __(get_field('klauzula_informacyjna', 'option')); ?>
                        </p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                    class="fas fa-paper-plane mr-2"></i><?php echo __('Zapytaj'); ?></button>
                            <input type="hidden" name="action" value="date_artist">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContactTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalContactTitle">
                        <?php echo __('Kontakt w sprawie artysty'); ?> <br><em><?php the_title(); ?> </em></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-offer-3" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>"
                        method="POST">
                        <input id="artist" name="artist" type="hidden" value="<?php the_title(); ?>">
                        <input id="name" name="name" placeholder="Imię i nazwisko" type="text" class="form-control">
                        <input id="phone" name="phone" placeholder="Telefon" type="phone" class="form-control">
                        <input id="mail" name="email" placeholder="E-mail" type="mail" class="form-control">
                        <span class="form-m">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="input-check3" value="1">
                            <label class="form-info" for="input-check3">
                                <?php echo __(get_field('zgoda_na_przedstawienie_oferty', 'option')); ?>
                            </label>
                        </span>
                        <p class="form-info form-info__p">
                            <?php echo __(get_field('klauzula_informacyjna', 'option')); ?>
                        </p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                    class="fas fa-paper-plane mr-2"></i><?php echo __('Wyślij'); ?></button>
                            <input type="hidden" name="action" value="contact_artist">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <ul class="box-social">
        <?php myacf::social_media(); ?>
    </ul>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p>Copyright © 1995 - <?php echo data_now(); ?> Wszelkie prawa zastrzeżone AGENCJA BRUSSA | Realizacja:
                    <a href="https:iseeyou-studio.pl" target="_blank">iseeyou. studio</a></p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>

</body>

</html>