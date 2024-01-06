<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="custom">

<head>
  <meta charset="<? bloginfo('charset') ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <? wp_head() ?>
</head>

<body class="[ fs-300 bg-clr-primary-900 clr-neutral-200 ]">
  <? if (function_exists('wp_body_open')) {
    wp_body_open();
  } else {
  } ?>
  <?
  // get_template_part('template-parts/header/scroll');

  // get_template_part('template-parts/header/modal');

  get_template_part('template-parts/header/nav');
  ?>

  <!-- <p class="welcome__heading [ padding-block-30 padding-inline-30 fs-600 ]"><?
                                                                                  if ($post) {
                                                                                    echo $meta_values = get_post_meta($post->ID, 'custom_title', true);
                                                                                  } else {
                                                                                    echo 'Welcome';
                                                                                  }
                                                                                  ?></p> -->