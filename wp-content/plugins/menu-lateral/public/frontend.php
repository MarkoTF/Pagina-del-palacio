<?php

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
	  <div class="secciones-menu">
	    <div class="seccion-menu-encabezado">
	      <h1>Seccion 1</h1>
	    </div>
	    <div class="seccion-menu-lista">
	      <p>item1</p>
	      <p>item2</p>
	      <p>item3</p>
	    </div>
	  </div>

	  <div class="secciones-menu">
	    <div class="seccion-menu-encabezado">
	      <h1>Seccion 1</h1>
	    </div>
	    <div class="seccion-menu-lista">
	      <p>item1</p>
	      <p>item2</p>
	      <p>item3</p>
	    </div>
	  </div>
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

class Menu_lateral_frontend {
  // previous defined admin constants
  // wpda_vertical_menu_plugin_url
  // wpda_vertical_menu_plugin_path
  function __construct(){	
    $this->call_filters();
  }
  
       /*#################### Call filters function ########################*/		
  
  private function call_filters(){			
    add_filter('wp_head',array($this,'include_scripts'),0);			
  }
  
       /*#################### Include scripts function ########################*/
  
  public function include_scripts(){
    /* wp_enqueue_script('jquery'); */
    /* wp_enqueue_script('wpdevart_vertical_menu_js',wpda_vertical_menu_plugin_url.'includes/frontend/js/front_end.js'); */
    /* wp_enqueue_style('FontAwesome_5'); */		
    wp_enqueue_style('frontend_menu_lateral',menu_lateral_plugin_url.'public/css/frontend.css');
    wp_enqueue_script('forntend_menu_lateral_js',menu_lateral_plugin_url.'public/js/frontend.js');
  }	
}

?>
