document.addEventListener('alpine:init', () => {
  Alpine.store('menu', {
    isOpen: false
  });
  
  Alpine.data('headerScroll', () => ({
    scrollY: 0,
    lastScrollY: 0,
    headerVisible: true,
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
        
        // Show header if scrolling up or at the top
        if (this.scrollY < this.lastScrollY || this.scrollY <= 100) {
          this.headerVisible = true;
        } 
        // Hide header if scrolling down and past a threshold
        else if (this.scrollY > this.lastScrollY && this.scrollY > 100) {
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