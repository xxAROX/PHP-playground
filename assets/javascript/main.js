const theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

const setTheme = (theme) => {
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) document.documentElement.setAttribute('data-bs-theme', 'dark');
    else document.documentElement.setAttribute('data-bs-theme', theme);
}
function getTheme() {
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) document.documentElement.setAttribute('data-bs-theme', 'dark');
    else document.documentElement.setAttribute('data-bs-theme', theme);
    return document.documentElement.getAttribute('data-bs-theme');
}
setTheme(theme);
