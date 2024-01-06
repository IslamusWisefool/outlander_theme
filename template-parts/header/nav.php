<?php

/**
 * Header navigation template
 *
 * @package outlander
 */

$menu_class = \OUTLANDER_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('outlander-header-menu');

$header_menus = wp_get_nav_menu_items($header_menu_id)
?>

<nav class="nav [ cluster ] [ bg-clr-primary-100 padding-block-15 padding-inline-15 gradient ]">
  <?
  if (has_custom_logo()) {

    echo get_custom_logo();
  }
  ?>
  <?
  if (!empty($header_menus) && is_array($header_menus)) {
  ?><ul data-state="false" class="[ cluster margin-left-auto  ] [ fs-300 ]">
      <?
      foreach ($header_menus as $menu_item) {
        if (!$menu_item->menu_item_parent) {

          $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
          $has_children = !empty($child_menu_items) && is_array($child_menu_items);

          if (!$has_children) {
      ?>
            <li class="underline">
              <a class="[ fs-300 ]" href="<? echo esc_url($menu_item->url); ?>">
                <? echo esc_html($menu_item->title); ?>
              </a>
            </li>
          <?
          } else {
          ?>
            <li class="nav__menu-item dropdown">
              <a class="nav__menu-item-link" href="<? echo esc_url($menu_item->url); ?>">
                <? echo esc_html($menu_item->title); ?>
              </a>
              <div class="drop_menu">
                <?
                foreach ($child_menu_items as $child_menu_item) {
                ?>
                  <a class="nav__menu-item-link" href="<? echo esc_url($child_menu_item->url); ?>">
                    <? echo esc_html($child_menu_item->title); ?>
                  </a>
                <?
                };
                ?>
              </div>
            </li>
      <?
          };
        }
      };
      get_search_form() ?>
    </ul>
  <?
  }
  ?>
  <!-- <button id="toggle-theme" class="btn nav__theme">Change theme</button>
  <div data-state="false" class="nav__burger">
    <span class="nav__burger-line"></span>
  </div> -->
</nav>