document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('ww-modal');
  if (!modal) return;

  const openBySelector = (selector) => {
    const triggers = document.querySelectorAll(selector);
    triggers.forEach((btn) => {
      btn.addEventListener('click', (e) => {
        // Only hijack if it's an anchor to #contact-us or has data attr
        const href = btn.getAttribute('href') || '';
        const targetModal = btn.getAttribute('data-ww-modal') || '';
        if (href.startsWith('#contact-us') || targetModal === 'contact') {
          e.preventDefault();
          modal.classList.add('open');
          document.documentElement.style.overflow = 'hidden';
        }
      });
    });
  };

  // Hero button and any element with data-ww-modal="contact"
  openBySelector('a[href^="#contact-us"], [data-ww-modal="contact"]');

  const closeEls = modal.querySelectorAll('[data-ww-modal-close]');
  closeEls.forEach((el) => {
    el.addEventListener('click', () => {
      modal.classList.remove('open');
      document.documentElement.style.overflow = '';
    });
  });

  // ESC to close
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      modal.classList.remove('open');
      document.documentElement.style.overflow = '';
    }
  });
});


