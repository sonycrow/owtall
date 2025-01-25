import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import * as htmltoimage from 'html-to-image';
window.htmltoimage = htmltoimage;

import markdownIt from 'markdown-it';
import markdownItBlockquoteCite from 'markdown-it-blockquote-cite';
window.markdownit = markdownIt().use(markdownItBlockquoteCite);
