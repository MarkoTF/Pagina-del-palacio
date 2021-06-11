<?php
/**
 * Plugin Name: Menu lateral mejorado
 * Plugin URI: https://marko.com.mx
 * Description: Menu lateral especializado para la pagina del palacio
 * Author: MarkoTF
 * Version: 1.0
 * */


/* if (is_admin()) { */
/*   require_once __DIR__ . '/admin/admin.php'; */
/* } else { */
/*   require_once __DIR__ . '/public/frontend.php'; */
/* } */

/* class Menu_Lateral extends WP_Widget { */
/*   public function __construct() { */
/*     parent::__construct( */
/*       'id_widget', */
/*       __('Mi primer super widget', 'demo_domain'), */
/*       array( */
/* 	'description' => __('Esta es una descripcion', 'demo_domain'), */
/* 	'classname' => 'clase_css_widget' */
/*       ) */
/*     ); */
/*   } */

/*   public function widget($args, $instance) { */

/*   } */

/*   public function update($new_instance, $old_instance) { */

/*   } */
/* } */

/* function MENLAT_register_widgets() { */
/*   register_widget('Menu_Lateral'); */
/* } */

/* add_action('widgets_init', 'MENLAT_register_widgets'); */


class Init_menu_latera {

  function __construct(){
    $this->define_constants();
    // include files 
    $this->include_files();
    // call filters for plugin
    //$this->call_base_filters();
    // crate admin panel	
    //$this->databese = new wpda_vertical_menu_databese();
    // crate admin
    //$this->create_admin();
    // crate front end
    $this->front_end();		
  }

  function include_files() {
    require_once(menu_lateral_plugin_path.'public/frontend.php'); 
  }

  function front_end() {
    //Aqui se logra que aparesca en el menu de widgets
    add_action( 'widgets_init', function() {
	register_widget( 'My_Widget' );
    });

    $menu_lateral_frontend = new Menu_lateral_frontend();
    $my_widget = new My_Widget();
  }

  function define_constants() {
    define('menu_lateral_plugin_url',trailingslashit( plugins_url('', __FILE__ ) ));
    define('menu_lateral_plugin_path',trailingslashit( plugin_dir_path( __FILE__ ) ));
    //define('wpda_vertical_menu_support_url',"https://wordpress.org/support/plugin/wpdevart-vertical-menu/");
  }

}

$init_menu_lateral = new Init_menu_latera();

?>

