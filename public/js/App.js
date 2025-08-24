import { ThanosText } from './components/ThanosText.js';
import { LinkAlias } from './components/LinkAlias.js';
import { WhoAmI } from './components/WhoAmI.js';
import { BackgroundLoader } from './components/BackgroundLoader.js';
// import { EasterEgg } from './components/EasterEgg.js';
import { initScrollReveal } from './utils/scrollReveals.js';
import { initTestimonialRotator } from './utils/testimonialRotator.js';

export default class App {
    constructor() {

        this.onBackgroundImageLoaded = this.onBackgroundImageLoaded.bind(this);

        this.modules = [
            new ThanosText(),      // Uses .intro__nav-item 
            new LinkAlias(),       // Uses data-url
            new WhoAmI(),          // Uses #whoami
            new BackgroundLoader('public/media/BG/bg.gif', '--bg-img-main', this.onBackgroundImageLoaded),// Uses --bg-img-main 
            // new BackgroundLoader('https://darshitlimbad.github.io/GitPages/Portfolio/media/BG/bg.gif', '--bg-img-main', this.onBackgroundImageLoaded),// Uses --bg-img-main 
            // new EasterEgg()        // Uses #easter-egg
        ];    
        
        // Device detection
        this.deviceInfo = this.detectDevice();
        this.setDeviceClasses();
    }

    detectDevice() {
        const userAgent = navigator.userAgent;
        const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(userAgent);
        const isTablet = /iPad|Android(?!.*Mobile)/i.test(userAgent);
        const isDesktop = !isMobile && !isTablet;
        
        return {
            isMobile,
            isTablet,
            isDesktop,
            hasTouch: 'ontouchstart' in window,
            screenWidth: window.innerWidth,
            userAgent
        };
    }
    
    setDeviceClasses() {
        const { isMobile, isTablet, isDesktop, hasTouch } = this.deviceInfo;
        
        // Add classes to body for CSS targeting
        if (isMobile) document.body.classList.add('is-mobile');
        if (isTablet) document.body.classList.add('is-tablet');
        if (isDesktop) document.body.classList.add('is-desktop');
        if (hasTouch) document.body.classList.add('has-touch');
        
        // Add screen size class
        if (window.innerWidth <= 480) {
            document.body.classList.add('screen-small');
        } else if (window.innerWidth <= 768) {
            document.body.classList.add('screen-medium');
        } else {
            document.body.classList.add('screen-large');
        }
    }

    init() {
        this.modules.forEach(mod => {
            if (typeof mod.init === 'function') {
                mod.init();
            }
        });
        this.initBlurToggle();
        initScrollReveal('.card'); // General reveal for .card elements
        document.body.classList.add('blur-bg-active'); // Activate blur
        
        // Page-specific initializations
        const pageId = document.body.id;        
        if (pageId=== 'home'){
            const tip = document.getElementById('tip') || document.getElementById('interaction-tip'); // make sure this matches your popup ID
            const closeBtn = document.getElementById('tip-close-btn');
            const storageKey = 'interactionTipDismissed';
            
            if (tip) {
                tip.classList.remove('hidden');
                
                setTimeout(() => {
                    tip.classList.add('hidden');
                    localStorage.setItem(storageKey, 'true');
                }, 5000);
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    tip.classList.add('hidden');
                    localStorage.setItem(storageKey, 'true');
                });
            }

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

    onBackgroundImageLoaded(success, data, extra) {
        if (success) {
            console.log("🎉 Background loaded successfully:",data)
            const pageId = document.body.id;        
            if(pageId == "home" && !this.deviceInfo?.isMobile) {
                document.body.classList.remove('blur-bg-active');
            }
        } else {
            console.log('❌ Background failed to load:', data);
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const app = new App();
    app.init();
});