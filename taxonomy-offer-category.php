<?php wpFn::get_template_parts(array('header')); ?>
<div class="offer-header">
    <?php $obraz = get_field('obraz', wpFn::term_id_prefixed()); ?>
    <?php if ($obraz) { ?>
    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
        data-src="<?php echo $obraz['sizes']['cover-category']; ?>" alt="<?php echo $obraz['alt']; ?>" />
    <?php } ?>
    <h2>
        <?php single_cat_title(''); ?>
    </h2>
</div>
<div class="container offer-body">
    <div class="row">
        <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
        <div class="col-12 col-sm-6 col-lg-3">
            <a class="card" href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                    data-src="<?php echo the_post_thumbnail_url('cover'); ?>" class="card-img-top"
                    alt="<?php the_title(); ?>, <?php echo get_bloginfo('name'); ?>">
                <span class="card-body">
                    <h2><?php the_title(); ?></h2>
                </span>
            </a>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<ul class="pagination">
    <?php wpFn::pagination_bar(); ?>
</ul>

<?php wpFn::get_template_parts(array('footer')); ?>