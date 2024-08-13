
// JS per apertura dropdown profilo
document.addEventListener('DOMContentLoaded', function() {
    // Seleziona il bottone e il menu
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.querySelector('[role="menu"]');
    
    // Aggiungi un event listener al bottone
    userMenuButton.addEventListener('click', function() {
        // Togli/aggiungi la classe 'hidden' per mostrare/nascondere il menu
        userMenu.classList.toggle('hidden');
    });
    
    // Nascondi il menu se si clicca fuori da esso
    document.addEventListener('click', function(event) {
        if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });
});
// End JS

// JS per apertura dropdown categorie
document.getElementById('dropdownButton').addEventListener('click', function() {
    const menu = document.getElementById('dropdownMenu');
    menu.classList.toggle('hidden');
});

// Optional: Close the dropdown if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (!event.target.matches('#dropdownButton')) {
        const dropdowns = document.querySelectorAll('#dropdownMenu');
        dropdowns.forEach(function(dropdown) {
            if (!dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });
    }
});
// End JS

