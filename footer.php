<footer class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php wp_nav_menu(array(
    'menu' => 'footer',
    'theme_location' => 'footer',
    'depth' => 2,
    'container' => false)
); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>Copyright © 1995 - <?php echo data_now(); ?> Wszelkie prawa zastrzeżone AGENCJA BRUSSA | Realizacja:
                <a href="https:iseeyou-studio.pl" target="_blank">iseeyou. studio</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="modalSearchTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-inline" id="searchform" role="search" method="get"
                    action="<?php echo home_url('/'); ?>">
                    <input class="form-control" id="s" name="s" type="text" placeholder="<?php echo __('Search'); ?>">
                    <button class="btn btn-outline-success btn-lg" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="infoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoTitle"><?php echo __('Informacja odnośnie strony'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo __('Przesyłając tą informacje nie podajesz w żanden sposób swoich danych osobowych oraz w żaden sposób ich nie przetwarzamy.'); ?>
                </p>

                <span>

                    <form id="form-info" class="form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">

                        <textarea class="form-control" name="message" rows="8"
                            placeholder="<?php echo __('Treść wiadomość'); ?>"></textarea>

                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-paper-plane mr-2"></i><?php echo __('Wyślij'); ?></button>
                        <input type="hidden" name="action" value="sendmail_info">
                    </form>

                </span>
            </div>
        </div>
    </div>
</div>

<ul class="box-social">
    <?php myacf::social_media(); ?>
</ul>

</body>

</html>