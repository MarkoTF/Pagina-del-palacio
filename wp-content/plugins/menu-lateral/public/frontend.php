<?php
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
  }	
}
?>
