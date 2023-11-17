document.addEventListener("DOMContentLoaded", function() {
    // Récupérez le bouton du menu mobile et le menu lui-même
    const mobileMenuButton = document.querySelector('[data-collapse-toggle="mobile-menu-2"]');
    const mobileMenu = document.getElementById('mobile-menu-2');
  
    // Ajoutez un gestionnaire d'événements au bouton pour détecter le clic
    mobileMenuButton.addEventListener('click', () => {
      // Basculez la classe 'hidden' pour afficher ou masquer le menu
      mobileMenu.classList.toggle('hidden');
      // Ajoutez ou supprimez la classe 'lg:flex' pour assurer une bonne visibilité sur les résolutions plus larges
      mobileMenu.classList.toggle('lg:flex');
    });
  
    // Ajoutez un gestionnaire d'événements à la fenêtre pour masquer le menu lorsque l'utilisateur clique à l'extérieur du menu
    window.addEventListener('click', (event) => {
      if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
        mobileMenu.classList.add('hidden');
        mobileMenu.classList.remove('lg:flex');
      }
    });
  });
  