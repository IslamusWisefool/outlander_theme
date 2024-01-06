<? wp_nav_menu([
	'theme_location'  => 'outlander-header-menu',
	'menu'            => '',
	'container'       => false, // Можно поставить контейнер, по дефолту нет
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'navigation navigation-header',
	'before'          => '', // Перед ссылкой <a> каждого элемента
	'after'           => '', // После ссылки </a> каждого элемента
	'link_before'     => '', // Текст перед анкором ссылки
	'link_after'      => '', // Текст после анкора ссылки
	'items_wrap'      => '<ul data-state="false" id="" class="nav__menu">%3$s</ul>', // Указать ID и Класс для списка
	'depth'           => 2, // Глубина вложения
	'walker'          => '', // Можно создать свой кастомный список 
]); ?>




<h3 class="content-title"><? the_title(); ?></h3>
<!-- the_excerpt(); -->
<div class="content_body"> <? the_content(); ?> </div>