// JavaScript pour la marketplace

document.addEventListener('DOMContentLoaded', function() {
    // Masquer les messages d'alerte après 5 secondes
    const alerts = document.querySelectorAll('.message-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.display = 'none';
        }, 5000);
    });

    // Initialiser les fonctionnalités de recherche
    const searchForm = document.querySelector('.filter-box');
    if (searchForm) {
        // Ajouter des validations côté client si nécessaire
    }
});

// Fonction utilitaire pour valider les formulaires
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;
    
    const inputs = form.querySelectorAll('input[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.style.borderColor = '#ef4444';
            isValid = false;
        }
    });
    
    return isValid;
}

// Animation au scroll
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.site-navbar');
    if (window.scrollY > 50) {
        navbar.style.boxShadow = '0 8px 32px rgba(15, 23, 42, 0.15)';
    } else {
        navbar.style.boxShadow = '0 8px 25px rgba(15, 23, 42, 0.07)';
    }
});
