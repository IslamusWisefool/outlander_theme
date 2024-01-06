<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Outlander
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

$comments_args = [
    // изменим название кнопки
    'label_submit' => __('Post Comment', 'outlander'),
    // заголовок секции ответа
    'title_reply' => __('Write a Reply or Comment', 'outlander'),
    // Код перед заголовком формы
    'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title nomargin-inline fs-500">',
    // Код после заголовка формы 
    'title_reply_after' => '</h3>',
    // Заголовок формы комментария
    'title_reply_to' => __('Leave a Reply to %s', 'outlander'),
    // Класс кнопки сабмит
    'class_submit' => 'btn btn-primary',
    // Обертка кнопки сабмита
    'submit_field' => '<p class="form-submit margin-block-15">%1$s %2$s</p>',
    // удалим текст, который будет показано после того как коммент отправлен
    'comment_notes_after' => '',
    // Текст перед формой отправки 
    'logged_in_as' => '',
    // переопределим textarea (тело формы)
    'comment_field' => '
			<p class="comment-form-comment flex-column">
				<label for="comment">' . _x('Comment', 'noun') . ($req ? ' <span class="required">*</span>' : '') . '</label>
                <textarea class="comment-textarea" id="comment" name="comment" aria-required="true"></textarea>
			</p>',
];
?>

<div id="comments" class="comments-area">
    <?php comment_form($comments_args); ?>

    <?php if (have_comments()) : ?>
        <h2 class="comments-title nomargin-inline fs-500">
            <?php
            printf(
                _nx(
                    'One thought on "%2$s"',
                    '%1$s thoughts on "%2$s"',
                    get_comments_number(),
                    'comments title',
                    'outlander'
                ),
                number_format_i18n(get_comments_number()),
                '<span class="fs-500">' . get_the_title() . '</span>'
            );
            ?>
        </h2>
        <span><? echo get_comments_number(); ?></span>
        <span><? echo get_comment_pages_count(); ?></span>

        <ul class="comment-list">
            <?php wp_list_comments('type=comment&callback=outlander_comment'); ?>
        </ul><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">

                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'outlander'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'outlander')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'outlander')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation 
        ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'outlander'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() 
    ?>



</div><!-- #comments -->

<?php
function outlander_comment($comment, $args, $depth = 1)
{
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

    $classes = ' ' . comment_class(empty($args['has_children']) ? '' : 'parent', null, null, false);
?>

    <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) { ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php } ?>
            <div class="author-thumbnail">
                <?
                if ($args['avatar_size'] != 0) {
                    echo get_avatar($comment, $args['avatar_size']);
                }
                ?>
            </div>
            <div class="comment-main">
                <div class="comment-author vcard comment-header">
                    <?php
                    printf(
                        __('<span class="fn"><a href="%2$s">%1$s</a></span>'),
                        get_comment_author(),
                        get_author_posts_url(get_comment()->user_id)
                    );
                    ?>
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                            <?php
                            printf(
                                __('%1$s at %2$s'),
                                get_comment_date(),
                                get_comment_time()
                            ); ?>
                        </a>

                        <?php edit_comment_link(__('(Edit)'), '  ', ''); ?>
                    </div>
                </div>
                <div class="comment-text">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php
                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'add_below' => $add_below,
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth']
                            )
                        )
                    ); ?>
                </div>
            </div>

            <?php if ($comment->comment_approved == '0') { ?>
                <em class="comment-awaiting-moderation">
                    <?php _e('Your comment is awaiting moderation.'); ?>
                </em><br />
            <?php } ?>

            <?php if ('div' != $args['style']) { ?>
            </div>
    <?php }
        }
