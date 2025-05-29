export class EasterEgg {
    constructor(selector = '#easter-egg', triggerChance = 0.1) { // 10% chance
      this.el = document.querySelector(selector);
      this.triggerChance = triggerChance;
    }
  
    init() {
      if (!this.el) return;

      if (Math.random() < this.triggerChance) {
        this._positionAndShow();
      }
    }

    _positionAndShow() {
        const maxTop = window.innerHeight - this.el.offsetHeight - 20; // 20px buffer
        const maxLeft = window.innerWidth - this.el.offsetWidth - 20;  // 20px buffer

        const top = Math.max(20, Math.random() * maxTop); // Min 20px from top/left
        const left = Math.max(20, Math.random() * maxLeft);

        this.el.style.top = `${top}px`;
        this.el.style.left = `${left}px`;
        
        // Requires .is-visible class for CSS transition
        setTimeout(() => { // Slight delay for transition to catch
            this.el.classList.add('is-visible');
        }, 100); 
    }
}