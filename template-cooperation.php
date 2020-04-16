<?php
/*
 * Template Name: Współpraca
 */; ?>

<?php wpFn::get_template_parts(array('header')); ?>

<section class="container mb-5 mt-5 pb-5 pt-5">
    <?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
        <div class="col-12 col-md-6 mb-5">
            <h2 class="mb-5">
                <?php the_title(); ?>
            </h2>
            <?php the_content(); ?>
        </div>
        <div class="col-12 col-md-6 offset-lg-2 col-lg-4">

            <form id="cooperation" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">

                <input id="name" name="name" placeholder="Imię i nazwisko" type="text" class="form-control">

                <input id="phone" name="phone" placeholder="Telefon" type="phone" class="form-control">

                <input id="mail" name="email" placeholder="E-mail" type="mail" class="form-control">

                <textarea class="form-control" name="message" rows="8"
                    placeholder="<?php echo __('Forma współpracy'); ?>"></textarea>

                <span class="form-m">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="input-check1" value="1">
                    <label class="form-info" for="input-check1">
                        <?php echo __(get_field('zgoda_na_przedstawienie_oferty', 'option')); ?>
                    </label>
                </span>

                <p class="form-info form-info__p"><?php echo __(get_field('klauzula_informacyjna', 'option')); ?></p>

                <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                        class="fas fa-paper-plane mr-2"></i><?php echo __('Zamawiam'); ?></button>
                <input type="hidden" name="action" value="cooperation">

            </form>

        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>

<?php wpFn::get_template_parts(array('footer')); ?>