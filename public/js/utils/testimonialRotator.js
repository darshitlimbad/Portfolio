export function initTestimonialRotator(listSelector= '.testimonial-list', itemSelector = '.testimonial-item', intervalMs = 5000) {
    const testimonialList = document.querySelector(listSelector);
    if (!testimonialList) return;

    const testimonials = testimonialList.querySelectorAll(itemSelector);
    if (testimonials.length <= 1) return;

    let currentIndex = 0;

    // testimonials.forEach((item, index) => {
    //     item.classList.remove('is-visible'); // Ensure all are hidden initially by JS
    // });
    
    const showTestimonial = (index) => {
        testimonials.forEach(item => item.classList.remove('is-visible'));
        if (testimonials[index]) {
            testimonials[index].classList.add('is-visible');
        }
    };

    showTestimonial(currentIndex); // Show the first one

    const rotate = () => {
        currentIndex = (currentIndex + 1) % testimonials.length;
        showTestimonial(currentIndex);
    };

    let rotatorInterval = setInterval(rotate, intervalMs);

    // Optional: Pause on hover
    testimonialList.addEventListener('mouseenter', () => clearInterval(rotatorInterval));
    testimonialList.addEventListener('mouseleave', () => {
        clearInterval(rotatorInterval); // Clear existing before setting new
        rotatorInterval = setInterval(rotate, intervalMs);
    });

    // Optional: Pause on visibility change
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            clearInterval(rotatorInterval);
        } else {
            clearInterval(rotatorInterval);
            rotatorInterval = setInterval(rotate, intervalMs);
        }
    });
}