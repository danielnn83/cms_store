<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace frontend\assets;

use yii\web\AssetBundle;
/**
 * Application asset for the front end
 *
 * @package frontend\assets
 */
class AppAsset extends AssetBundle
{    
    public $basePath    = '@webroot';
    public $baseUrl     = '@web';
    
    public $css = [
        'css/style.css',
        'css/stylesheet.css',
        'css/bootstrap-theme.css',
        'lib/css/nivo-slider.css',
        'css/core.css',
        'css/shortcode/shortcodes.css',
        'css/responsive.css',
        'css/color/color-core.css',
        'css/custom.css',
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        "//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext"
    ];
    public $js = [
        'js/application.js',
        'js/vendor/modernizr-2.8.3.min.js',
        //'js/vendor/jquery-3.1.1.min.js',
        'js/bootstrap.min.js',
        'lib/js/jquery.nivo.slider.js',
        'js/plugins.js',
        'js/main.js'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'usni\fontawesome\FontAwesomeAsset'
    ];
}
