<?php

$translations = [
    'es' => [
        'title' => 'Directorio de Archivos',
        'no_files' => 'Esta carpeta no contiene archivos.',
        'size' => 'Tamaño',
        'theme_light' => 'Tema Claro',
        'theme_dark' => 'Tema Oscuro',
        'language' => 'Idioma',
        'view_readme' => 'Ver README.md',
        'go_to_site' => 'Ir al sitio',
        'github' => 'Visita mi GitHub',
        'select_view' => 'Seleccionar vista',
        'list_view' => 'Vista de Lista',
        'card_view' => 'Vista de Tarjetas',
        'laravel_project' => 'Proyecto Laravel',
        'version' => 'Versión',
        'up_one_level' => 'Subir un nivel',
        'set_base_path' => 'Establecer Ruta Base',
    ],
    'en' => [
        'title' => 'File Directory',
        'no_files' => 'This folder contains no files.',
        'size' => 'Size',
        'theme_light' => 'Light Theme',
        'theme_dark' => 'Dark Theme',
        'language' => 'Language',
        'view_readme' => 'View README.md',
        'go_to_site' => 'Go to Site',
        'github' => 'Visit my GitHub',
        'select_view' => 'Select View',
        'list_view' => 'List View',
        'card_view' => 'Card View',
        'laravel_project' => 'Laravel Project',
        'version' => 'Version',
        'up_one_level' => 'Up One Level',
        'set_base_path' => 'Set Base Path',
    ]
];


// Default language (Spanish)
$lang = isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en']) ? $_GET['lang'] : 'es';
