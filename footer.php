  <footer class="footer [ cluster ] [ bg-clr-primary-700 padding-block-15 padding-inline-15 ]">
    <div class="footer__links [ margin-left-auto ]">
      <? wp_nav_menu([
        'theme_location'  => 'outlander-footer-menu',
        'menu'            => '',
        'container'       => false, // Можно поставить контейнер, по дефолту нет
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'navigation navigation-footer',
        'before'          => '', // Перед ссылкой <a> каждого элемента
        'after'           => '', // После ссылки </a> каждого элемента
        'link_before'     => '', // Текст перед анкором ссылки
        'link_after'      => '', // Текст после анкора ссылки
        'items_wrap'      => '<ul id="" class="footer__links-list cluster">%3$s</ul>', // Указать ID и Класс для списка
        'depth'           => 2, // Глубина вложения
        'walker'          => '', // Можно создать свой кастомный список 
      ]); ?>
    </div>
    <div class="footer__social ">
      <? get_template_part('template-parts/content', 'svg') ?>
      <ul class="[ cluster ]">
        <li><a class="footer__social-link" href="#">
            <svg width="48" class="footer__social-icon">
              <use href="#icon-facebook"></use>
            </svg>
          </a>
        </li>
        <li><a class="footer__social-link" href="#">
            <svg width="48" class="footer__social-icon">
              <use href="#icon-youtube"></use>
            </svg>
          </a></li>
        <li><a class="footer__social-link" href="#">
            <svg width="48" class="footer__social-icon">
              <use href="#icon-xmark"></use>
            </svg>
          </a></li>
      </ul>
    </div>
  </footer>
  </body>
  <? wp_footer() ?>

  </html>