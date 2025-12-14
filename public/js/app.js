/**
 * Application JavaScript - Boutique E-commerce
 * Gestion des interactions et du comportement dynamique
 */

// Configuration
const API_BASE_URL = '/api';

// Initialisation au chargement du DOM
document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initFiltersToggle();
    initAlerts();
    updateCartBadge();
});

/**
 * Gestion du menu mobile
 */
function initMobileMenu() {
    const burger = document.querySelector('.burger-menu');
    const nav = document.querySelector('.header__nav');

    if (burger && nav) {
        burger.addEventListener('click', () => {
            nav.classList.toggle('active');
            burger.classList.toggle('active');
        });
    }
}

/**
 * Gestion des filtres (sidebar mobile)
 */
function initFiltersToggle() {
    const filterBtn = document.querySelector('[data-toggle-filters]');
    const filters = document.querySelector('.filters');
    const overlay = document.querySelector('.filters__overlay');
    const closeBtn = document.querySelector('[data-close-filters]');

    if (filterBtn && filters) {
        filterBtn.addEventListener('click', () => {
            filters.classList.add('active');
            if (overlay) overlay.classList.add('active');
        });
    }

    if (closeBtn && filters) {
        closeBtn.addEventListener('click', () => {
            filters.classList.remove('active');
            if (overlay) overlay.classList.remove('active');
        });
    }

    if (overlay) {
        overlay.addEventListener('click', () => {
            filters.classList.remove('active');
            overlay.classList.remove('active');
        });
    }
}

/**
 * Fermer automatiquement les alertes
 */
function initAlerts() {
    const alerts = document.querySelectorAll('.alert[data-auto-close]');

    alerts.forEach(alert => {
        const delay = parseInt(alert.dataset.autoClose) || 5000;
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        }, delay);
    });
}

/**
 * Mettre à jour le badge du panier
 */
function updateCartBadge() {
    const cart = getCart();
    const badge = document.querySelector('.header__cart-badge');

    if (badge) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantite, 0);
        badge.textContent = totalItems;
        badge.style.display = totalItems > 0 ? 'block' : 'none';
    }
}

/**
 * Obtenir le panier depuis localStorage
 */
function getCart() {
    const cart = localStorage.getItem('cart');
    return cart ? JSON.parse(cart) : [];
}

/**
 * Sauvegarder le panier dans localStorage
 */
function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartBadge();
}

/**
 * Ajouter un produit au panier
 */
function addToCart(produitId, quantite = 1) {
    const cart = getCart();
    const existingItem = cart.find(item => item.produit_id === produitId);

    if (existingItem) {
        existingItem.quantite += quantite;
    } else {
        cart.push({
            produit_id: produitId,
            quantite: quantite
        });
    }

    saveCart(cart);

    // Afficher une notification
    showNotification('Produit ajouté au panier !', 'success');

    return cart;
}

/**
 * Retirer un produit du panier
 */
function removeFromCart(produitId) {
    let cart = getCart();
    cart = cart.filter(item => item.produit_id !== produitId);
    saveCart(cart);

    // Recharger la page panier si on y est
    if (window.location.pathname.includes('panier')) {
        window.location.reload();
    }
}

/**
 * Mettre à jour la quantité d'un produit
 */
function updateCartQuantity(produitId, quantite) {
    const cart = getCart();
    const item = cart.find(item => item.produit_id === produitId);

    if (item) {
        item.quantite = parseInt(quantite);

        if (item.quantite <= 0) {
            removeFromCart(produitId);
        } else {
            saveCart(cart);
        }
    }
}

/**
 * Vider le panier
 */
function clearCart() {
    localStorage.removeItem('cart');
    updateCartBadge();
}

/**
 * Afficher une notification toast
 */
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification--${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 80px;
        right: 20px;
        padding: 16px 24px;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#2563eb'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-in';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

/**
 * Formater un prix
 */
function formatPrice(price) {
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR'
    }).format(price);
}

/**
 * Debounce function (pour la recherche)
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Animations CSS (à ajouter dans le <head>)
if (!document.querySelector('#app-animations')) {
    const style = document.createElement('style');
    style.id = 'app-animations';
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
}

// Exporter les fonctions pour utilisation globale
window.cartAPI = {
    add: addToCart,
    remove: removeFromCart,
    update: updateCartQuantity,
    clear: clearCart,
    get: getCart
};
