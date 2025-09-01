document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.news-slider');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    
    if (!slider || !prevBtn || !nextBtn) return;
    
    let currentIndex = 0;
    const cardWidth = 330; // 300px card + 30px gap
    const cardsPerView = Math.floor(slider.parentElement.offsetWidth / cardWidth);
    const totalCards = slider.children.length;
    const maxIndex = Math.max(0, totalCards - cardsPerView);
    
    function updateSlider() {
        const translateX = -currentIndex * cardWidth;
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
        const newCardsPerView = Math.floor(slider.parentElement.offsetWidth / cardWidth);
        const newMaxIndex = Math.max(0, totalCards - newCardsPerView);
        
        if (currentIndex > newMaxIndex) {
            currentIndex = newMaxIndex;
        }
        
        updateSlider();
    });
});
