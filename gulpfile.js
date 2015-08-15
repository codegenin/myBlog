var elixir = require('laravel-elixir');

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

    mix.styles([
        'bootstrap.min.css',
        'font-awesome.css',
        'select2.min.css',
        'jquery.dataTables.css',
    ], 'public/assets/css/application.css');

    mix.scripts([
        'jquery.js',
        'bootstrap.min.js',
        'select2.min.js',
        'jquery.dataTables.js',
    ],'public/assets/js/application.js');
});