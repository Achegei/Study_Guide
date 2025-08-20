import './bootstrap';
// Add these lines to import and start Alpine.js
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'; // If you're using the focus plugin or other Jetstream-related Alpine plugins

Alpine.plugin(focus); // Register any Alpine plugins you need

window.Alpine = Alpine; // This makes Alpine globally available if other scripts need it

Alpine.start(); // This line initializes Alpine.js on your page
