
    // Fonction pour jouer le son
    function playClickSound() {
        var clickSound = document.getElementById("clickSound");
        clickSound.play();
    }

    // Ajouter un gestionnaire d'événements à tous les éléments cliquables
    document.addEventListener('click', function (event) {
        // Vérifier si l'élément cliqué est un bouton ou un lien
        if (event.target.tagName === 'BUTTON' || event.target.tagName === 'A') {
            // Jouer le son
            playClickSound();
        }
    });
