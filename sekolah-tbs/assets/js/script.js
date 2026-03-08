// =========================================
// 1. NAVBAR SCROLL EFFECT
// =========================================
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('shadow-lg');
        navbar.style.padding = '10px 0';
    } else {
        navbar.classList.remove('shadow-lg');
        navbar.style.padding = '15px 0';
    }
});

// =========================================
// 2. TOGGLE PASSWORD VISIBILITY
// =========================================
// Gunakan class .toggle-password pada ikon mata di HTML
const togglePasswords = document.querySelectorAll('.toggle-password');
togglePasswords.forEach(item => {
    item.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const passwordInput = document.getElementById(targetId);
        
        // Ubah tipe input
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Ubah ikon (Jika pakai Bootstrap Icons)
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
});

// =========================================
// 3. VALIDASI FORM REGISTRASI
// =========================================
const registrationForm = document.querySelector('form');
if (registrationForm) {
    registrationForm.addEventListener('submit', function(e) {
        const password = document.querySelector('input[name="password"]').value;
        const confirmPassword = document.querySelector('input[name="confirm_password"]');
        
        // Jika ada input konfirmasi password, cek kecocokannya
        if (confirmPassword && password !== confirmPassword.value) {
            e.preventDefault();
            alert("Password dan Konfirmasi Password tidak cocok!");
            confirmPassword.focus();
        }
    });
}

// =========================================
// 4. AUTO-HIDE ALERT BOOTSTRAP
// =========================================
// Menghilangkan alert otomatis setelah 5 detik
const alerts = document.querySelectorAll('.alert');
alerts.forEach(function(alert) {
    setTimeout(function() {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }, 5000);
});

// =========================================
// 5. ANIMASI FADE-IN SAAT SCROLL
// =========================================
const observerOptions = {
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
        }
    });
}, observerOptions);

document.querySelectorAll('section').forEach(section => {
    observer.observe(section);
});