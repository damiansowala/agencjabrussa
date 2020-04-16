<?php
/*
 * Template Name: Kontakt
 */
; ?>

<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
<div class="container">

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 contact-info">
            <?php the_content(); ?>
        </div>

        <div class="col-12 col-md-6 col-lg-5 offset-lg-3">
            <form id="form-contact" class="form needs-validation" action="<?php echo admin_url('admin-ajax.php'); ?>"
                method="POST">
                <input type="text" class="form-control" name="name" placeholder="<?php echo __('Imię i nazwisko'); ?>"
                    require>
                <input type="email" class="form-control" name="email" placeholder="<?php echo __('E-mail'); ?>" require>
                <input type="tel" class="form-control" name="phone" placeholder="<?php echo __('Telefon'); ?>" require>

                <textarea class="form-control" name="message" rows="8"
                    placeholder="<?php echo __('Treść wiadomość'); ?>" require></textarea>

                <span class="form-m">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="input-check1" value="1" require>
                    <label class="form-info" for="input-check1">
                        <?php echo __(get_field('zgoda_na_przedstawienie_oferty', 'option')); ?>
                    </label>
                </span>

                <p class="form-info form-info__p"><?php echo __(get_field('klauzula_informacyjna', 'option')); ?></p>

                <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                        class="fas fa-paper-plane mr-2"></i><?php echo __('Wyślij'); ?></button>
                <input type="hidden" name="action" value="sendmail_contact">
            </form>
        </div>

    </div>

    <div class="row contact-person">
        <?php if (have_rows('osoby')): ?>
        <?php while (have_rows('osoby')): the_row(); ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="row">
                <div class="col-6">
                    <?php $zdjecie = get_sub_field('zdjecie'); ?>
                    <?php if ($zdjecie) { ?>
                    <img class="img-fluid" src="<?php echo $zdjecie['sizes']['thumbnail']; ?>"
                        alt="<?php echo $zdjecie['alt']; ?>" />
                    <?php } ?>
                </div>
                <div class="col-6">
                    <h4> <?php the_sub_field('imie_i_nazwisko'); ?></h4>
                    <p><em><?php the_sub_field('funkcja'); ?></em></p>
                    <nav>
                        <?php if (get_sub_field('e-mail')): ?>
                        <a href="mailto:<?php the_sub_field('e-mail'); ?>"><?php the_sub_field('e-mail'); ?></a>
                        <?php endif; ?>
                        <?php if (get_sub_field('telefon')): ?>
                        <a href="tel:<?php the_sub_field('telefon'); ?>"><?php the_sub_field('telefon'); ?></a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<div class="container-fluid  contact-note">
    <div class="container">
        <div class="row">
            <article class="col-12">
                <h2>O agencji</h2>
                <?php the_field('informacje_o_nas', 32); ?>
            </article>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 carousel-logo">
            <?php if (have_rows('logotypy_patronow_')): ?>
            <h2>Patroni medialni</h2>
            <div class="carousel-logo-items">
                <?php while (have_rows('logotypy_patronow_')): the_row(); ?>
                <?php $logo = get_sub_field('logo'); ?>
                <?php if ($logo): ?>
                <?php $strona_www = get_sub_field('strona_www'); ?>
                <?php if ($strona_www): ?>
                <a href="<?php echo $strona_www; ?>" title="<?php the_sub_field('nazwa_firmy'); ?>">
                    <img class="carousel-logo-img" src="<?php echo $logo['url']; ?>"
                        alt="<?php echo $logo['alt']; ?>" />
                </a>
                <?php else: ?>
                <img class="carousel-logo-img" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                <?php endif; ?>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php if (have_rows('logotypy_kontrahentow')): ?>
            <h2>Współpraca</h2>
            <div class="carousel-logo-items">
                <?php while (have_rows('logotypy_kontrahentow')): the_row(); ?>
                <?php $logo = get_sub_field('logo'); ?>
                <?php if ($logo): ?>
                <?php $strona_www = get_sub_field('strona_www'); ?>
                <?php if ($strona_www): ?>
                <a href="<?php echo $strona_www; ?>" title="<?php the_sub_field('nazwa_firmy'); ?>">
                    <img class="carousel-logo-img" src="<?php echo $logo['url']; ?>"
                        alt="<?php echo $logo['alt']; ?>" />
                </a>
                <?php else: ?>
                <img class="carousel-logo-img" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                <?php endif; ?>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container-fluid contact-map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9701.698913466942!2d17.6453046!3d52.56193!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1cb1e1e8bbaaef07!2sAGENCJA%20BRUSSA%20Jaros%C5%82aw%20Brussa!5e0!3m2!1spl!2spl!4v1574189671108!5m2!1spl!2spl"></iframe>

</div>

<?php wpFn::get_template_parts(array('footer')); ?>