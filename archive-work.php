<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>
<div class="container mb-5 mt-5">
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
        <div class="col-12 col-md-6 col-lg-4 mb-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-3"><?php the_title(); ?></h2>
                    <p class="card-text mb-5"><?php echo wp_trim_words(get_field('zakres_obowiazkow_'), 25); ?></p>
                    <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>">
                        <?php echo __('Zobacz ogłoszenie'); ?>
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php wpFn::pagination_bar(); ?>
</div>
<?php else: ?>
<div class="container">
    <div class="row m-5 p-5">
        <div class="col m-5 p-5">
            <h2 class="text-center">
                <?php echo __('Brak ogłoszeń w chwili obecnej'); ?>
            </h2>
        </div>
    </div>
</div>
<?php endif; ?>
<?php wpFn::get_template_parts(array('footer')); ?>