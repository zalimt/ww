document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.people-slider');
    const prevBtn = document.querySelector('.people-slider-prev');
    const nextBtn = document.querySelector('.people-slider-next');
    
    if (!slider || !prevBtn || !nextBtn) return;
    
    let currentIndex = 0;
    const cardWidth = 280; // Card width
    const gap = 30; // Gap between cards
    const totalCardWidth = cardWidth + gap; // Width including gap
    
    function getCardsPerView() {
        const containerWidth = slider.parentElement.offsetWidth;
        return Math.floor(containerWidth / totalCardWidth);
    }
    
    const totalCards = slider.children.length;
    let maxIndex = Math.max(0, totalCards - getCardsPerView());
    
    function updateSlider() {
        const translateX = -currentIndex * totalCardWidth;
        slider.style.transform = `translateX(${translateX}px)`;
        
        // Update button states
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= maxIndex;
    }
    
    function nextSlide() {
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateSlider();
        }
    }
    
    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
            updateSlider();
        }
    }
    
    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    // Initialize
    updateSlider();
    
    // Handle window resize
    window.addEventListener('resize', function() {
        maxIndex = Math.max(0, totalCards - getCardsPerView());
        
        if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }
        
        updateSlider();
    });
});
