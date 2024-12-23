document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const loginBtn = document.getElementById('loginBtn');

    form.addEventListener('submit', function(event) {
        let valid = true;

        if (username.value.trim() === '') {
            valid = false;
            alert('Harap isi Username!');
        }

        if (password.value.trim() === '') {
            valid = false;
            alert('Harap isi Password!');
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});