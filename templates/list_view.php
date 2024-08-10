<div class="card">
    <div class="card-body">
        <h1 class="card-title text-center mb-4">
            <?php echo htmlspecialchars($translations[$lang]['title']); ?>
        </h1>
        <ul class="list-group list-group-flush">
            <?php
            $files = $files ?? [];
            foreach ($files as $file) : ?>
                <?php
                $file_path = $current_dir . DIRECTORY_SEPARATOR . $file;
                $is_laravel = is_laravel_project($file_path);
                $laravel_version = $is_laravel ? get_laravel_version($file_path) : null;
                $app_url = $is_laravel ? get_app_url($file_path) : null;
                ?>
                <li class="list-group-item d-flex align-items-center">
                    <i class="bi <?php echo is_dir($file_path) ? 'bi-folder-fill' : 'bi-file-earmark-fill'; ?>"></i>
                    <?php if (is_dir($file_path)): ?>
                        <a href="?dir=<?php echo urlencode($file_path); ?>&view=<?php echo $view_mode; ?>" class="flex-grow-1 text-decoration-none">
                            <?php echo htmlspecialchars($file); ?>
                        </a>
                        <?php if ($is_laravel): ?>
                            <span class="badge bg-success ms-2">Laravel <?php echo $laravel_version; ?></span>
                            <?php if ($app_url): ?>
                                <a href="<?php echo $app_url; ?>" target="_blank" class="badge bg-info text-decoration-none ms-2">
                                    Ir al sitio
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="flex-grow-1"><?php echo htmlspecialchars($file); ?></span>
                    <?php endif; ?>
                    <?php if (!is_dir($file_path)) : ?>
                        <span class="badge bg-secondary rounded-pill ms-auto"><?php echo human_filesize($file_path); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>