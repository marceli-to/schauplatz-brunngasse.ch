import { MasonryLayout } from '../vendor/masonry-layout.js';

const masonry = MasonryLayout.init('#masonry-container', {
  itemSelector: '.masonry-item',
  minColumnWidth: 200,
  maxColumns: 2,
  gutter: 18
});