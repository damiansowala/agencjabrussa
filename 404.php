<?php wpFn::get_template_parts(array('header')); ?>
<div class="page-not">
    <div>
        <h1> <?php echo __('404'); ?></h1>
        <h4><?php echo __('Strony nie odnaleziono'); ?></h4>
        <a class="btn btn-primary" href="<?php echo get_site_url(); ?>"><?php echo __('Strona główna'); ?></a>
    </div>
</div>
<?php wpFn::get_template_parts(array('footer')); ?>