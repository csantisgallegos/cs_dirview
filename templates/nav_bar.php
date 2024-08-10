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
            <input type="hidden" name="view" value="<?php echo $view_mode; ?>">
        </form>
    </div>
</div>

<form method="POST" class="mb-4">
    <div class="input-group">
        <span class="input-group-text">Ruta base:</span>
        <input type="text" name="base_dir" value="<?php echo htmlspecialchars($base_dir); ?>" class="form-control">
        <button class="btn btn-primary" type="submit">Establecer</button>
    </div>
</form>

<div class="mb-3">
    <a href="?dir=<?php echo urlencode($current_dir); ?>&view=list" class="btn btn-outline-primary <?php echo $view_mode == 'list' ? 'active' : ''; ?>">
        <i class="bi bi-list"></i> Lista
    </a>
    <a href="?dir=<?php echo urlencode($current_dir); ?>&view=cards" class="btn btn-outline-primary <?php echo $view_mode == 'cards' ? 'active' : ''; ?>">
        <i class="bi bi-grid-fill"></i> Tarjetas
    </a>
</div>

<?php if (!$is_root): ?>
    <a href="?dir=<?php echo urlencode($parent_dir); ?>&view=<?php echo $view_mode; ?>" class="btn btn-outline-primary mb-3">
        <i class="bi bi-arrow-up-circle-fill"></i> Subir un nivel
    </a>
<?php endif; ?>