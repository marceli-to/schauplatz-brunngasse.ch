import { MasonryLayout } from '../vendor/masonry-layout.js';

// Initialize masonry for publications
const publicationsMasonry = MasonryLayout.init('#masonry-container', {
  itemSelector: '.masonry-item',
  minColumnWidth: 300,
  maxColumns: 2,
  gutter: 18
});