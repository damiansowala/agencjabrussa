<?php wpFn::get_template_parts(array('header')); ?>

<div class="container event">
    <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
    <h2 class="home_header"><?php the_title(); ?></h2>

    <div class="row">
        <?php if (get_field('opcje') == 1): ?>
        <div class="col-12">
            <p class="event-alert event-alert__cancel">
                <?php echo __('Wydarzenie odwołane'); ?>
            </p>
        </div>
        <?php elseif (get_field('opcje') == 2): ?>
        <div class="col-12">
            <p class="event-alert event-alert__transfer">
                <?php echo __('Wydarzenie odbędzie się w nowym terminie'); ?> -
                <?php display_acf_see_more_link(get_field('link_do_nowego_wydarzenia')); ?>
            </p>
        </div>
        <?php endif; ?>
        <div class="col-12 col-md-5">
            <?php $plakat = get_field('plakat'); ?>
            <?php if ($plakat): ?>
            <div class="event-box">
                <img class="img-fluid" src="<?php echo $plakat['url']; ?>" alt="<?php echo $plakat['alt']; ?>" />
            </div>
            <?php endif; ?>

            <?php if (get_field('opcje') != 1 && get_field('opcje') != 2): ?>

            <?php if (have_rows('kiedy')): ?>
            <?php while (have_rows('kiedy')): the_row(); ?>
            <?php $start = get_sub_field('data'); ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php if (strtotime($start) > strtotime(date('d-m-Y'))): ?>
            <div class="event-box event-box__row event-box__bg">
                <?php if (have_rows('kiedy')): ?>
                <div class="event-col">
                    <?php while (have_rows('kiedy')): the_row(); ?>
                    <h5> <i class="fas fa-calendar"></i> <?php echo __('Kiedy'); ?></h5>
                    <?php if (get_sub_field('wydarzenie_kilkudniowe') == 'Tak'): ?>
                    <p><?php echo __('Od'); ?> <?php the_sub_field('data'); ?> <?php echo __('do'); ?>
                        <?php the_sub_field('data_zakonczenia'); ?></p>
                    <?php else: ?>
                    <?php the_convert_day(get_sub_field('data')); ?>
                    <p><?php the_sub_field('data'); ?></p>
                    <?php endif; ?>
                    <?php if (get_sub_field('wydarzenie_calodniowe') == 'Tak'): ?>
                    <p><small><?php echo __('Wydarzenie trwa cały dzień'); ?></small></p>
                    <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>


                <?php if (have_rows('czas')): ?>
                <div class="event-col">
                    <?php while (have_rows('czas')): the_row(); ?>
                    <h5> <i class="fas fa-clock"></i> <?php echo __('Czas'); ?></h5>

                    <?php if (get_sub_field('rozpoczecie')): ?>
                    <p><small><?php echo __('Rozpoczęcie'); ?> : </small> <?php the_sub_field('rozpoczecie'); ?></p>
                    <?php endif; ?>

                    <?php if (get_sub_field('zakonczenie')): ?>
                    <p><small><?php echo __('Zakończenie'); ?> : </small> <?php the_sub_field('zakonczenie'); ?></p>
                    <?php endif; ?>

                    <?php if (get_sub_field('liczba_przerw')): ?>
                    <p><small><?php echo __('Liczba przerw'); ?> : </small><?php the_sub_field('liczba_przerw'); ?></p>
                    <?php endif; ?>

                    <?php if (get_sub_field('czas_trwania_przerwy')): ?>
                    <p><small><?php echo __('Czas przerwy'); ?> :
                            <?php the_sub_field('czas_trwania_przerwy'); ?><?php echo __('min'); ?></small></p>
                    <?php endif; ?>

                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if (have_rows('gdzie')): ?>
            <div class="event-box event-box__bg">
                <?php while (have_rows('gdzie')): the_row(); ?>
                <h5><i class="fas fa-map-marked-alt"></i> <?php echo __('Gdzie'); ?></h5>
                <p><?php the_sub_field('obiekt'); ?></p>
                <p><em><?php the_sub_field('ulica'); ?>, <?php echo $city = get_sub_field('miasto'); ?></em></p>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php if (have_rows('bilety')): ?>
            <div class="event-box event-box__bg">
                <?php while (have_rows('bilety')): the_row(); ?>
                <h5> <i class="fas fa-ticket-alt"></i> <?php echo __('Bilety'); ?></h5>

                <?php if (get_sub_field('wydarzenie_otwarte') == 'Nie'): ?>
                <?php echo 'Wstęp wolny.'; ?>
                <?php else: ?>
                <?php if (get_sub_field('pule') == 'Jedna'): ?>
                <p><?php _e('Cena biletu ') + the_sub_field('stawka') + _e(': ') + the_sub_field('cena_biletu') + _e(' ') + _e('PLN'); ?>
                </p>
                <?php else: ?>
                <?php if (have_rows('ilosc_pul_biletowych')): ?>
                <?php while (have_rows('ilosc_pul_biletowych')): the_row(); ?>
                <p><?php _e('Pula ') + the_row_index() + _e(' - Start: ') + the_sub_field('start_puli'); ?> <br>
                    <?php _e('Cena biletu ') + the_sub_field('stawka_pula') + _e(': ') + the_sub_field('cena_biletu_pula') + _e(' ') + _e('PLN'); ?>
                </p>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php if (have_rows('kasy_stacjonarne')): ?>
            <div class="event-box event-box__bg">
                <?php while (have_rows('kasy_stacjonarne')): the_row(); ?>
                <h5> <i class="fas fa-store-alt"></i> <?php echo __('Kasy stacjonarne'); ?></h5>
                <?php if (have_rows('lista_miejsc')): ?>
                <?php while (have_rows('lista_miejsc')): the_row(); ?>
                <div class="row">
                    <div class="col-6">
                        <p><?php the_sub_field('miejsce'); ?></p>
                        <p><em><?php the_sub_field('adres'); ?></em></p>
                    </div>
                    <div class="col-6">
                        <?php if (get_sub_field('strona_www')): ?>
                        <p><a class="event-link" href="<?php the_sub_field('strona_www'); ?>" target="_blank"><i
                                    class="fas fa-globe-africa"></i><?php echo __('Strona WWW'); ?></a></p>
                        <?php endif; ?>
                        <?php if (get_sub_field('telefon')): ?>
                        <p><a class="event-link" href="tel:<?php the_sub_field('telefon'); ?>"><i
                                    class="fas fa-phone-alt"></i><?php the_sub_field('telefon'); ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php if (have_rows('bilety')): ?>
            <?php while (have_rows('bilety')): the_row(); ?>
            <?php if (have_rows('gdzie_kupic')): ?>
            <div class="event-box">
                <h5> <i class="fas fa-ticket-alt"></i> <?php echo __('E-kasy'); ?></h5>
                <div class="row">
                    <?php while (have_rows('gdzie_kupic')): the_row(); ?>
                    <div class="col-6">
                        <?php ticets::showLogoTicets(get_sub_field('nazwa_strony'), get_sub_field('link'), get_the_title()); ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php if (get_field('lokalizacja')): ?>
            <div class="event-box">
                <?php $lokalizacja = get_field('lokalizacja'); ?>
                <?php if ($lokalizacja) { ?>
                <?php echo $lokalizacja['address']; ?>
                <?php echo $lokalizacja['lat']; ?>
                <?php echo $lokalizacja['lng']; ?>
                <?php } ?>
            </div>
            <?php endif; ?>
            <?php else: ?>

            <p class="event-alert">
                <?php echo __('To wydarzenie już się odbyło.'); ?>
            </p>

            <?php endif; ?>

            <?php endif; ?>

            <?php if (have_rows('gdzie')): ?>
            <?php while (have_rows('gdzie')): the_row(); ?>
            <?php $city = get_sub_field('miasto'); ?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php if ($city): ?>
            <div class="event-box">
                <h5> <?php echo __('Inne wydarzenia w tym mieście'); ?></h5>
                <?php $testimonials = new WP_Query(array('post_type' => 'events', 'meta_key' => 'gdzie_miasto', 'meta_value' => $city, 'post_status' => 'publish', 'posts_per_page' => -1)); ?>
                <?php if ($testimonials->have_posts()): ?>
                <nav class="event-items">
                    <?php while ($testimonials->have_posts()): $testimonials->the_post(); ?>
                    <?php if (have_rows('kiedy')): ?>
                    <?php while (have_rows('kiedy')): the_row(); ?>
                    <?php $start = get_sub_field('data'); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if (strtotime($start) > strtotime(date('d-m-Y'))): ?>
                    <a class="event-item" href="<?php esc_url(the_permalink()); ?>">
                        <?php if ($start): ?>
                        <span class="event-date">
                            <span><?php the_convert_month($start); ?></span>
                            <span><?php the_display_only_day($start); ?></span>
                            <span><?php the_display_only_year($start); ?></span>
                        </span>
                        <?php endif; ?>
                        <span class="event-info">
                            <h2><?php the_title(); ?></h2>
                            <?php if (have_rows('czas')): ?>
                            <?php while (have_rows('czas')): the_row(); ?>
                            <span>
                                <i class="fas fa-clock"></i> <?php the_sub_field('rozpoczecie'); ?>
                                - <?php the_sub_field('zakonczenie'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php if (have_rows('gdzie')): ?>
                            <?php while (have_rows('gdzie')): the_row(); ?>
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                <?php the_sub_field('miasto'); ?> - <?php the_sub_field('obiekt'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </span>
                    </a>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </nav>
                <?php else: ?>
                <p class="event-alert">
                    <?php echo __('Na dzień dzisiejszy nie ma innych wydarzeń.'); ?>
                </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="event-box">
                <h5> <?php echo __('Jeszcze w tym  miesiącu'); ?></h5>
                <?php $testimonials = new WP_Query(array('post_type' => 'events', 'post_status' => 'publish', 'posts_per_page' => 5)); ?>
                <?php if ($testimonials->have_posts()): ?>
                <nav class="event-items">
                    <?php while ($testimonials->have_posts()): $testimonials->the_post(); ?>
                    <?php if (have_rows('kiedy')): ?>
                    <?php while (have_rows('kiedy')): the_row(); ?>
                    <?php $start = get_sub_field('data'); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if (strtotime($start) > strtotime(date('d-m-Y'))): ?>
                    <a class="event-item" href="<?php esc_url(the_permalink()); ?>">
                        <?php if ($start): ?>
                        <span class="event-date">
                            <span><?php the_convert_month($start); ?></span>
                            <span><?php the_display_only_day($start); ?></span>
                            <span><?php the_display_only_year($start); ?></span>
                        </span>
                        <?php endif; ?>
                        <span class="event-info">
                            <h2><?php the_title(); ?></h2>
                            <?php if (have_rows('czas')): ?>
                            <?php while (have_rows('czas')): the_row(); ?>
                            <span>
                                <i class="fas fa-clock"></i> <?php the_sub_field('rozpoczecie'); ?>
                                - <?php the_sub_field('zakonczenie'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php if (have_rows('gdzie')): ?>
                            <?php while (have_rows('gdzie')): the_row(); ?>
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                <?php the_sub_field('miasto'); ?> - <?php the_sub_field('obiekt'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </span>
                    </a>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </nav>
                <?php else: ?>
                <p class="event-alert">
                    <?php echo __('Wszystkie nasze wydarzenia w tym miesiącu już się odbyły.'); ?>
                </p>
                <?php endif; ?>
            </div>
            <div class="event-box">
                <h5> <?php echo __('Najnowsze wydarzenia'); ?></h5>
                <?php $testimonials = new WP_Query(array('post_type' => 'events', 'post_status' => 'publish', 'posts_per_page' => 5)); ?>
                <?php if ($testimonials->have_posts()): ?>
                <nav class="event-items">
                    <?php while ($testimonials->have_posts()): $testimonials->the_post(); ?>
                    <a class="event-item" href="<?php esc_url(the_permalink()); ?>">
                        <?php if (have_rows('kiedy')): ?>
                        <?php while (have_rows('kiedy')): the_row(); ?>
                        <?php $start = get_sub_field('data'); ?>
                        <?php if ($start): ?>
                        <span class="event-date">
                            <span><?php the_convert_month($start); ?></span>
                            <span><?php the_display_only_day($start); ?></span>
                            <span><?php the_display_only_year($start); ?></span>
                        </span>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <span class="event-info">
                            <h2><?php the_title(); ?></h2>
                            <?php if (have_rows('czas')): ?>
                            <?php while (have_rows('czas')): the_row(); ?>
                            <span>
                                <i class="fas fa-clock"></i> <?php the_sub_field('rozpoczecie'); ?>
                                - <?php the_sub_field('zakonczenie'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php if (have_rows('gdzie')): ?>
                            <?php while (have_rows('gdzie')): the_row(); ?>
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                <?php the_sub_field('miasto'); ?> - <?php the_sub_field('obiekt'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </span>
                    </a>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </nav>
                <?php endif; ?>
            </div>
        </div>
        <aticle class="col-12 col-md-7">
            <?php the_content(); ?>
        </aticle>
    </div>
    <div class="gallery-container">
        <?php $galeria_images = get_field('galeria'); ?>
        <?php if ($galeria_images): ?>
        <?php foreach ($galeria_images as $galeria_image): ?>
        <div class="gallery-item">
            <a href="<?php echo $galeria_image['sizes']['large']; ?>" data-lightbox="roadtrip"
                title="<?php echo $galeria_image['title']; ?>">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/bg-square.jpg"
                    data-src="<?php echo $galeria_image['sizes']['large']; ?>"
                    alt="<?php echo $galeria_image['alt']; ?>" />
            </a>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php wpFn::get_template_parts(array('footer')); ?>