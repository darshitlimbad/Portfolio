export function initScrollReveal(selector = '.card', options = {}) {
  const elements = document.querySelectorAll(selector);

  if (elements.length === 0) return;

  const defaultOptions = {
    rootMargin: '0px 0px -10% 0px', // Trigger when 10% of element is visible from bottom
    threshold: 0.1, // 10% visibility
  };

  const observerOptions = { ...defaultOptions, ...options };

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        obs.unobserve(entry.target); 
      }
    });
  }, observerOptions);

  elements.forEach(el => observer.observe(el));
}