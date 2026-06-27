document.getElementById('toggleDarkMode')?.addEventListener('click', function(e) {
    e.preventDefault();
    const htmlElement = document.documentElement;
    if (htmlElement.getAttribute('data-bs-theme') === 'dark') {
        htmlElement.setAttribute('data-bs-theme', 'light');
        document.body.style.backgroundColor = '#f8fafc';
        document.body.style.color = '#334155';
    } else {
        htmlElement.setAttribute('data-bs-theme', 'dark');
        document.body.style.backgroundColor = '#0f172a';
        document.body.style.color = '#e2e8f0';
    }
});