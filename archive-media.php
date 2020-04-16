<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>

<section class="container mt-5">
    <?php while (have_posts()): the_post(); ?>
    <div class="row mb-5">
        <div class="col-12 col-md-4">
            <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                    data-src="<?php echo the_post_thumbnail_url('thumbnail-large'); ?>" class="img-fluid"
                    alt="agencja brussa, technika sceniczna, <?php the_title(); ?>">
            </a>
        </div>
        <article class="col-12 col-md-8">
            <a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <h1> <?php the_title(); ?> </h1>
            </a>
            <time datetime="<?php the_time('Y-m-d'); ?>" pubdate>
                <?php the_date(); ?> <?php the_time(); ?>
            </time>
            <?php the_content(); ?>
        </article>
    </div>
    <?php endwhile; ?>
</section>

<?php else: ?>
<h1>
    <?php echo __('No posts to display'); ?>
</h1>
<?php endif; ?>

<?php wpFn::get_template_parts(array('footer')); ?>