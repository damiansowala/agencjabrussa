<?php wpFn::get_template_parts(array('header')); ?>

<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>

<?php if (get_field('wideo')): ?>
<?php else: ?>
<section class="stage-offer-header">
    <img src="<?php echo the_post_thumbnail_url('slider'); ?>" alt="<?php the_title(); ?>">
    <span class="stage-info">
        <h1><?php the_title(); ?> </h1>
        <?php the_content(); ?>
    </span>

</section>
<?php endif; ?>

<?php $galeria_images = get_field('galeria'); ?>
<?php if ($galeria_images): ?>
<section class="container mb-5 mt-5">
    <div class="gallery-container">
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
    </div>
</section>
<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

<?php wpFn::get_template_parts(array('footer')); ?>