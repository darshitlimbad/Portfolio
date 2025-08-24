export class BackgroundLoader {
    constructor(imageUrl = 'https://darshitlimbad.github.io/GitPages/Portfolio/media/BG/bg.gif', cssVariable = '--bg-img-main', onComplete = null) {
        this.imageUrl = imageUrl;
        this.cssVariable = cssVariable; // CSS variable name to set
        this.onComplete = onComplete; // Callback function to call when loading finishes
    }
  
    init(callback = null) {
        if (!this.imageUrl) {
            // If no image URL, call callback immediately and return
            const finalCallback = callback || this.onComplete;
            if (finalCallback && typeof finalCallback === 'function') {
                finalCallback(false, 'No image URL provided');
            }
            return;
        }

        const img = new Image();
        const finalCallback = callback || this.onComplete;
        
        img.onload = () => {
            // Set the CSS variable for the background image
            document.documentElement.style.setProperty(this.cssVariable, `url('${img.src}')`);
            
            // Call the callback function on successful load
            if (finalCallback && typeof finalCallback === 'function') {
                finalCallback(true, img.src, img);
            }
        };
        
        img.onerror = (error) => {
            console.error(`Failed to load background image: ${this.imageUrl}`);
            // Fallback is handled by CSS (--bg-img-main in variables.css having the resize.gif)
            
            // Call the callback function on error
            if (finalCallback && typeof finalCallback === 'function') {
                finalCallback(false, `Failed to load image: ${this.imageUrl}`, error);
            }
        };
        
        // Start loading the image
        img.src = this.imageUrl;
    }
}
