<div class="card">
    <div class="card-body">
        <h1 class="card-title text-center mb-4">
            <?php echo htmlspecialchars($translations[$lang]['title']); ?>
        </h1>
        <div class="row">
            <?php
            $files = $files ?? [];
            foreach ($files as $file): ?>
                <?php
                $file_path = $current_dir . DIRECTORY_SEPARATOR . $file;
                $is_laravel = is_laravel_project($file_path);
                $laravel_version = $is_laravel ? get_laravel_version($file_path) : null;
                $app_url = $is_laravel ? get_app_url($file_path) : null;
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi <?php echo is_dir($file_path) ? 'bi-folder-fill' : 'bi-file-earmark-fill'; ?>"></i>
                                <?php if (is_dir($file_path)): ?>
                                    <a href="?dir=<?php echo urlencode($file_path); ?>&view=<?php echo $view_mode; ?>" class="text-decoration-none">
                                        <?php echo htmlspecialchars($file); ?>
                                    </a>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($file); ?>
                                <?php endif; ?>
                            </h5>
                            <?php if ($is_laravel): ?>
                                <p class="card-text">
                                    Laravel <?php echo $laravel_version; ?>
                                </p>
                                <?php if ($app_url): ?>
                                    <a href="<?php echo $app_url; ?>" target="_blank" class="btn btn-info">
                                        Ir al sitio
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if (!is_dir($file_path)): ?>
                                <span class="badge bg-secondary"><?php echo human_filesize($file_path); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>