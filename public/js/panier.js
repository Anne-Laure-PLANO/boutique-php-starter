/**
 * Gestion du panier - Page panier.php
 */

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.includes('panier')) {
        initPanier();
    }
});

/**
 * Initialiser la page panier
 */
function initPanier() {
    renderPanier();
    attachPanierEvents();
}

/**
 * Afficher le contenu du panier
 */
async function renderPanier() {
    const cart = window.cartAPI.get();
    const container = document.querySelector('#panier-content');

    if (!container) return;

    if (cart.length === 0) {
        container.innerHTML = `
            <div class="panier-vide">
                <p class="text-center" style="padding: 48px; font-size: 1.25rem; color: #9ca3af;">
                    Votre panier est vide
                </p>
                <div class="text-center">
                    <a href="/catalogue.php" class="btn btn-primary">
                        Découvrir nos produits
                    </a>
                </div>
            </div>
        `;
        return;
    }

    // Charger les détails des produits (appel API à implémenter)
    try {
        const response = await fetch('/api/panier/details', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ items: cart })
        });

        if (!response.ok) throw new Error('Erreur réseau');

        const { produits, total, sousTotal, tva } = await response.json();

        renderPanierItems(produits);
        renderPanierTotaux(total, sousTotal, tva);
    } catch (error) {
        console.error('Erreur:', error);
        // Fallback: afficher sans détails
        container.innerHTML = '<p class="alert alert-error">Erreur lors du chargement du panier</p>';
    }
}

/**
 * Afficher les articles du panier
 */
function renderPanierItems(produits) {
    const container = document.querySelector('#panier-items');

    if (!container) return;

    container.innerHTML = produits.map(produit => `
        <div class="panier-item" data-produit-id="${produit.id}">
            <div class="panier-item__image">
                <img src="/images/produits/${produit.image}" alt="${produit.nom}">
            </div>
            <div class="panier-item__info">
                <h3 class="panier-item__nom">${produit.nom}</h3>
                <p class="panier-item__prix">${formatPrice(produit.prix)}</p>
            </div>
            <div class="panier-item__quantite">
                <button class="btn-quantity" data-action="decrement" data-produit-id="${produit.id}">-</button>
                <input type="number" value="${produit.quantite}" min="1"
                       class="quantity-input" data-produit-id="${produit.id}">
                <button class="btn-quantity" data-action="increment" data-produit-id="${produit.id}">+</button>
            </div>
            <div class="panier-item__subtotal">
                ${formatPrice(produit.prix * produit.quantite)}
            </div>
            <div class="panier-item__remove">
                <button class="btn-remove" data-produit-id="${produit.id}" title="Retirer du panier">
                    ✕
                </button>
            </div>
        </div>
    `).join('');
}

/**
 * Afficher les totaux
 */
function renderPanierTotaux(total, sousTotal, tva) {
    const container = document.querySelector('#panier-totaux');

    if (!container) return;

    container.innerHTML = `
        <div class="panier-totaux">
            <div class="panier-totaux__ligne">
                <span>Sous-total</span>
                <span>${formatPrice(sousTotal)}</span>
            </div>
            <div class="panier-totaux__ligne">
                <span>TVA (20%)</span>
                <span>${formatPrice(tva)}</span>
            </div>
            <div class="panier-totaux__ligne panier-totaux__total">
                <span>Total</span>
                <span>${formatPrice(total)}</span>
            </div>
            <button class="btn btn-primary btn-lg" style="width: 100%; margin-top: 24px;">
                Passer la commande
            </button>
        </div>
    `;
}

/**
 * Attacher les événements du panier
 */
function attachPanierEvents() {
    // Boutons de quantité
    document.addEventListener('click', (e) => {
        if (e.target.matches('[data-action="increment"]')) {
            const produitId = parseInt(e.target.dataset.produitId);
            const input = document.querySelector(`.quantity-input[data-produit-id="${produitId}"]`);
            if (input) {
                input.value = parseInt(input.value) + 1;
                updateQuantity(produitId, parseInt(input.value));
            }
        }

        if (e.target.matches('[data-action="decrement"]')) {
            const produitId = parseInt(e.target.dataset.produitId);
            const input = document.querySelector(`.quantity-input[data-produit-id="${produitId}"]`);
            if (input && parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateQuantity(produitId, parseInt(input.value));
            }
        }

        if (e.target.matches('.btn-remove')) {
            const produitId = parseInt(e.target.dataset.produitId);
            if (confirm('Voulez-vous vraiment retirer cet article du panier ?')) {
                window.cartAPI.remove(produitId);
                renderPanier();
            }
        }
    });

    // Inputs de quantité
    document.addEventListener('change', (e) => {
        if (e.target.matches('.quantity-input')) {
            const produitId = parseInt(e.target.dataset.produitId);
            const quantite = parseInt(e.target.value);

            if (quantite < 1) {
                e.target.value = 1;
                return;
            }

            updateQuantity(produitId, quantite);
        }
    });
}

/**
 * Mettre à jour la quantité
 */
function updateQuantity(produitId, quantite) {
    window.cartAPI.update(produitId, quantite);
    renderPanier();
}

/**
 * Formater un prix (fonction locale)
 */
function formatPrice(price) {
    return new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR'
    }).format(price);
}
