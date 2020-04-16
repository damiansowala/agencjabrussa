<div id="comments">
    <?php if ( post_password_required() ) : ?>
    <p>
        This post is password protected. Enter the password to view any comments
    </p>
</div>
<?php
			return;
		endif;
	?>
<?php if ( have_comments() ) : ?>
<h2>
    <?php comments_number(); ?>
</h2>
<ul class="media-list">
    <?php wp_list_comments( array( 'callback' => 'bootstrap_comment' ) ); ?>
</ul>
<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
<p>
    <?php echo __('Comments are closed')?>
</p>
<?php endif; ?>
<?php
	ob_start();
	$commenter = wp_get_current_commenter();
	$req = true;
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$comments_arg = array(
		'form'	=> array(
			'class' => 'form-horizontal'
			),
		'fields' => apply_filters( 'comment_form_default_fields', array(
				'autor' 				=> '<div class="form-group">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
										'<input id="author" name="author" class="form-control" type="text" value="" size="30"' . $aria_req . ' />'.
										'<p id="d1" class="text-danger"></p>' . '</div>',
				'email'					=> '<div class="form-group">' .'<label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
										'<input id="email" name="email" class="form-control" type="text" value="" size="30"' . $aria_req . ' />'.
										'<p id="d2" class="text-danger"></p>' . '</div>',
				'url'					=> '')),
				'comment_field'			=> '<div class="form-group">' . '<label for="comment">' . __( 'Comment' ) . '</label><span>*</span>' .
										'<textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea><p id="d3" class="text-danger"></p>' . '</div>',
				'comment_notes_after' 	=> '',
				'class_submit'			=> 'btn btn-default'
			); ?>
<?php comment_form($comments_arg);
	echo str_replace('class="comment-form"','class="comment-form" name="commentForm" onsubmit="return validateForm();"',ob_get_clean());
	?>
<script>
function validateForm() {
    var form = document.forms["commentForm"];
    x = form["author"].value,
        y = form["email"].value,
        z = form["comment"].value,
        flag = true,
        d1 = document.getElementById("d1"),
        d2 = document.getElementById("d2"),
        d3 = document.getElementById("d3");
    if (x == null || x == "") {
        d1.innerHTML = "<?php echo __('Name is required'); ?>";
        z = false;
    } else {
        d1.innerHTML = "";
    }
    if (y == null || y == "") {
        d2.innerHTML = "<?php echo __('Email is required'); ?>";
        z = false;
    } else {
        d2.innerHTML = "";
    }
    if (z == null || z == "") {
        d3.innerHTML = "<?php echo __('Comment is required'); ?>";
        z = false;
    } else {
        d3.innerHTML = "";
    }
    if (z == false) {
        return false;
    }
}
</script>
</div>