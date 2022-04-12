const mix = require('laravel-mix');

mix.copy('resources/backend/assets/css', 'public/backend/css')
    .copy('resources/backend/assets/img', 'public/backend/img')
    .copy('resources/backend/assets/js', 'public/backend/js')
    .copy('resources/backend/assets/vendor', 'public/backend/vendor')
    .postCss;
