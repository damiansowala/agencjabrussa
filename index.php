<?php wpFn::get_template_parts(array('header')); ?>

<div class="container archive-offer">
    <div class="row">

        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>

        <div class="col-12 col-sm-6 col-lg-3">
            <a class="card" href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <img src="<?php echo the_post_thumbnail_url('cover'); ?>" class="card-img-top"
                    alt="<?php the_title(); ?>, <?php echo get_bloginfo('name'); ?>">
                <span class="card-body">
                    <h2><?php the_title(); ?></h2>
                    <?php echo wpFn::content(12); ?>
                </span>
            </a>
        </div>
        <?php endwhile; ?>

        <div class="col-12">
            <ul class="pagination">
                <?php wpFn::pagination_bar(); ?>
            </ul>
        </div>

        <?php endif; ?>

    </div>
</div>


<?php wpFn::get_template_parts(array('footer')); ?>