// Accordion module for Alpine.js
export const AccordionItem = (index) => ({
  open: false,
  resizeObserver: null,
  
  init() {
    this.open = this.selected === index;
    
    // Set up resize observer to watch content changes
    this.resizeObserver = new ResizeObserver(() => {
      if (this.open) {
        this.$refs.container.style.maxHeight = this.$refs.container.scrollHeight + 'px';
      }
    });
    
    this.resizeObserver.observe(this.$refs.content);
  },
  
  toggle() {
    this.selected = this.selected === index ? null : index;
  },
  
  updateHeight() {
    if (this.open) {
      // Set initial height to auto to let masonry calculate
      this.$refs.container.style.maxHeight = 'none';
      
      setTimeout(() => {
        if (window.MasonryLayout) {
          window.MasonryLayout.refreshAll();
        }
        
        // ResizeObserver will handle the height update
        setTimeout(() => {
          this.$refs.container.style.maxHeight = this.$refs.container.scrollHeight + 'px';
        }, 100);
      }, 10);
    } else {
      this.$refs.container.style.maxHeight = '0px';
      setTimeout(() => {
        if (window.MasonryLayout) {
          window.MasonryLayout.refreshAll();
        }
      }, 350);
    }
  }
});

// Make it globally accessible for Alpine.js
window.AccordionItem = AccordionItem;