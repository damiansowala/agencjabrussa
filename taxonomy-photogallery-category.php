<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>
<div class="container gallery-single">

    <h2 class="gallery-header-page">
        <?php single_cat_title(''); ?>
    </h2>

    <div class="row">
        <?php while (have_posts()): the_post(); ?>
        <a class="gallery-card" href="<?php the_permalink(); ?>" rel="bookmark">
            <img src="<?php the_post_thumbnail_url('cover'); ?>" class="img-fluid" alt="Galeria: <?php the_title(); ?>">
            <span><?php the_title(); ?></span>
        </a>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>

<?php wpFn::get_template_parts(array('footer')); ?>