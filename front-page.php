<?php wpFn::get_template_parts(array('header')); ?>
<?php if (have_rows('bilder')): ?>
<?php while (have_rows('bilder')): the_row(); ?>
<?php if (get_row_layout() == 'karuzela'): ?>
<?php if (have_rows('slajdy')): ?>


<section class="carousel">
    <div class="carousel-big">
        <?php while (have_rows('slajdy')): the_row(); ?>
        <?php if (get_row_layout() == 'pusty_slajd'): ?>
        <?php the_sub_field('tytul_slajdu'); ?>
        <?php $link_do_strony = get_sub_field('link_do_strony'); ?>
        <?php if ($link_do_strony): ?>
        <a href="<?php echo $link_do_strony['url']; ?>"
            target="<?php echo $link_do_strony['target']; ?>"><?php echo $link_do_strony['title']; ?></a>
        < <?php endif; ?> <?php $grafika = get_sub_field('grafika'); ?> <?php if ($grafika): ?> <img
            src="<?php echo $grafika['url']; ?>" alt="<?php echo $grafika['alt']; ?>" />
        <?php endif; ?>
        <?php the_sub_field('tekst_wprowadzajacy'); ?>
        <?php elseif (get_row_layout() == 'slajd_oferty'): ?>
        <?php $post_object = get_sub_field('oferta'); ?>
        <?php if ($post_object): ?>
        <?php $post = $post_object; ?>
        <?php setup_postdata($post); ?>
        <div class="row">
            <img class="img-blur" src="<?php echo the_post_thumbnail_url('carousel'); ?>" alt="<?php the_title(); ?>">
            <img class="img-fluid" src="<?php echo the_post_thumbnail_url('carousel'); ?>" alt="<?php the_title(); ?>">

            <article>
                <h1><?php the_title(); ?></h1>
                <?php echo wpFn::content(33); ?>
                <a class="" href="<?php the_permalink(); ?>" title="Dowiedz się więcej <?php the_title(); ?>"><i
                        class="fas fa-angle-double-right"></i><?php echo __('Więcej'); ?></a>
            </article>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php endif; ?>
        <?php endwhile; ?>
    </div>
    <div class="carousel-center-slide">
        <?php while (have_rows('slajdy')): the_row(); ?>
        <?php if (get_row_layout() == 'pusty_slajd'): ?>
        <?php the_sub_field('tytul_slajdu'); ?>
        <?php $link_do_strony = get_sub_field('link_do_strony'); ?>
        <?php if ($link_do_strony) { ?>
        <a href="<?php echo $link_do_strony['url']; ?>"
            target="<?php echo $link_do_strony['target']; ?>"><?php echo $link_do_strony['title']; ?></a>
        <?php } ?>
        <?php $grafika = get_sub_field('grafika'); ?>
        <?php if ($grafika) { ?>
        <img src="<?php echo $grafika['url']; ?>" alt="<?php echo $grafika['alt']; ?>" />
        <?php } ?>
        <?php the_sub_field('tekst_wprowadzajacy'); ?>
        <?php elseif (get_row_layout() == 'slajd_oferty'): ?>
        <?php $post_object = get_sub_field('oferta'); ?>
        <?php if ($post_object): ?>
        <?php $post = $post_object; ?>
        <?php setup_postdata($post); ?>
        <h2><?php the_title(); ?></h2>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php endif; ?>
        <?php endwhile; ?>
    </div>
</section>


<?php endif; ?>
<?php elseif (get_row_layout() == 'Kategorie'): ?>
<section class="container home-category">
    <div class="row">

        <div class="col-12">
            <h2 class="home_header">
                <?php echo __('Oferta'); ?>
            </h2>
        </div>
        <div class="col-12">
            <?php $taxonomy = 'offer-category'; ?>
            <?php $terms = get_terms($taxonomy); ?>
            <?php if ($terms): ?>
            <div class="carousel-category">
                <?php foreach ($terms as $term): ?>
                <?php $taxonomy_prefix = $term->taxonomy; ?>
                <?php $term_id = $term->term_id; ?>
                <?php $term_id_prefixed = $taxonomy_prefix . '_' . $term_id; ?>
                <?php $obraz = get_field('obraz', $term_id_prefixed); ?>
                <?php if ($obraz): ?>
                <div>
                    <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><img class="img-fluid"
                            src="<?php echo $obraz['sizes']['cover']; ?>" alt="<?php echo $obraz['alt']; ?>" />
                        <span>
                            <?php echo $term->name;
echo $term->id; ?>
                        </span>
                    </a>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php elseif (get_row_layout() == 'oferta_ogolna'): ?>
