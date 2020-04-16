<?php wpFn::get_template_parts(array('header')); ?>

<section class="container mb-5">
    <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

    <h2 class="mb-5">
        <?php the_title(); ?>
    </h2>
    <?php the_content(); ?>

    <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php wpFn::get_template_parts(array('footer')); ?>