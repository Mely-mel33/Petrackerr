window.onscroll = function() { scrollFunction() };

   //  défilement et l'effet de parallaxe
function handleParallaxScroll() {
  const bannerBackground = document.querySelector('.banner-all');
  const scrollPosition = window.pageYOffset;
  bannerBackground.style.backgroundPositionY = scrollPosition * 0.5 + 'px';
}

window.addEventListener('scroll', handleParallaxScroll);