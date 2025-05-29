import { getJSON } from '../utils/DataStore.js';

export class WhoAmI {
  constructor(elementId = 'whoami', interval = 2500, speed = 40) {
    this.el = document.getElementById(elementId);
    this.interval = interval;
    this.speed = speed;
    this.currentIndex = 0;
    this.roles = [];
  }

  async init() {
    if (!this.el) return;

    try {
      const data = await getJSON('/src/data/roles.json'); // Path relative to public root
      this.roles = data.roles || [];
    } catch (error) {
      // console.error('Failed to load roles for WhoAmI:', error); // Minimal
      this.roles = ["Developer", "Creator", "Innovator"]; // Fallback roles
    }
    
    if (this.roles.length > 0) {
      this._startTyping();
    }
  }

  _startTyping() {
    if (!this.el || this.roles.length === 0) return;
    
    const currentRole = this.roles[this.currentIndex];
    this._typeText(currentRole, () => {
      this.currentIndex = (this.currentIndex + 1) % this.roles.length;
      setTimeout(() => this._startTyping(), this.interval);
    });
  }

  _typeText(text, onComplete) {
    let charIndex = 0;
    this.el.textContent = ''; // Clear previous text
    
    const typeCharacter = () => {
      if (charIndex < text.length) {
        this.el.textContent += text.charAt(charIndex);
        charIndex++;
        setTimeout(typeCharacter, this.speed);
      } else if (onComplete) {
        onComplete();
      }
    };
    typeCharacter();
  }
}