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
        <h2><em><?php echo __(the_category_name($post->ID)); ?></em></h2>
    </span>
</section>
<?php else: ?>
<section class="offer-distinctive-header">
    <img src="<?php echo the_post_thumbnail_url('slider'); ?>" class="card-img" alt="<?php the_title(); ?>">
    <span>
        <h1><?php the_title(); ?> </h1>
        <h2><em><?php echo __(the_category_name($post->ID)); ?></em></h2>
    </span>
</section>
<?php endif; ?>

<section class="offer-info">
    <div class="container">
        <?php the_content(); ?>
    </div>
</section>

<section class="offer-button">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <button type="button" class="btn btn-outline-light btn-lg btn-block" data-toggle="modal"
                    data-target="#modalOrderArtist"> <i class="fas fa-calendar mr-2"></i>
                    <?php echo __('Zamów artystę'); ?>
                </button>
            </div>
            <div class="col-12 col-md-4">
                <button type="button" class="btn btn-outline-light btn-lg btn-block" data-toggle="modal"
                    data-target="#modalSlowDate"> <i class="fas fa-comment-dots mr-2"></i>
                    <?php echo __('Wolne terminy'); ?>
                </button>
            </div>
            <div class="col-12 col-md-4">
                <button type="button" class="btn btn-outline-light btn-lg btn-block" data-toggle="modal"
                    data-target="#modalContact"> <i class="fas fa-comment-dots mr-2"></i>
                    <?php echo __('Prośba o kontakt'); ?>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="offer-programs">
    <div class="container"></div>
</section>

<?php if (have_rows('bilder')): ?>
<?php while (have_rows('bilder')): the_row(); ?>
<?php if (get_row_layout() == 'albumy'): ?>
<?php if (have_rows('lista')): ?>
<section class="offer-albums">
    <div class="container">
        <h2><?php echo __('Albumy'); ?></h2>
        <div class="row">
            <?php while (have_rows('lista')): the_row(); ?>
            <?php if (get_sub_field('tytul_albumu')): ?>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-record-vinyl mr-2"></i>
                            <?php the_sub_field('tytul_albumu'); ?></h5>
                        <p class="card-text"><small
                                class="text-muted"><?php echo __('Rok wydania: '); ?><?php the_sub_field('rok_wydania'); ?></small>
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php elseif (get_row_layout() == 'artysci'): ?>

<?php if (have_rows('lista')): ?>
<section class="offer-artists">
    <div class="container">
        <div class="row">
            <?php while (have_rows('lista')): the_row(); ?>
            <?php $zdjecie = get_sub_field('zdjecie'); ?>
            <?php if ($zdjecie) { ?>
            <div class="col-12 col-md-6">
                <img class="img-fluid" src="<?php echo $zdjecie['sizes']['thumbnail']; ?>"
                    alt="<?php echo $zdjecie['alt']; ?>" />
                <h2> <?php the_sub_field('imie_i_nazwisko'); ?></h2>
                <p>
                    <?php the_sub_field('notka_'); ?>
                </p>
            </div>
            <?php } ?>
            <?php endwhile; ?>
        </div>
</section>
<?php endif; ?>


<?php elseif (get_row_layout() == 'single'): ?>
<?php if (have_rows('lista')): ?>
<section class="offer-single">
    <div class="container">
        <h2><?php echo __('Single'); ?></h2>
        <div class="row">
            <?php while (have_rows('lista')): the_row(); ?>
            <?php if (get_sub_field('nazwa_albumu')): ?>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-music mr-2"></i>
                            <?php the_sub_field('nazwa_albumu'); ?></h5>
                        <div class="d-flex">
                            <p><?php echo __('Rok wydania: '); ?><?php the_sub_field('rok_wydania'); ?></p>
                            <?php if (get_sub_field('link_do_youtube')): ?>
                            <a href="<?php the_sub_field('link_do_youtube'); ?>" target="_blank"><i
                                    class="fas fa-play mr-2"></i><?php echo __('Posłuchaj'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php elseif (get_row_layout() == 'programy_artystyczne'): ?>
<?php if (have_rows('lista')): ?>
<?php while (have_rows('lista')): the_row(); ?>
<?php the_sub_field('tytul_programu'); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php elseif (get_row_layout() == 'tekst'): ?>
<section class="offer-info">
    <div class="container">
        <?php the_sub_field('edytor'); ?>
    </div>
</section>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php $galeria_images = get_field('galeria'); ?>
<?php if ($galeria_images): ?>
<section class="container mb-5">
    <div class="gallery-container">
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
    </div>
</section>
<?php endif; ?>

<div class="gallery-header mb-5">
    <h3><?php echo __('Inne propozycje z naszej oferty'); ?></h3>
</div>

<?php $categories = get_the_terms($post->ID, "offer-category"); ?>
<?php $id = $categories[0]->term_id; ?>
<?php $catquery = new WP_Query(wpFn::getPostCategory('offer', $id, 10)); ?>
<nav class="gallery-carousel mb-5">
    <?php while ($catquery->have_posts()): $catquery->the_post(); ?>
    <a class="gallery-card" href="<?php the_permalink(); ?>" rel="bookmark">
        <img src="<?php the_post_thumbnail_url('cover'); ?>" class="img-fluid" alt="Oferta: <?php the_title(); ?>">
        <span><?php the_title(); ?></span>
    </a>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
</nav>

<div class="modal fade" id="modalOrderArtist" tabindex="-1" role="dialog" aria-labelledby="modalOrderArtistTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalOrderArtistTitle">
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
                        <input type="hidden" name="action" value="order_artist">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
                <form id="form-offer-2" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">

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

                    <p class="form-info form-info__p"><?php echo __(get_field('klauzula_informacyjna', 'option')); ?>
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
                        <input type="hidden" name="action" value="contact_artist">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endwhile; ?>
<?php endif; ?>

<?php wpFn::get_template_parts(array('footer')); ?>