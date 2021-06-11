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

class My_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'palacio-menu',  // Base ID
            'Menu lateral'   // Name
        );
 
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="textwidget menu-lateral">';
 
        echo esc_html__( $instance['text'], 'text_domain' );

	?>
	  <h1>Hola que tal</h1>
	<?php
	
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
 
}
//$my_widget = new My_Widget();

?>

