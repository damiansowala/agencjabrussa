<?php
/*
 * Template Name: Press Room
 */; ?>

<?php wpFn::get_template_parts(array('header')); ?>

<section class="container mb-5 mt-5 pb-5 pt-5">
    <?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
        <div class="col-12 col-md-6">
            <h2 class="mb-5">
                <?php the_title(); ?>
            </h2>
            <?php the_content(); ?>
        </div>
        <div class="col-12 col-md-6">
            <?php if (have_rows('materialy')): ?>
            <div class="list-group">
                <?php while (have_rows('materialy')): the_row(); ?>
                <?php $plik = get_sub_field('plik'); ?>
                <?php if ($plik) { ?>
                <a href="<?php echo $plik['url']; ?>" title="Pobierz: <?php echo $plik['title']; ?>"
                    class="list-group-item list-group-item-action" download><i class="fas fa-file-download mr-3"></i>
                    <?php echo $plik['title']; ?> <span style="font-size: 10px"
                        class="ml-5"><?php echo size_format($plik['filesize'], 2); ?></span></a>
                <?php } ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>

<?php wpFn::get_template_parts(array('footer')); ?>