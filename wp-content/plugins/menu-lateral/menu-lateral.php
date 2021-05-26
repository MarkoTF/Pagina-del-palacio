<?php
/**
 * Plugin Name: Menu lateral mejorado
 * Plugin URI: https://marko.com.mx
 * Description: Menu lateral especializado para la pagina del palacio
 * Author: MarkoTF
 * Version: 1.0
 * */


if (is_admin()) {
  require_once __DIR__ . '/admin/admin.php';
} else {
  require_once __DIR__ . '/public/frontend.php';
}


?>

