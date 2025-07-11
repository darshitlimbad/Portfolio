export class BackgroundLoader {
    constructor(imageUrl = 'https://darshitlimbad.github.io/GitPages/Portfolio/media/BG/bg.gif', cssVariable = '--bg-img-main') {
        this.imageUrl = imageUrl;
        this.cssVariable = cssVariable; // CSS variable name to set
    }
  
    init() {
        if (!this.imageUrl) return;

        const img = new Image();
        img.src = this.imageUrl;
        
        img.onload = () => {
            document.documentElement.style.setProperty(this.cssVariable, `url('${img.src}')`);
        };
        img.onerror = () => {
            console.error(`Failed to load background image: ${this.imageUrl}`); 
            // Fallback is handled by CSS (--bg-img-main in variables.css having the resize.gif)
        };
    }
}