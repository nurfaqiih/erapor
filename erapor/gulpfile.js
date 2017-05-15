var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    //welcome page only
    mix.scripts([
        'js/landing.js',
        'plugins/pricing-tables/js/main.js',
        'plugins/jquery-ui/jquery-ui.min.js',
        'plugins/pace-master/pace.min.js',
        'plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'plugins/uniform/jquery.uniform.min.js',
        'plugins/wow/wow.min.js',
        'plugins/smoothscroll/smoothscroll.js',
        'plugins/tabstylesinspiration/js/cbpfwtabs.js',
        'plugins/pricing-tables/js/main.js'
    ], 'public/js/welcome.min.js', 'resources/assets/vendor/modern')
        .styles([
            'plugins/pace-master/themes/blue/pace-theme-flash.css',
            'plugins/uniform/css/uniform.default.min.css',
            'plugins/animate/animate.css',
            'plugins/tabstylesinspiration/css/tabs.css',
            'plugins/tabstylesinspiration/css/tabstyles.css',
            'plugins/pricing-tables/css/style.css',
            'css/landing.css'
        ], 'public/css/welcome.min.css', 'resources/assets/vendor/modern')
    ;

    //main app
    mix.less('app.less')
        .scripts([
            '/jquery/dist/jquery.min.js',
            '/bootstrap/dist/js/bootstrap.min.js',
            'jquery-waypoints/lib/jquery.waypoints.js',
            'counter-up/jquery.counterup.js',
            'data-tables/js/jquery.dataTables.js',
            'data-tables/js/dataTables.bootstrap.js',
            'Chart.js/Chart.js',
            'select2/js/select2.min.js',
            'js/e-rapor.js',
            'sweetalert/dist/sweetalert.min.js',
        ],'public/js/app.js', 'resources/assets/vendor')
        .styles([
            'sweetalert.css'
        ],'public/css/e-rapor.css')
        .version([
            'public/css/app.css',
            'public/css/welcome.min.css',
            'public/css/e-rapor.css',
            'public/js/app.js',
            'public/js/welcome.min.js'
        ]);
});
