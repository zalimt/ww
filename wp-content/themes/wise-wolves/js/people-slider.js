document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.people-slider');
    const prevBtns = document.querySelectorAll('.people-slider-prev');
    const nextBtns = document.querySelectorAll('.people-slider-next');

    if (!slider || prevBtns.length === 0 || nextBtns.length === 0) return;

    let currentIndex = 0;
    const totalCards = slider.children.length;

    function getCardWidthWithGap() {
        const firstCard = slider.querySelector('.people-card');
        const cardWidth = firstCard ? firstCard.getBoundingClientRect().width : 280;
        const styles = window.getComputedStyle(slider);
        const gap = parseInt(styles.columnGap || styles.gap || '0', 10) || 0;
        return cardWidth + gap;
    }

    function getCardsPerView() {
        const containerWidth = slider.parentElement.getBoundingClientRect().width;
        const cw = getCardWidthWithGap();
        const perView = Math.floor(containerWidth / cw);
        return Math.max(1, perView);
    }

    function getMaxIndex() {
        return Math.max(0, totalCards - getCardsPerView());
    }

    function updateSlider() {
        const translateX = -currentIndex * getCardWidthWithGap();
        slider.style.transform = `translateX(${translateX}px)`;

        const atStart = currentIndex === 0;
        const atEnd = currentIndex >= getMaxIndex();
        prevBtns.forEach(btn => btn.disabled = atStart);
        nextBtns.forEach(btn => btn.disabled = atEnd);
    }

    function nextSlide() {
        const maxIndex = getMaxIndex();
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

    // Event listeners for all control sets
    nextBtns.forEach(btn => btn.addEventListener('click', nextSlide));
    prevBtns.forEach(btn => btn.addEventListener('click', prevSlide));

    // Initialize
    updateSlider();

    // Handle window resize
    window.addEventListener('resize', function() {
        const maxIndex = getMaxIndex();
        if (currentIndex > maxIndex) currentIndex = maxIndex;
        updateSlider();
    });
});
