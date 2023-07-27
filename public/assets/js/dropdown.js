// Récupérer tous les éléments des boutons dropdown
var dropdownButtons = document.querySelectorAll('.dropdown-button');

// Pour chaque bouton dropdown
dropdownButtons.forEach(function(button) {
    // Récupérer l'élément de la liste déroulante correspondant
    var dropdownList = button.nextElementSibling;

    // Ajouter un écouteur d'événement de clic sur le bouton dropdown
    button.addEventListener('click', function() {
        dropdownList.classList.toggle('hidden');
    });

    // Ajouter un écouteur d'événement de clic en dehors du dropdown pour le masquer
    document.addEventListener('click', function(event) {
        if (!button.contains(event.target)) {
            dropdownList.classList.add('hidden');
        }
    });
});