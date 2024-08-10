const themeToggle = document.getElementById('themeToggle');
const body = document.body;

// Set theme based on saved preference or default to light theme
let theme = localStorage.getItem('theme') || 'theme-light';
body.classList.add(theme);

themeToggle.addEventListener('click', function () {
    if (body.classList.contains('theme-light')) {
        body.classList.remove('theme-light');
        body.classList.add('theme-dark');
        themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
        themeToggle.title = "Tema Claro";
        localStorage.setItem('theme', 'theme-dark');
    } else {
        body.classList.remove('theme-dark');
        body.classList.add('theme-light');
        themeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
        themeToggle.title = "Tema Oscuro";
        localStorage.setItem('theme', 'theme-light');
    }
});

// Set correct icon on load
if (body.classList.contains('theme-dark')) {
    themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
    themeToggle.title = "Tema Claro";
} else {
    themeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
    themeToggle.title = "Tema Oscuro";
}
