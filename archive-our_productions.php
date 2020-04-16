<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>

<div class="container">
    <?php while (have_posts()): the_post(); ?>
    <div class="row">
        <div class=".col-12 col-md-8">
            <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                    data-src="<?php echo the_post_thumbnail_url('slider'); ?>" class="img-fluid thumbnail"
                    alt="<?php the_title(); ?>, <?php echo get_bloginfo('name'); ?>">
            </a>
        </div>
        <div class="col-12 col-md-4">
            <h1>
                <?php the_title(); ?>
            </h1>
            <span>
                <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>">
                    <?php echo __('Więcej informacji'); ?></a>
            </span>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<div class="pagination">
    <?php wpFn::pagination_bar(); ?>
</div>

<?php endif; ?>

<?php wpFn::get_template_parts(array('footer')); ?>