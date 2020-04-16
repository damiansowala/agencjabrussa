<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>

<?php if (get_field('wideo')): ?>
<section class="offer-video-header">
    <div class="embed-container">
        <?php video_header(get_field('wideo')); ?>
    </div>
    <span>
        <h1> <?php the_title(); ?> </h1>
    </span>
</section>
<?php else: ?>
<section class="offer-distinctive-header">
    <img src="<?php echo the_post_thumbnail_url('slider'); ?>" class="card-img" alt="<?php the_title(); ?>">
    <span>
        <h1> <?php the_title(); ?> </h1>
    </span>

</section>
<?php endif; ?>

<section class="offer-info">
    <div class="container">
        <h2><?php echo __('O projekcie'); ?></h2>
        <?php the_content(); ?>
    </div>
</section>


<section class="offer-button ">
    <div class="container">
        <div class="row">
            <?php if (have_rows('strona_projektu')): ?>
            <?php while (have_rows('strona_projektu')): the_row(); ?>
            <?php if (get_row_layout() == 'zamow_termin'): ?>
            <div class="col-12 col-md-4">
                <button type="button" class="btn btn-outline-light btn-lg btn-block" data-toggle="modal"
                    data-target="#order-date"><i class="fas fa-calendar-check"></i>
                    <?php echo __('Zamów termin'); ?>
                </button>
            </div>
            <?php elseif (get_row_layout() == 'kup_bilet'): ?>
            <div class="col-12 col-md-4">
                <button type="button" class="btn btn-outline-light btn-lg btn-block" data-toggle="modal"
                    data-target="#buy-tickets"><i class="fas fa-ticket-alt"></i>
                    <?php echo __('Kup bilet'); ?>
                </button>
            </div>
            <?php elseif (get_row_layout() == 'strona_projektu'): ?>
            <div class="col-12 col-md-4">
                <a heft="<?php the_sub_field('link_do_strony'); ?>" class="btn btn-outline-light btn-lg btn-block"><i
                        class="fas fa-globe-europe"></i><?php echo __('Strona projektu'); ?></a>
            </div>
            <?php elseif (get_row_layout() == 'najblizsze_koncerty'): ?>
            <div class="col-12 col-md-4">
                <a heft=" <?php the_sub_field('link_do_wydarzen'); ?>" class="btn btn-outline-light btn-lg btn-block"><i
                        class="fas fa-calendar"></i><?php echo __('Najbliższe koncerty'); ?></a>
            </div>
            <?php elseif (get_row_layout() == 'mam_pytanie'): ?>
            <div class="col-12 col-md-4">
                <button type="button" class="btn btn-outline-light btn-lg btn-block" data-toggle="modal"
                    data-target="#quest"><i class="fas fa-question"></i>
                    <?php echo __('Mam pytanie'); ?>
                </button>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="our_productions">


    <?php if (have_rows('bilder')): ?>
    <?php while (have_rows('bilder')): the_row(); ?>
    <?php if (get_row_layout() == 'artysci'): ?>


    <?php if (have_rows('artysci')): ?>
    <section class="offer-artists">
        <div class="container">
            <div class="row">
                <?php while (have_rows('artysci')): the_row(); ?>
                <?php $zdjecie = get_sub_field('foto'); ?>

                <div class="col-12 col-md-6">
                    <img class="img-fluid" src="<?php echo $zdjecie['sizes']['thumbnail']; ?>"
                        alt="<?php echo $zdjecie['alt']; ?>" />
                    <h2> <?php the_sub_field('imie_i_nazwisko'); ?></h2>
                    <h5><em> <?php the_sub_field('zawod'); ?></em></h5>
                    <p>
                        <?php the_sub_field('notka'); ?>
                    </p>
                </div>

                <?php endwhile; ?>
            </div>
    </section>
    <?php endif; ?>
    <?php elseif ( get_row_layout() == 'repertuar' ) : ?>
    <?php if ( have_rows( 'lista_utowrow' ) ) : ?>

    <section class="offer-single">
        <div class="container">
            <h2><?php echo __('Repertuar'); ?></h2>
            <div class="row">
                <?php while ( have_rows( 'lista_utowrow' ) ) : the_row(); ?>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-music mr-2"></i>
                                <?php the_sub_field( 'utwor' ); ?></h5>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <?php endif; ?>
    <?php elseif (get_row_layout() == 'statystyki'): ?>

    <section class="container-fluid offer-statistics">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <h3> <?php the_sub_field('liczba_tras_koncertowych'); ?></h3>
                    <h4><?php echo __('Tras koncertowych'); ?></h4>
                </div>
                <div class="col-12 col-md-4">
                    <h3> <?php the_sub_field('ilosc_koncertow_'); ?></span>
                        <h4><?php echo __('Zagranych koncertów'); ?></h4>
                </div>
                <div class="col-12 col-md-4">
                    <h3><?php the_sub_field('ilosc_sprzedanych_biletow_'); ?></h3>
                    <h4><?php echo __('Sprzedanych biletów'); ?></h4>
                </div>
            </div>
        </div>
    </section>

    <?php elseif (get_row_layout() == 'wideo'): ?>
    <section class="container offer-video">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="offer-video-box">
                    <?php the_sub_field('wideo'); ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <p> <?php the_sub_field('nota'); ?></p>
            </div>
        </div>
    </section>

    <?php elseif (get_row_layout() == 'galeria'): ?>
    <section class="container-fluid offer-gallery">
        <div class="container">
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
        </div>
    </section>

    <?php elseif (get_row_layout() == 'opinie_widzow'): ?>
    <?php if (have_rows('opinie')): ?>
    <section class="container offer-opinions">
        <div class="row">
            <?php while (have_rows('opinie')): the_row(); ?>
            <article class="col-12 col-md-6">
                <p><em><?php the_sub_field('opinia'); ?></em></p>
                <h6><em>- <?php the_sub_field('imie'); ?></em></h6>
            </article>
            <?php endwhile; ?>
        </div>
    </section>
    <?php endif; ?>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php endwhile; ?>
