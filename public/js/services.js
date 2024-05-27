document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.service-card');
  
    function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }
  
    function checkCardsInView() {
      serviceCards.forEach(card => {
        if (isInViewport(card)) {
          card.classList.add('in-view');
        }
      });
    }
  
    // Écouter le scroll pour détecter quand les cartes entrent dans la vue de défilement
    window.addEventListener('scroll', checkCardsInView);
  
    // Vérifier les cartes initialement au chargement de la page
    checkCardsInView();
  });