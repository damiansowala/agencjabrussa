<?php wpFn::get_template_parts(array('header')); ?>



<?php if (have_posts()): ?>

<?php $img_header = get_field('img header', 'option'); ?>
<?php if ($img_header): ?>
<section class="stage-header">
    <img class="thumbnail" src="<?php echo $img_header['url']; ?>" alt="<?php echo $img_header['alt']; ?>" />
    <h1> <?php the_cpt_name(); ?></h1>
</section>
<?php endif; ?>

<section class="container stage-offer">
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
        <article class="col-12 col-md-4">
            <a href="<?php esc_url(the_permalink()); ?>" title="Więcej informacji o: <?php the_title(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                    data-src="<?php echo the_post_thumbnail_url('thumbnail-large'); ?>" class="img-fluid"
                    alt="agencja brussa, technika sceniczna, <?php the_title(); ?>">
                <h1><?php the_title(); ?></h1>
            </a>
        </article>
        <?php endwhile; ?>
    </div>
</section>
<?php endif; ?>

<section class="stage-contact">
    <div class="container">
        <div class="row">
            <article class="col-12">
                <h1><?php echo __('Organizujesz imprezę?'); ?></h1>
                <p><?php echo __('Potrzebujesz specjalistycznej obsługi? Wyślij do nas wiadomość z podstawowymi informacjami a my
                    oddzwonimy do Ciebie z wiadomością zwrotną.'); ?></p>
            </article>
            <form id="form-stage" class="row" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">
                <div class="col-12 col-md-6">
                    <legend><?php echo __('Osoba kontaktowa'); ?></legend>
                    <input id="name" name="name" placeholder="Imię i nazwisko" type="text" class="form-control">
                    <legend><?php echo __('E-mail os. kontaktowej'); ?></legend>
                    <input id="mail" name="email" placeholder="E-mail" type="mail" class="form-control">
                    <legend><?php echo __('Numer telefonu os. kontaktowej'); ?></legend>
                    <input id="phone" name="phone" placeholder="328 937 393" type="phone" class="form-control">
                </div>
                <div class="col-12 col-md-6">
                    <legend><?php echo __('Usługa'); ?></legend>
                    <select id="filterTicets" class="form-control form-control-sm" name="offerStage">
                        <option value="0" selected><?php echo __('Wybierz'); ?></option>
                        <option value="<?php echo __('Kompleksowa obsługa wydarzenia'); ?>">
                            <?php echo __('Kompleksowa obsługa wydarzenia'); ?></option>
                        <?php while (have_posts()): the_post(); ?>
                        <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                        <?php endwhile; ?>
                    </select>
                    <legend><?php echo __('Data wydarzenia'); ?></legend>
                    <input id="date" name="date" min="<?php echo date('Y-m-d'); ?>" data-toggle="tooltip"
                        data-placement="bottom" title="<?php echo __('Kiedy?'); ?>" type="date" class="form-control">
                    <legend><?php echo __('Miasto gdzie odbyć ma się wydarzenie'); ?></legend>
                    <input id="city" name="city" placeholder="Miasto" type="text" class="form-control">
                </div>
                <div class="col-12">
                    <span class="form-m">
                        <input class="form-check-input" type="checkbox" name="checkbox" id="input-check1" value="1">
                        <legend class="form-info" for="input-check1">
                            <?php echo __(get_field('zgoda_na_przedstawienie_oferty', 'option')); ?>
                        </legend>
                    </span>

                    <p class="form-info form-info__p"><?php echo __(get_field('klauzula_informacyjna', 'option')); ?>
                    </p>

                    <button type="submit" class="btn stage-btn btn-block"><i
                            class="fas fa-paper-plane mr-2"></i><?php echo __('zapytaj o termin'); ?></button>
                    <input type="hidden" name="action" value="contact_stage">
                </div>
            </form>
        </div>
    </div>
</section>

<?php if (have_rows('obslugiwane_wydarzenia', 'option')): ?>
<?php while (have_rows('obslugiwane_wydarzenia', 'option')): the_row(); ?>
<section class="container-fluid stage-events">
    <div class="row">
        <article class="col-12 col-md-9 col-lg-6">
            <h1><?php the_sub_field('tytul'); ?></h1>
            <p><?php the_sub_field('opis'); ?></p>
        </article>
        <div class="col-12 col-md-3 col-lg-6">
            <?php $obraz = get_sub_field('obraz'); ?>
            <?php if ($obraz) { ?>
            <img class="thumbnail" src="<?php echo $obraz['sizes']['slider']; ?>" alt="<?php echo $obraz['alt']; ?>" />
            <?php } ?>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>


<?php wpFn::get_template_parts(array('footer')); ?>