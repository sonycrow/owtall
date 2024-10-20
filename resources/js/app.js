import './bootstrap';

import imageGenerator from "./imagegenerator.js";
Alpine.data('ImageGenerator', imageGenerator);

import.meta.glob([
    '../art/**',
    '../game/**',
    '../fonts/**',
]);
