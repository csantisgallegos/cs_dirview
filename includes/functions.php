<?php

function get_files_in_directory($directory)
{
    return array_diff(scandir($directory), ['.', '..', '.DS_Store', 'index.php', '.git', '.gitmodules', '.gitignore', 'node_modules']);
}

function ext($file)
{
    return is_dir($file) ? 'dir' : str_replace('7z', 'sevenz', strtolower(pathinfo($file, PATHINFO_EXTENSION)));
}

function title()
{
    $url = trim($_SERVER['REQUEST_URI'], '/');
    return empty($url) ? 'home' : $url;
}

function human_filesize($file)
{
    $bytes = filesize($file);
    $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.1f", $bytes / pow(1024, $factor)) . $sizes[$factor];
}

function is_laravel_project($directory)
{
    return file_exists($directory . '/artisan');
}

function get_laravel_version($directory)
{
    $composer_file = $directory . '/composer.lock';
    if (!file_exists($composer_file)) {
        return null;
    }

    $composer_data = json_decode(file_get_contents($composer_file), true);
    if (!isset($composer_data['packages'])) {
        return null;
    }

    foreach ($composer_data['packages'] as $package) {
        if ($package['name'] === 'laravel/framework') {
            return $package['version'];
        }
    }

    return null;
}

function get_app_url($directory)
{
    $env_file = $directory . '/.env';
    if (!file_exists($env_file)) {
        return null;
    }

    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $env_data = [];

    foreach ($lines as $line) {
        // Ignorar comentarios
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Solo procesar líneas que contienen una asignación de variable
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);

            // Elimina espacios en blanco y comillas
            $key = trim($key);
            $value = trim($value, " \t\n\r\0\x0B\"");

            $env_data[$key] = $value;
        }
    }

    return isset($env_data['APP_URL']) ? $env_data['APP_URL'] : null;
}
