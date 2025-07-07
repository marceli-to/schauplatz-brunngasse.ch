import { MasonryLayout } from '../vendor/masonry-layout.js';

// Make MasonryLayout globally accessible
window.MasonryLayout = MasonryLayout;

// Initialize masonry for publications
const publicationsMasonry = MasonryLayout.init('#masonry-container', {
  itemSelector: '.masonry-item',
  minColumnWidth: 300,
  maxColumns: 2,
  gutter: 18
});