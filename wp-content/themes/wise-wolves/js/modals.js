document.addEventListener('DOMContentLoaded', function () {
  // Modal configuration
  const modals = {
    contact: {
      id: 'ww-modal-contact',
      triggers: ['a[href^="#contact-us"]', '[data-ww-modal="contact"]']
    },
    join: {
      id: 'ww-modal-join',
      triggers: ['a[href^="#join-a-team"]', '[data-ww-modal="join"]']
    },
    partner: {
      id: 'ww-modal-partner',
      triggers: ['a[href^="#partnership-program"]', '[data-ww-modal="partner"]']
    }
  };

  // Function to open a specific modal
  const openModal = (modalId) => {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.classList.add('open');
      document.documentElement.style.overflow = 'hidden';
    }
  };

  // Function to close all modals
  const closeAllModals = () => {
    Object.values(modals).forEach(modal => {
      const modalEl = document.getElementById(modal.id);
      if (modalEl) {
        modalEl.classList.remove('open');
      }
    });
    document.documentElement.style.overflow = '';
  };

  // Set up triggers for each modal
  Object.entries(modals).forEach(([modalName, config]) => {
    config.triggers.forEach(selector => {
      const triggers = document.querySelectorAll(selector);
      triggers.forEach((btn) => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          openModal(config.id);
        });
      });
    });
  });

  // Close modals when clicking close buttons or backdrop
  document.addEventListener('click', (e) => {
    if (e.target.hasAttribute('data-ww-modal-close')) {
      closeAllModals();
    }
  });

  // ESC to close all modals
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeAllModals();
    }
  });
});



