<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(_nx('One review on &ldquo;%2$s&rdquo;', '%1$s review on &ldquo;%2$s&rdquo;', get_comments_number(), 'reviews title', 'twentyfifteen'), number_format_i18n(get_comments_number()), get_the_title());
            ?>
        </h2>

        <?php twentyfifteen_comment_nav(); ?>

        <!--<ol class="comment-list">-->
        <?php
        /* wp_list_comments( array(
          'style'       => 'ol',
          'short_ping'  => true,
          'avatar_size' => 56,
          ) ); */
        ?>
        <!---->		</ol><!-- .comment-list -->
    <div id="comments-container">
        <?php
        wp_list_comments(array(
            'walker' => new custom_walker_comment,
            'style' => 'ul',
            'avatar_size' => 40
        ));
        ?>
    </div>
    <div style="clear: both"></div> <br>
<?php endif; // have_comments() ?>

<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
    <p class="no-comments"><?php _e('review are closed.', 'twentyfifteen'); ?></p>
<?php endif; ?>
<?php
comment_form($comment_args);
?>
<?php //comment_form(); ?>
<?php //comment_form(array('comment_notes_after' => '')); ?>
</div><!-- .comments-area -->
