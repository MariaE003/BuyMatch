// Script à inclure en bas de page
document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Simulation de filtrage
    const searchInput = document.querySelector('input[placeholder*="Rechercher"]');
    if(searchInput) {
        searchInput.addEventListener('keyup', (e) => {
            const value = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.grid > div'); // Les cartes de matchs
            
            cards.forEach(card => {
                const title = card.innerText.toLowerCase();
                card.style.display = title.includes(value) ? 'block' : 'none';
            });
        });
    }

    // 2. Gestion des Modales (ex: QR Code)
    const toggleModal = (modalId) => {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    };

    // 3. Calcul de prix dynamique (sur la page réservation)
    const categorySelect = document.getElementById('category');
    const quantityInput = document.getElementById('quantity');
    const totalDisplay = document.getElementById('total-price');

    if(categorySelect && quantityInput) {
        const updatePrice = () => {
            const price = categorySelect.options[categorySelect.selectedIndex].dataset.price;
            const qty = quantityInput.value;
            totalDisplay.innerText = (price * qty) + " DH";
        };
        categorySelect.addEventListener('change', updatePrice);
        quantityInput.addEventListener('input', updatePrice);
    }
});