document.addEventListener('alpine:init', () => {
  Alpine.store('menu', {
    isOpen: false
  });
  
  Alpine.data('headerScroll', () => ({
    scrollY: 0,
    lastScrollY: 0,
    headerVisible: true,
    offset: 300,
    scrollUpThreshold: 100, // ⬅️ minimum pixels to scroll up before showing header
  
    init() {
      this.scrollY = window.pageYOffset;
      this.lastScrollY = this.scrollY;
  
      window.addEventListener('scroll', () => {
        this.scrollY = window.pageYOffset;
  
        // Don't hide header if menu is open
        if (this.$store.menu.isOpen) {
          this.headerVisible = true;
          this.lastScrollY = this.scrollY;
          return;
        }
  
        const scrollDelta = this.scrollY - this.lastScrollY;
  
        // Show header only if scrolling up significantly or near the top
        if ((scrollDelta < -this.scrollUpThreshold) || this.scrollY <= this.offset) {
          this.headerVisible = true;
        } 
        // Hide header if scrolling down and past offset
        else if (scrollDelta > 0 && this.scrollY > this.offset) {
          this.headerVisible = false;
        }
  
        this.lastScrollY = this.scrollY;
      });
    }
  }));
  
  
  Alpine.data('menuToggle', () => ({
    get isOpen() {
      return this.$store.menu.isOpen;
    },
    
    toggle() {
      this.$store.menu.isOpen = !this.$store.menu.isOpen;
    }
  }));
});