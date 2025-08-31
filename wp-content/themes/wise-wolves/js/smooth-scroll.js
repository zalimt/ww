document.addEventListener('DOMContentLoaded', function() {
    // Header menu links
    const headerMenuLinks = document.querySelectorAll('.wise-wolves-nav-menu a[href^="#"]');
    
    // Footer menu links
    const footerMenuLinks = document.querySelectorAll('.footer-menu a[href^="#"]');
    
    // Combine both menu link arrays
    const allMenuLinks = [...headerMenuLinks, ...footerMenuLinks];
    
    allMenuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerOffset = 90; // Account for fixed header height
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
