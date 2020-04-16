<?php wpFn::get_template_parts(array('header')); ?>

<section class="container">

    <div class="row event-head">
        <div class="col-12 col-md-6">
            <h2 class="event-header">
                <?php echo __(the_month_name_now()); ?>
            </h2>
        </div>
        <div class="col-12 col-md-6">
            <h1 class="event-header">
                <?php echo __('Nasze wydarzenia'); ?>
            </h1>
        </div>
    </div>

    <form id="filter" class="event-filter" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">
        <div class="event-filter__group" data-toggle="tooltip" data-placement="top"
            title="<?php echo __('Jeśli chcesz wyszukać wydarzenia na cały rok w danym mieście, zmień nazwę miesiąca na: Wszystkie'); ?>">
            <legend><?php echo __('Miasto'); ?></legend>
            <input id="filterCity" class="form-control form-control-sm" type="text" value="" name="filterCity"
                placeholder="Miasto">
        </div>
        <div class="event-filter__group">
            <legend><?php echo __('Kategoria'); ?></legend>
            <select id="filterCategory" class="form-control form-control-sm" name="filterCategory">
                <?php the_category_name('events-category'); ?>
            </select>
        </div>
        <div class="event-filter__group">
            <legend><?php echo __('Bilety'); ?></legend>
            <select id="filterTicets" class="form-control form-control-sm" name="filterTicets">
                <option value="0" selected><?php echo __('Wybierz'); ?></option>
                <option value="Tak"><?php echo __('Tak'); ?></option>
                <option value="Nie"><?php echo __('Nie'); ?></option>
            </select>
        </div>
        <div class="event-filter__group">
            <legend><?php echo __('Cały dzień'); ?></legend>
            <select id="filterAllDay" class="form-control form-control-sm" name="filterAllDay">
                <option value="0" selected><?php echo __('Wybierz'); ?></option>
                <option value="Tak"><?php echo __('Tak'); ?></option>
                <option value="Nie"><?php echo __('Nie'); ?></option>
            </select>
        </div>
        <div class="event-filter__group">
            <legend><?php echo __('Kilkudniowe'); ?></legend>
            <select id="filterManyDays" class="form-control form-control-sm" name="filterManyDays">
                <option value="0" selected><?php echo __('Wybierz'); ?></option>
                <option value="Tak"><?php echo __('Tak'); ?></option>
                <option value="Nie"><?php echo __('Nie'); ?></option>
            </select>
        </div>
        <div class="event-filter__group">
            <legend><?php echo __('Miesiąc'); ?></legend>
            <select id="filterMonth" class="form-control form-control-sm" name="filterMonth">
                <option value="all"><?php echo __('Wszystkie'); ?></option>
                <?php the_display_month_list(); ?>
            </select>
        </div>
        <div class="event-filter__group">
            <legend><?php echo __('Rok'); ?></legend>
            <select id="filterYear" class="form-control form-control-sm" name="filterYear">
                <?php the_display_only_year_list(); ?>
            </select>
        </div>
        <div class="event-filter__group">
            <legend> .</legend>
            <button class="btn btn-primary btn-block btn-sm" type="submit"><i
                    class="fas fa-search mr-2"></i><?php echo __('Wyszukaj'); ?></button>
            <input type="hidden" name="action" value="event_query_filter">
        </div>
    </form>

    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <nav id="eventsList" class="event-items">

                <?php $event = new WP_Query(event_query_start()); ?>
                <?php if ($event->have_posts()): ?>
                <?php while ($event->have_posts()): $event->the_post(); ?>

                <?php if (have_rows('kiedy')): ?>
                <?php while (have_rows('kiedy')): the_row(); ?>
                <?php $start = get_sub_field('data'); ?>
                <?php endwhile; ?>
                <?php endif; ?>

                <?php if (strtotime($start) >= strtotime(date('d-m-Y'))): ?>
                <a class="event-item event-item__p0 <?php status_event(get_field('opcje')); ?>" data-event="active"
                    href="<?php esc_url(the_permalink()); ?>">
                    <span class="event-color"
                        style="background-color: <?php the_field('kolor_kategorii', term_category_prefix()); ?>;"></span>
                    <article class="row event-active">
                        <span class="col-12 col-md-5 col-lg-3">
                            <?php $plakat = get_field('plakat'); ?>
                            <?php if ($plakat): ?>
                            <span class="event-date event-date__ab">
                                <span><?php the_convert_month($start); ?></span>
                                <span><?php the_display_only_day($start); ?></span>
                                <span><?php the_display_only_year($start); ?></span>
                            </span>
                            <img class="img-fluid" src="<?php echo $plakat['sizes']['cover']; ?>"
                                alt="<?php echo $plakat['alt']; ?>" />
                            <?php endif; ?>
                        </span>
                        <span class="col-12 col-md-7 col-lg-9">
                            <h1><?php the_title(); ?></h1>
                            <?php if (get_field('opcje') == 2): ?>
                            <span>
                                <i class="fas fa-exclamation-circle"></i>
                                <?php echo __('Wydarzenie odbędzie się w innym terminie'); ?>
                            </span>
                            <?php elseif (get_field('opcje') == 1): ?>
                            <span>
                                <i class="fas fa-exclamation-circle"></i>
                                <?php echo __('Wydarzenie odwołane'); ?>
                            </span>
                            <?php else: ?>
                            <?php if (have_rows('czas')): ?>
                            <?php while (have_rows('czas')): the_row(); ?>
                            <span>
                                <i class="fas fa-clock"></i> <?php the_sub_field('rozpoczecie'); ?>
                                - <?php the_sub_field('zakonczenie'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php if (have_rows('gdzie')): ?>
                            <?php while (have_rows('gdzie')): the_row(); ?>
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                <?php the_sub_field('miasto'); ?> - <?php the_sub_field('obiekt'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </span>
                    </article>
                </a>
                <?php else: ?>
                <a class="event-item event-item__p0 <?php status_event(get_field('opcje')); ?>"
                    href="<?php esc_url(the_permalink()); ?>">
                    <span class="event-color"
                        style="background-color: <?php the_field('kolor_kategorii', term_category_prefix()); ?>;"></span>
                    <article class="row event-concluded">
                        <span class="col-12 col-md-5 col-lg-3">
                            <?php $plakat = get_field('plakat'); ?>
                            <?php if ($plakat) { ?>
                            <span class="event-date event-date__ab">
                                <span><?php the_convert_month($start); ?></span>
                                <span><?php the_display_only_day($start); ?></span>
                                <span><?php the_display_only_year($start); ?></span>
                            </span>
                            <img class="img-fluid"
                                src="<?php echo get_template_directory_uri(); ?>/images/bg320x240.jpg"
                                data-src="<?php echo $plakat['sizes']['cover']; ?>"
                                alt="<?php echo $plakat['alt']; ?>" />
                            <?php } ?>
                        </span>
                        <span class="col-12 col-md-7 col-lg-9">
                            <h1><?php the_title(); ?></h1>
                            <?php if (get_field('opcje') == 2): ?>
                            <span>
                                <i class="fas fa-exclamation-circle"></i>
                                <?php echo __('Wydarzenie odbędzie się w innym terminie'); ?>
                            </span>
                            <?php elseif (get_field('opcje') == 1): ?>
                            <span>
                                <i class="fas fa-exclamation-circle"></i>
                                <?php echo __('Wydarzenie odwołane'); ?>
                            </span>
                            <?php else: ?>
                            <span>
                                <i class="fas fa-exclamation-circle"></i>
                                <?php echo __('Wydarzenie już się odbyło.'); ?>
                            </span>
                            <?php endif; ?>
                        </span>
                    </article>
                </a>

                <?php endif; ?>
                <?php endwhile; ?>
                <?php else: ?>
                <h2 class="event-item-alert"><?php echo __('Nie zaplanowano jeszcze wydarzeń'); ?></h2>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</section>

<?php wpFn::get_template_parts(array('footer')); ?>