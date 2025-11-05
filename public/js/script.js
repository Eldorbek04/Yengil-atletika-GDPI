document.addEventListener('DOMContentLoaded', function () {
  const mobileMenuBtn = document.getElementById('mobile-menu');   // ☰ tugma
  const navMenu = document.querySelector('.navbar__menu');        // menyu
  let isOpen = false;
  let overlayDiv = null;

  function openMenu() {
    if (window.innerWidth <= 768) {
      navMenu.style.position = 'fixed';
      navMenu.style.top = '0';
      navMenu.style.left = '0';
      navMenu.style.width = '200px';
      navMenu.style.height = '100%';
      navMenu.style.backgroundColor = '#0d6efd';
      navMenu.style.display = 'flex';
      navMenu.style.flexDirection = 'column';
      navMenu.style.padding = '20px';
      navMenu.style.zIndex = '1001';
      navMenu.style.transition = 'left 0.3s ease-in-out';

      // Overlay yaratish
      overlayDiv = document.createElement('div');
      overlayDiv.style.position = 'fixed';
      overlayDiv.style.top = '0';
      overlayDiv.style.left = '0';
      overlayDiv.style.width = '100%';
      overlayDiv.style.height = '100%';
      overlayDiv.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
      overlayDiv.style.zIndex = '1000';

      // Overlay bosilsa menyuni yopish
      overlayDiv.addEventListener('click', closeMenu);

      document.body.appendChild(overlayDiv);
      isOpen = true;
    }
  }

  function closeMenu() {
    if (isOpen) {
      navMenu.removeAttribute('style');
      if (overlayDiv) {
        overlayDiv.remove();
        overlayDiv = null;
      }
      isOpen = false;
    }
  }

  // Tugma bosilganda menyuni ochish
  mobileMenuBtn.addEventListener('click', function () {
    if (!isOpen) {
      openMenu();
    } else {
      closeMenu();
    }
  });

  // Ekran o'lchami o'zgarsa, avtomatik yopish
  window.addEventListener('resize', function () {
    if (window.innerWidth > 768) {
      closeMenu();
    }
  });
});




    