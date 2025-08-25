/**
 * Wise Wolves Header JavaScript
 * Handles mobile menu toggle and smooth interactions
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile menu toggle functionality
    const mobileToggle = document.querySelector('.wise-wolves-mobile-toggle');
    const navigation = document.querySelector('.wise-wolves-navigation');
    const navMenu = document.querySelector('.wise-wolves-nav-menu');
    
    if (mobileToggle && navigation) {
        mobileToggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Toggle navigation visibility
            navigation.classList.toggle('mobile-active');
            mobileToggle.classList.toggle('active');
            
            // Toggle aria-expanded for accessibility
            const isExpanded = navigation.classList.contains('mobile-active');
            mobileToggle.setAttribute('aria-expanded', isExpanded);
        });
    }
    
    // Close mobile menu when clicking on a link
    if (navMenu) {
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    navigation.classList.remove('mobile-active');
                    mobileToggle.classList.remove('active');
                    mobileToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!navigation.contains(e.target) && !mobileToggle.contains(e.target)) {
            navigation.classList.remove('mobile-active');
            mobileToggle.classList.remove('active');
            mobileToggle.setAttribute('aria-expanded', 'false');
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            navigation.classList.remove('mobile-active');
            mobileToggle.classList.remove('active');
            mobileToggle.setAttribute('aria-expanded', 'false');
        }
    });
    
});
