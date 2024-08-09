<?php

// Function to get the file extension or directory type
function ext($file)
{
  return is_dir($file) ? 'dir' : str_replace('7z', 'sevenz', strtolower(pathinfo($file, PATHINFO_EXTENSION)));
}

// Function to get the title from the URL
function title()
{
  $url = trim($_SERVER['REQUEST_URI'], '/');
  return empty($url) ? 'home' : $url;
}

// Function to get human-readable file size
function human_filesize($file)
{
  $bytes = filesize($file);
  $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.1f", $bytes / pow(1024, $factor)) . $sizes[$factor];
}

// Get the list of files in the current directory
$dir = __DIR__;
$files = array_diff(scandir($dir), ['.', '..', '.DS_Store', 'index.php', '.git', '.gitmodules', '.gitignore', 'node_modules']);

// Sort files by modification date, newest first
usort($files, function ($a, $b) use ($dir) {
  return filemtime($dir . DIRECTORY_SEPARATOR . $b) - filemtime($dir . DIRECTORY_SEPARATOR . $a);
});

// Function to check if README.md exists in a given directory
function check_readme($directory)
{
  return file_exists($directory . DIRECTORY_SEPARATOR . 'README.md');
}

// Translation strings
$translations = [
  'es' => [
    'title' => 'Directorio de Archivos',
    'no_files' => 'Esta carpeta no contiene archivos.',
    'size' => 'Tamaño',
    'theme_light' => 'Tema Claro',
    'theme_dark' => 'Tema Oscuro',
    'language' => 'Idioma',
    'view_readme' => 'Ver README.md',
    'github' => 'Visita mi GitHub'
  ],
  'en' => [
    'title' => 'File Directory',
    'no_files' => 'This folder contains no files.',
    'size' => 'Size',
    'theme_light' => 'Light Theme',
    'theme_dark' => 'Dark Theme',
    'language' => 'Language',
    'view_readme' => 'View README.md',
    'github' => 'Visit my GitHub'
  ]
];

// Default language (Spanish)
$lang = isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en']) ? $_GET['lang'] : 'es';

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($translations[$lang]['title']); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      background-image: url('https://www.transparenttextures.com/patterns/diamond-upholstery.png');
      background-attachment: fixed;
    }

    .card {
      border-radius: 0.5rem;
    }

    .list-group-item:hover {
      background-color: var(--bs-light);
    }

    .list-group-item i {
      margin-right: 15px;
      font-size: 1.2em;
    }

    .badge {
      font-size: 0.85em;
    }

    .theme-dark {
      background-color: #343a40;
      color: #ffffff;
    }

    .theme-dark .card {
      background-color: #495057;
    }

    .theme-dark .list-group-item {
      background-color: #495057;
      color: #ffffff;
    }

    .theme-dark .list-group-item:hover {
      background-color: #6c757d;
    }

    .theme-dark a {
      color: #ffffff;
    }

    .theme-toggle {
      cursor: pointer;
      font-size: 1.5em;
    }

    .footer {
      margin-top: 30px;
      text-align: center;
    }

    .footer a {
      color: var(--bs-primary);
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body class="bg-light theme-light">
  <div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
      <div>
        <span id="themeToggle" class="theme-toggle" title="<?php echo $translations[$lang]['theme_dark']; ?>">
          <i class="bi bi-moon-fill"></i>
        </span>
      </div>
      <div class="language-selector">
        <form method="GET">
          <select name="lang" onchange="this.form.submit()" class="form-select form-select-sm">
            <option value="es" <?php echo $lang == 'es' ? 'selected' : ''; ?>>Español</option>
            <option value="en" <?php echo $lang == 'en' ? 'selected' : ''; ?>>English</option>
          </select>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center mb-4">
          <?php echo htmlspecialchars($translations[$lang]['title']); ?>
        </h1>
        <?php if (!empty($files)) : ?>
          <ul class="list-group list-group-flush">
            <?php foreach ($files as $file) : ?>
              <li class="list-group-item d-flex align-items-center">
                <i class="bi <?php echo is_dir($file) ? 'bi-folder-fill' : 'bi-file-earmark-fill'; ?>"></i>
                <a href="http://<?php echo htmlspecialchars(basename($file, '.' . ext($file))); ?>.test" target="_blank" class="flex-grow-1 text-decoration-none">
                  <?php echo htmlspecialchars($file); ?>
                </a>
                <?php if (is_dir($file) && check_readme($dir . DIRECTORY_SEPARATOR . $file)) : ?>
                  <a href="<?php echo htmlspecialchars($file . '/README.md'); ?>" target="_blank" class="badge bg-info text-decoration-none ms-2"><?php echo $translations[$lang]['view_readme']; ?></a>
                <?php endif; ?>
                <?php if (!is_dir($file)) : ?>
                  <span class="badge bg-secondary rounded-pill ms-auto"><?php echo human_filesize($file); ?></span>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else : ?>
          <p class="text-muted"><?php echo $translations[$lang]['no_files']; ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="footer mt-4">
      <p>
        <?php echo $translations[$lang]['github']; ?>:
        <a href="https://github.com/csantisgallegos" target="_blank">https://github.com/csantisgallegos</a>
      </p>
    </div>
  </div>

  <script>
    const themeToggle = document.getElementById('themeToggle');
    const body = document.body;

    // Set theme based on saved preference or default to light theme
    let theme = localStorage.getItem('theme') || 'theme-light';
    body.classList.add(theme);

    themeToggle.addEventListener('click', function() {
      if (body.classList.contains('theme-light')) {
        body.classList.remove('theme-light');
        body.classList.add('theme-dark');
        themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
        themeToggle.title = "<?php echo $translations[$lang]['theme_light']; ?>";
        localStorage.setItem('theme', 'theme-dark');
      } else {
        body.classList.remove('theme-dark');
        body.classList.add('theme-light');
        themeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
        themeToggle.title = "<?php echo $translations[$lang]['theme_dark']; ?>";
        localStorage.setItem('theme', 'theme-light');
      }
    });

    // Set correct icon on load
    if (body.classList.contains('theme-dark')) {
      themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
      themeToggle.title = "<?php echo $translations[$lang]['theme_light']; ?>";
    } else {
      themeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
      themeToggle.title = "<?php echo $translations[$lang]['theme_dark']; ?>";
    }
  </script>
</body>

</html>