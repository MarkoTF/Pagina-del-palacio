<?php
function panla_titulo_widgets($title) {
  return $title . ' Filtrado';
}

add_filter('widget_title', 'panla_titulo_widgets');
