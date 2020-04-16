<?php wpFn::get_template_parts(array('header')); ?>
<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
<section class="container">
    <h1 class="gallery-header"> <?php the_title(); ?> </h1>
    <div class="gallery-container">
        <?php $galeria_images = get_field('galeria'); ?>
        <?php if ($galeria_images): ?>
        <?php foreach ($galeria_images as $galeria_image): ?>
        <div class="gallery-item">
            <a href="<?php echo $galeria_image['sizes']['large']; ?>" data-lightbox="roadtrip"
                title="<?php echo $galeria_image['title']; ?>">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/images/bg-square.jpg"
                    data-src="<?php echo $galeria_image['sizes']['large']; ?>"
                    alt="<?php echo $galeria_image['alt']; ?>" />
            </a>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>
<?php wpFn::get_template_parts(array('footer')); ?>