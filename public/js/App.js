import { ThanosText } from './components/ThanosText.js';
import { LinkAlias } from './components/LinkAlias.js';
import { WhoAmI } from './components/WhoAmI.js';
import { BackgroundLoader } from './components/BackgroundLoader.js';
import { EasterEgg } from './components/EasterEgg.js';
import { initScrollReveal } from './utils/scrollReveals.js';
import { initTestimonialRotator } from './utils/testimonialRotator.js';

export default class App {
    constructor() {
        this.modules = [
            new ThanosText(),      // Uses .intro__nav-item (updated)
            new LinkAlias(),       // Uses data-url (no change needed)
            new WhoAmI(),          // Uses #whoami (no change needed)
            new BackgroundLoader(),// Uses --bg-img-main (updated)
            new EasterEgg()        // Uses #easter-egg (no change needed)
        ];        
    }

    init() {
        this.modules.forEach(mod => {
            if (typeof mod.init === 'function') {
                mod.init();
            }
        });
        this.initBlurToggle();
        initScrollReveal('.card'); // General reveal for .card elements
        
        // Page-specific initializations
        const pageId = document.body.id;

        if (pageId !== 'home') {
            document.body.classList.add('blur-bg-active'); // Activate blur on non-home pages by default
        }

        if (pageId === 'contact') {
            initScrollReveal('.js-reveal'); // For specific elements on contact page
            initTestimonialRotator(); // Updated interval
        }
    }

    initBlurToggle() {
        const toggleBlurBtn = document.getElementById('toggle-blur');

        if (toggleBlurBtn) {
            toggleBlurBtn.addEventListener('click', () => {
                document.body.classList.toggle('blur-bg-active');
            });
        } else {
            console.warn('Toggle blur button not found.'); 
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/public/service-worker.js') 
            .then(registration => {
                console.log('SW registered:', registration.scope); 
            })
            .catch(error => {
                console.error('SW registration failed:', error); 
            });
    }

    const app = new App();
    app.init();
});