
// Liste d'exemples d'alertes
const alerts = [
    "Chaton perdu a été retrouvé ce matin dans le cartier des Iris ",
    "Besoin urgent d'adoption pour un chien, contactez le numéro: 06XXYYZZFF",
    "Chaton trouvé cherchant un foyer aimant",

];

let currentAlertIndex = 0;
const alertTextElement = document.getElementById('alertText');

//changer l'alerte affichée
function changeAlert() {
    alertTextElement.textContent = alerts[currentAlertIndex];
    currentAlertIndex = (currentAlertIndex + 1) % alerts.length;
}
setInterval(changeAlert, 6000); // Change d'alerte toutes les 5 secondes
