<?php

if ( ( $_menu = wp_get_nav_menu_items( $menu ) ) === false ) {
	echo "Can't find menu [{$menu}]";
	return;
}

$get_items = function ( $parent = 0 ) use ( $_menu ) {
	return array_filter( $_menu, function ( $item ) use ( $parent ) {
		return $item->menu_item_parent == $parent;
	} );
};

$build_menu = function ( $items ) use ( &$build_menu, $get_items ) {
	ob_start();

	?><ul class="accordion">
	<?php foreach ( $items as $item ): ?>
		<li>
			<a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
			<!-- Рекурсия для дочерних элеметов -->
			<?php if ( $items = $get_items( $item->ID ) and count( $items ) ): ?>
				<span class="arrow down"></span>
				<?php echo $build_menu( $items ); ?>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
	</ul><?php

	return ob_get_clean();
};

// Вывод основных и дочерних элементов
echo $build_menu( $get_items() );