<?php $post_object = get_sub_field('wybierz_oferte'); ?>
<?php if ($post_object): ?>
<?php $post = $post_object; ?>
<?php setup_postdata($post); ?>
<?php $obraz = get_field('galeria'); ?>
<?php $thumbnail = get_the_post_thumbnail_url(); ?>
<?php if (!empty($thumbnail)): ?>
<section class="home-offer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <img src="<?php echo get_template_directory_uri(); ?>/images/bg-square.jpg"
                    data-src="<?php echo the_post_thumbnail_url('thumbnail-large'); ?>"
                    alt="agencja brussa - <?php the_title(); ?>">
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="row">
                    <article class="col-12">
                        <h1><?php the_title(); ?></h1>
                        <p><?php echo wp_trim_words(get_the_content(), 80, '...'); ?></p>
                    </article>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/bg-square.jpg"
                            data-src="<?php echo $obraz[0]['sizes']['thumbnail']; ?>"
                            alt="agencja brussa - <?php the_title(); ?>">
                    </div>
                    <div class="col-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/bg-square.jpg"
                            data-src="<?php echo $obraz[1]['sizes']['thumbnail']; ?>"
                            alt="agencja brussa - <?php the_title(); ?>">
                    </div>
                    <div class="col-4"><a class="btn-more" href="<?php the_permalink(); ?>"
                            title="Więcej o <?php the_title(); ?>"><?php echo __('więcej'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php elseif (get_row_layout() == 'nasze_produkcje'): ?>
<?php $post_object = get_sub_field('wybierz_produkcje'); ?>
<?php if ($post_object): ?>
<?php $post = $post_object; ?>
<?php setup_postdata($post); ?>
<section class="container-fluid home-our">
    <div class="row">
        <div class="col-12">
            <div class="home-our-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                    data-src="<?php echo the_post_thumbnail_url('large'); ?>" class="card-img"
                    alt="agencja brussa, <?php the_title(); ?>, produkcja">
                <div class="home-our-content">
                    <h1><?php the_title(); ?></h1>
                    <div class="content">
                        <?php echo wpFn::content(45); ?>
                    </div>
                    <a class="btn-more" href="<?php the_permalink(); ?>"
                        title="Więcej o <?php the_title(); ?>"><?php echo __('więcej'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php elseif (get_row_layout() == 'polecamy'): ?>
<?php $zdjecie_glowne = get_sub_field('zdjecie_glowne'); ?>
<?php if ($zdjecie_glowne) { ?>
<?php $zdjecie_dodatkowe_1 = get_sub_field('zdjecie_dodatkowe_1'); ?>
<?php $zdjecie_dodatkowe_2 = get_sub_field('zdjecie_dodatkowe_2'); ?>
<section class="container home-offer">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-4">
            <img src="<?php echo get_template_directory_uri(); ?>/images/bg-square"
                data-src="<?php echo $zdjecie_glowne['sizes']['thumbnail-large']; ?>"
                alt="agencja brussa - <?php the_sub_field('tytul'); ?>">
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <article class="p-4">
                <h1><?php the_sub_field('tytul'); ?></h1>
                <?php the_sub_field('tresc'); ?>
            </article>
        </div>
        <div class="col-12 col-md-3 col-lg-4">
            <div class="row">
                <div class="col-6">lorem ipsum</div>
                <div class="col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/bg-square"
                        data-src="<?php echo $zdjecie_dodatkowe_1['sizes']['thumbnail']; ?>"
                        alt="agencja brussa - <?php the_sub_field('tytul'); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/bg-square"
                        data-src="<?php echo $zdjecie_dodatkowe_2['sizes']['thumbnail']; ?>"
                        alt="agencja brussa - <?php the_sub_field('tytul'); ?>">
                </div>
                <?php $link_do_strony = get_sub_field('link_do_strony'); ?>
                <?php if ($link_do_strony) { ?>
                <div class="col-6">
                    <a class="btn-more" title="Więcej o <?php the_sub_field('tytul'); ?>"
                        href="<?php echo $link_do_strony['url']; ?>"
                        target="<?php echo $link_do_strony['target']; ?>"><?php echo __('więcej'); ?></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<?php elseif (get_row_layout() == 'wydarzenia'): ?>
<section class="home-calendary">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="carousel-center-events">
                        <?php $data = new WP_Query(wpFn::getPostEvent()); ?>
                        <?php while ($data->have_posts()): $data->the_post(); ?>

                        <?php if (have_rows('kiedy')): ?>
                        <?php while (have_rows('kiedy')): the_row(); ?>
                        <?php $start = get_sub_field('data'); ?>
                        <?php if (strtotime($start) > strtotime(date('d-m-Y'))): ?>
                        <span>
                            <h1><?php the_display_only_day($start); ?></h1>
                            <h6><?php the_convert_month($start); ?></h6>
                            <h6><?php the_display_only_year($start); ?></h6>
                        </span>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="carousel-event">


            <?php $event = new WP_Query(wpFn::getPostEvent()); ?>

            <?php while ($event->have_posts()): $event->the_post(); ?>

            <?php if (have_rows('kiedy')): ?>
            <?php while (have_rows('kiedy')): the_row(); ?>
            <?php $start = get_sub_field('data'); ?>
            <?php endwhile; ?>
            <?php endif; ?>



            <?php if (strtotime($start) > strtotime(date('d-m-Y'))): ?>
            <div class="row">
                <div class="col-12 col-md-4">
                    <?php $plakat = get_field('plakat'); ?>
                    <?php if ($plakat): ?>
                    <a href="<?php the_permalink(); ?>" title="Plakat wydarzenia: <?php the_title(); ?>">
                        <span class="event-date event-date__ab">
                            <span><?php the_convert_month($start); ?></span>
                            <span><?php the_display_only_day($start); ?></span>
                            <span><?php the_display_only_year($start); ?></span>
                        </span>
                        <span class="event-place">
                            <?php if (have_rows('gdzie')): ?>
                            <?php while (have_rows('gdzie')): the_row(); ?>
                            <?php the_sub_field('miasto'); ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </span>
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/bg-poster"
                            data-src="<?php echo $plakat['url']; ?>" alt="<?php echo $plakat['alt']; ?>" />
                    </a>
                    <?php endif; ?>

                    <a class="btn btn-primary btn-block" href="<?php the_permalink(); ?>"
                        title="Więcej o wydarzeniu <?php the_title(); ?>">
                        <?php echo __('Więcej o wydarzeniu'); ?>
                    </a>
                </div>
                <article class="col-12 col-md-8">
                    <a href="<?php the_permalink(); ?>" title="Informacje o wydarzeniu <?php the_title(); ?>">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    </a>
                    <?php the_excerpt(); ?>
                </article>
            </div>
            <?php endif; ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="d-flex justify-content-center">
            <a href="<?php the_sub_field('link_do_listy_wydarzen'); ?>" class="btn btn-primary btn-lg"
                title="Wszystkie nasze wydarzenia"><?php echo __('Zobacz więcej wydarzeń'); ?></a>
        </div>
    </div>
</section>

<?php elseif (get_row_layout() == 'fotoblog'): ?>
<section class="container-fluid home-photo">
    <div class="row">
        <div class="col-12 col-lg-6">
            <?php $args = array('post_type' => 'photogallery', 'posts_per_page' => 1);
$the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()): $the_query->the_post();
    $do_not_duplicate = $post->ID; ?>
            <a href="<?php the_permalink(); ?>">
                <span class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                        data-src="<?php echo the_post_thumbnail_url('cover'); ?>" class="card-img" alt="...">
                    <span class="card-img-overlay">
                        <h4><?php echo __('Najnowsze'); ?> </h4>
                        <h1><?php the_title(); ?></h1>
                        <span><?php the_date(); ?></span>
                    </span>
                </span>
            </a>
            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                <?php $args = array('post_type' => 'photogallery', 'orderby' => 'rand', 'posts_per_page' => 5);
$the_query = new WP_Query($args); ?>
                <?php if ($the_query->have_posts()): ?>
                <?php $i = 0; ?>
                <?php while ($the_query->have_posts()): $the_query->the_post();if ($post->ID != $do_not_duplicate): ?>
                <?php if ($i <= 3): ?>
                <div class="col-12 col-sm-6">
                    <a href="<?php the_permalink(); ?>">
                        <span class="card bg-dark">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                                data-src="<?php echo the_post_thumbnail_url('cover'); ?>" class="card-img" alt="...">
                            <span class="card-img-overlay">
                                <h3><?php the_title(); ?></h3>
                                <span><?php the_date(); ?></span>
                            </span>
                        </span>
                    </a>
                </div>
                <?php endif; ?>
                <?php $i++; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php $link_do_galerii = get_sub_field('link_do_galerii'); ?>
    <?php if ($link_do_galerii) { ?>
    <div class="row">
        <div class="col-12 col-lg-7">
            <a href="<?php echo $link_do_galerii; ?>"><?php echo __('Zobacz
                całą galerię'); ?></a>
        </div>
    </div>
    <?php } ?>
</section>
<?php elseif (get_row_layout() == 'newsletter'): ?>
<section class="container-fluid home-newsletter">
    <div class="row">
        <div class="col-12">
            <h2 class="home_header">
                <?php echo __('Nie przegap żadnego wydarzenia!'); ?>
            </h2>
        </div>
        <div class="col-12">
            <?php the_newsletter(); ?>
        </div>
    </div>
</section>
<?php elseif (get_row_layout() == 'naglowek'): ?>
<section class="container">
    <div class="row">
        <h2 class="home_header">
            <?php the_sub_field('naglowek'); ?>
        </h2>
    </div>
</section>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<?php wpFn::get_template_parts(array('footer')); ?>