<?php endif; ?>


<!-- Modal -->


<?php if (have_rows('strona_projektu')): ?>
<?php while (have_rows('strona_projektu')): the_row(); ?>
<?php if (get_row_layout() == 'zamow_termin'): ?>

<div class="modal fade" id="order-date" tabindex="-1" role="dialog" aria-labelledby="orderDateTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDateTitle">
                    <?php echo __('Zamów występ'); ?><br><em><?php the_title(); ?> </em></h5>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-offer-1" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">

                    <input name="artist" type="hidden" value="<?php the_title(); ?>">
                    <input id="name" name="name" placeholder="Imię i nazwisko" type="text" class="form-control">
                    <input id="date" name="date" min="<?php echo date('Y-m-d'); ?>" data-toggle="tooltip"
                        data-placement="bottom" title="<?php echo __('Kiedy?'); ?>" type="date" class="form-control">
                    <input id="city" name="city" placeholder="Miasto" type="text" class="form-control">
                    <input id="phone" name="phone" placeholder="Telefon" type="phone" class="form-control">
                    <input id="mail" name="email" placeholder="E-mail" type="mail" class="form-control">

                    <span class="form-m">
                        <input class="form-check-input" type="checkbox" name="checkbox" id="input-check1" value="1">
                        <label class="form-info" for="input-check1">
                            <?php echo __(get_field('zgoda_na_przedstawienie_oferty', 'option')); ?>
                        </label>
                    </span>

                    <p class="form-info form-info__p"><?php echo __(get_field('klauzula_informacyjna', 'option')); ?>
                    </p>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-paper-plane mr-2"></i><?php echo __('Zamów'); ?></button>
                        <input type="hidden" name="action" value="order_our">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php elseif (get_row_layout() == 'kup_bilet'): ?>

<div class="modal fade" id="buy-tickets" tabindex="-1" role="dialog" aria-labelledby="buyTicketsTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buyTicketsTitle"><?php echo __('Kup bilet'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (have_rows('gdzie_kupic')): ?>
                <?php while (have_rows('gdzie_kupic')): the_row(); ?>

                <?php the_sub_field('nazwa_strony'); ?>
                <?php the_sub_field('link'); ?>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php elseif (get_row_layout() == 'mam_pytanie'): ?>

<div class="modal fade" id="quest" tabindex="-1" role="dialog" aria-labelledby="questTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="questTitle"><?php echo __('Mam pytanie'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-offer-3" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">

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

                    <p class="form-info form-info__p"><?php echo __(get_field('klauzula_informacyjna', 'option')); ?>
                    </p>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-paper-plane mr-2"></i><?php echo __('Wyślij'); ?></button>
                        <input type="hidden" name="action" value="contact_our">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


<?php wpFn::get_template_parts(array('footer')); ?>