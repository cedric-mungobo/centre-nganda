/**
 * Gère le défilement en douceur vers les sections lorsqu'on clique sur les liens d'ancrage
 */
export function initSmoothScroll() {
    // Sélectionne tous les liens qui commencent par # mais pas ceux qui sont juste #
    document.querySelectorAll('a[href^="#"]:not([href="#"])').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Récupère l'ID de la section cible
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                // Calcule la position de la section cible
                const headerOffset = 100; // Offset pour tenir compte du header fixe
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                // Défilement en douceur
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
                
                // Met à jour l'URL avec l'ancre
                history.pushState(null, null, targetId);
            }
        });
    });
    
    // Gère le défilement vers l'ancre si elle est présente dans l'URL lors du chargement de la page
    window.addEventListener('load', () => {
        if (window.location.hash) {
            const targetElement = document.querySelector(window.location.hash);
            
            if (targetElement) {
                setTimeout(() => {
                    const headerOffset = 100;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }, 300); // Petit délai pour s'assurer que la page est complètement chargée
            }
        }
    });
}
