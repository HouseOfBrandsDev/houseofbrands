document.addEventListener('DOMContentLoaded', function() {
  const btn             = document.querySelector('.hob-menu-toggle');
  const container       = document.getElementById('hob-mobile-menu-container');
  const mobileMenuHTML  = hobData.mobileMenu; // HTML généré par PHP
  const body            = document.body;

  if ( ! btn || ! container ) return;

  btn.addEventListener('click', function() {
    // Si on n'est pas en mobile (width > 1024px), on ne fait rien
    if ( window.innerWidth > 1024 ) return;

    const isOpen = this.getAttribute('aria-expanded') === 'true';

    if ( isOpen ) {
      // ===== FERME LE MENU =====
      container.innerHTML             = '';
      container.setAttribute('aria-hidden', 'true');
      btn.setAttribute('aria-expanded', 'false');
      container.classList.remove('mobile-menu-opened');
      body.classList.remove('mobile-menu-opened');

    } else {
      // ===== OUVRE LE MENU =====
      container.innerHTML             = mobileMenuHTML;
      container.setAttribute('aria-hidden', 'false');
      btn.setAttribute('aria-expanded', 'true');
      container.classList.add('mobile-menu-opened');
      body.classList.add('mobile-menu-opened');
    }
  });
});
