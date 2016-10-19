<?php

class Simple_Accordion_Menu_Widget extends WP_Widget {

	/** @var array - настройки по умолчанию */
	protected $defaults = [ 'menu' => -1 ];

	public function __construct() {
		parent::__construct(
			'Simple_Accordion_Menu_Widget', __( 'Accordion Меню' ),
			[ 'description' => __( 'Отображает меню в виде Accordion' ) ]
		);
	}

	public function update( $new_instance, $old_instance ) {

		if (
			! isset( $new_instance['menu'] ) ||
			! is_numeric( $new_instance['menu'] ) ||
			! $this->findMenuByTermId( $new_instance['menu'] )
		) {
			$new_instance['menu'] = $this->defaults['menu'];
		}

		return $new_instance;
	}

	public function widget( $args, $instance ) {
		$this->view( 'widget', $instance );
	}

	public function form( $instance ) {
		$this->view( 'form', $instance );
	}

	/**
	 * @param $name - Имя файла представления без расширения
	 * @param array $instance
	 */
	protected function view( $name, $instance = [] ) {

		if ( $file = MENU_VIEWS_DIR . DIRECTORY_SEPARATOR . $name . '.php' and file_exists( $file ) ) {
			$menus    = wp_get_nav_menus();
			$instance = wp_parse_args( $instance, $this->defaults );
			extract( compact( 'menus' ) + $instance );
			include $file;
			return;
		}

		echo "Can't find view [{$name}] in " . MENU_VIEWS_DIR;
	}

	protected function findMenuByTermId( $id ) {

		foreach ( wp_get_nav_menus() as $menu ) {
			if ( $menu->term_id == $id ) {
				return true;
			}
		}

		return false;
	}

}