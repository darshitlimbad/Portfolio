export class ThanosText {
    constructor(selector = '.intro__nav-item', speed = 25) { // Updated default selector
      this.elements = document.querySelectorAll(selector);
      this.speed = speed;
      this.isAnimating = new WeakMap(); // To prevent re-triggering during animation
    }
  
    _typeEffect(el, newText, originalText, onComplete) {
      let index = 0;
      const add = () => {
        if (index < newText.length) {
          el.textContent = newText.slice(0, index + 1) + originalText.slice(index + 1);
          index++;
          setTimeout(add, this.speed);
        } else {
          el.textContent = newText;
          if (onComplete) onComplete();
        }
      };
      add();
    }
  
    _revertEffect(el, newText, originalText, onComplete) {
      let index = newText.length;
      const remove = () => {
        if (index > 0) {
          el.textContent = newText.slice(0, --index) + originalText.slice(index);
          setTimeout(remove, this.speed);
        } else {
          el.textContent = originalText;
          if (onComplete) onComplete();
        }
      };
      remove();
    }
  
    init() {
      this.elements.forEach(el => {
        const originalText = el.textContent;
        const newTextData = el.dataset.newtext;
        if (!newTextData) return;

        const newTextFormatted = `/${newTextData}/`;
  
        el.addEventListener('click', (e) => {
          const url = el.dataset.url;
          if (url) {
            e.preventDefault(); // Prevent default if it's an anchor
            window.location.href = url;
          }
        });
  
        el.addEventListener('mouseover', () => {
          if (this.isAnimating.get(el)) return;
          this.isAnimating.set(el, true);
          el.classList.add('snapped'); // Original class for cursor.css
          this._typeEffect(el, newTextFormatted, originalText, () => {
            // Keep animating flag true until mouseout if desired, or set false here
          });
        });
  
        el.addEventListener('mouseout', () => {
          el.classList.remove('snapped');
          // Only revert if it was fully typed or if we want to interrupt
          this._revertEffect(el, newTextFormatted, originalText, () => {
            this.isAnimating.set(el, false);
          });
        });
      });
    }
  }