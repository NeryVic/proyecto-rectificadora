document.addEventListener('DOMContentLoaded', (event) => {
    const rememberCheckbox = document.getElementById('check');
    const usuarioInput = document.getElementById('usuario');
    const passwordInput = document.getElementById('password');

    // Cargar credenciales almacenadas si existen
    if (localStorage.getItem('remember') === 'true') {
        usuarioInput.value = localStorage.getItem('usuario') || '';
        passwordInput.value = localStorage.getItem('password') || '';
        rememberCheckbox.checked = true;
    }

    // Manejar el submit del formulario
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        if (rememberCheckbox.checked) {
            localStorage.setItem('remember', 'true');
            localStorage.setItem('usuario', usuarioInput.value);
            localStorage.setItem('password', passwordInput.value);
        } else {
            localStorage.removeItem('remember');
            localStorage.removeItem('usuario');
            localStorage.removeItem('password');
        }
    });
});