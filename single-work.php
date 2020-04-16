<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>

<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 col-md-6 mb-5">
            <h2>
                <?php the_title(); ?>
            </h2>
            <?php the_field('zakres_obowiazkow_'); ?>
            <?php if (have_rows('wymagane')): ?>
            <ol>
                <?php while (have_rows('wymagane')): the_row(); ?>
                <li>
                    <?php the_sub_field('wymog'); ?>
                </li>
                <?php endwhile; ?>
            </ol>
            <?php endif; ?>
        </div>

        <div class="col-12 col-md-6 offset-lg-2 col-lg-4">

            <form id="work" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">

                <input type="hidden" name="position" value="<?php the_title(); ?>">

                <input id="name" name="name" placeholder="Imię i nazwisko" type="text" class="form-control">

                <input id="address" name="address" placeholder="Adres zamieszkania" type="address" class="form-control">

                <input id="age" name="age" min="18" placeholder="Wiek" type="number" class="form-control">

                <input id="phone" name="phone" placeholder="Telefon" type="number" class="form-control">

                <input id="mail" name="email" placeholder="E-mail" type="mail" class="form-control">

                <textarea id="experience" name="experience" rows="4"
                    placeholder="Doświadczenie na stanowisku - <?php the_title(); ?>" class="form-control"></textarea>

                <hr>

                <span class="form-m">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="input-check1" value="1">
                    <label class="form-info" for="input-check1">
                        <?php echo __(get_field('zgoda_na_przedstawienie_oferty', 'option')); ?>
                    </label>
                </span>

                <p class="form-info form-info__p"><?php echo __(get_field('klauzula_informacyjna', 'option')); ?></p>


                <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                        class="fas fa-paper-plane mr-2"></i><?php echo __('Zamawiam'); ?></button>
                <input type="hidden" name="action" value="work">

            </form>

        </div>
    </div>
</div>

<?php endwhile; ?>
<?php endif; ?>

<?php wpFn::get_template_parts(array('footer')); ?>