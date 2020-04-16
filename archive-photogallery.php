<?php wpFn::get_template_parts(array('header')); ?>

<div class="gallery-archive">

    <div class="gallery-img-header">
        <?php $args = array('post_type' => 'photogallery', 'posts_per_page' => 1);
$the_query = new WP_Query($args); ?>
        <?php if ($the_query->have_posts()): ?>
        <?php while ($the_query->have_posts()): $the_query->the_post();
    $do_not_duplicate = $post->ID; ?>


        <img src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
            data-src="<?php echo the_post_thumbnail_url('full'); ?>" class="card-img"
            alt="<?php the_title(); ?>, agencja brussa, najnowsza oferta">
        <div>
            <h3><?php echo __('Najnowsza relacja'); ?></h3>
            <h2><?php the_title(); ?></h2>
            <span>
                <p><?php echo __('Dodano: '); ?><?php the_date(); ?></p>
                <a href="<?php the_permalink(); ?>" title="<?php echo __('Zobacz galerię: '); ?><?php the_title(); ?>">
                    <?php echo __('Zobacz galerię'); ?></a>
            </span>

        </div>


        <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="gallery-body">
        <h3 class="gallery-subheader"><?php echo __('Ostatnio dodane'); ?> </h3>
        <div class="gallery-carousel">
            <?php $args = array('post_type' => 'photogallery', 'posts_per_page' => 7);
$the_query = new WP_Query($args); ?>
            <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()): $the_query->the_post();
    $do_not_duplicate = $post->ID; ?>
            <a class="gallery-card" href="<?php the_permalink(); ?>" rel="bookmark">
                <img src="<?php the_post_thumbnail_url('cover'); ?>" class="img-fluid"
                    alt="Galeria: <?php the_title(); ?>">
                <span><?php the_title(); ?></span>
            </a>
            <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php $terms = get_terms(array(
    'taxonomy' => 'photogallery-category',
    'orderby' => 'name',
    'order' => 'ASC',
)); ?>
        <?php if ($terms && !is_wp_error($terms)): ?>
        <?php foreach ($terms as $term) {
    ?>
        <div class="gallery-link">
            <h3><?php echo $term->name; ?></h3>
            <a href="<?php echo get_category_link($term->term_id); ?>"
                title="Przejdź do kategorii: <?php echo $term->name; ?>">
                <?php echo __('Przejdź do kategorii'); ?>
            </a>
        </div>
        <?php $catquery = new WP_Query(
        array(
            'post_type' => 'photogallery',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'orderby' => 'rand',
            'tax_query' => array(
                array(
                    'taxonomy' => 'photogallery-category',
                    'field' => 'slug',
                    'terms' => array($term->slug),
                    'operator' => 'IN',
                ),
            ),
        )); ?>
        <div class="gallery-carousel">
            <?php while ($catquery->have_posts()): $catquery->the_post(); ?>

            <a class="gallery-card" href="<?php the_permalink(); ?>" rel="bookmark">
                <img src="<?php the_post_thumbnail_url('cover'); ?>" class="img-fluid"
                    alt="Galeria: <?php the_title(); ?>">
                <span><?php the_title(); ?></span>
            </a>

            <?php endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>
        <?php } ?>
        <?php endif; ?>
    </div>
</div>

<?php wpFn::get_template_parts(array('footer')); ?>