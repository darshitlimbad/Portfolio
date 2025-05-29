export class LinkAlias {
    constructor(attribute = 'data-url') {
        this.attribute = attribute;
    }

    init() {
        document.querySelectorAll(`[${this.attribute}]`).forEach(el => {
            const url = el.getAttribute(this.attribute);
            if (url) {
                // Ensure click handler doesn't interfere if element is already an anchor
                if (el.tagName.toLowerCase() !== 'a') {
                    el.addEventListener('click', () => {
                        window.location.assign(url);
                    });
                }
            }
        });
    }
}