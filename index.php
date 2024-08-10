<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/translations.php';

// Obtener la ruta base desde el formulario o usar la ruta actual por defecto
$base_dir = isset($_POST['base_dir']) ? realpath($_POST['base_dir']) : __DIR__;

// Obtener el directorio actual desde la URL
$current_dir = isset($_GET['dir']) ? realpath($_GET['dir']) : $base_dir;
$parent_dir = dirname($current_dir);

// Verificar si estamos en el directorio raíz
$is_root = $current_dir === realpath($base_dir);

// Obtener la vista seleccionada (lista o cards)
$view_mode = isset($_GET['view']) ? $_GET['view'] : 'list';

// Obtener la lista de archivos en el directorio actual
$files = get_files_in_directory($current_dir);

// Filtrar archivos inaccesibles
$files = array_filter($files, function ($file) use ($current_dir) {
  $file_path = $current_dir . DIRECTORY_SEPARATOR . $file;
  return is_readable($file_path);
});

// Ordenar archivos por fecha de modificación
usort($files, function ($a, $b) use ($current_dir) {
  $file_a = $current_dir . DIRECTORY_SEPARATOR . $a;
  $file_b = $current_dir . DIRECTORY_SEPARATOR . $b;

  if (!@filemtime($file_a) || !@filemtime($file_b)) {
    return 0;
  }

  return filemtime($file_b) - filemtime($file_a);
});

require_once 'templates/header.php';
require_once 'templates/nav_bar.php';

if (!empty($files)) {
  if ($view_mode == 'list') {
    require 'templates/list_view.php';
  } elseif ($view_mode == 'cards') {
    require 'templates/card_view.php';
  }
} else {
  echo '<p class="text-muted">' . $translations[$lang]['no_files'] . '</p>';
}

require_once 'templates/footer.php';
