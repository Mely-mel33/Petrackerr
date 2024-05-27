// Lien vers Accueil (Publications)
document.getElementById("homeLink").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("publicationsSpace").style.display = "block";
    document.getElementById("petProfileForm").style.display = "none";
    // Ajoutez d'autres logiques pour afficher les publications
});

// Lien vers Profil (Formulaire de profil d'animal domestique)
document.getElementById("profileLink").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("publicationsSpace").style.display = "none";
    document.getElementById("petProfileForm").style.display = "block";
    // Ajoutez d'autres logiques pour gérer le formulaire de profil
});



