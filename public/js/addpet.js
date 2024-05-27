// Fonction pour ajouter un nouvel animal domestique à la liste
function addPetToList(petName) {
    const petList = document.getElementById("petList");
    const li = document.createElement("li");
    li.textContent = petName;
    petList.appendChild(li);
}

// Événement de soumission du formulaire pour ajouter un nouvel animal domestique
document.getElementById("addPetForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    const petNameInput = this.querySelector("input[type='text']");
    const petName = petNameInput.value.trim();

    if (petName !== "") {
        addPetToList(petName);
        petNameInput.value = ""; // Efface le champ du formulaire après l'ajout
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Sélectionne tous les éléments avec la classe dropdown-toggle
    var dropdowns = document.querySelectorAll('.dropdown-toggle');
  
    // Parcours tous les éléments dropdown-toggle
    dropdowns.forEach(function(dropdown) {
      // Ajoute un écouteur d'événements clic à chaque élément dropdown-toggle
      dropdown.addEventListener('click', function() {
        // Récupère l'élément suivant (la liste déroulante)
        var dropdownMenu = dropdown.nextElementSibling;
        // Bascule la classe "show" sur la liste déroulante pour afficher ou masquer la liste déroulante
        dropdownMenu.classList.toggle('show');
      });
    });
  
    // Ajoute un écouteur d'événements clic à l'ensemble du document pour masquer la liste déroulante lorsqu'on clique à l'extérieur de celle-ci
    document.addEventListener('click', function(event) {
      if (!event.target.matches('.dropdown-toggle')) {
        var dropdowns = document.querySelectorAll('.sub-menu');
        dropdowns.forEach(function(dropdown) {
          if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
          }
        });
      }
    });
  });