<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use app\service\UrlService;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
   /* public $css = [
        'bootstrap/css/bootstrap.css',
    ];
    public $js = [
        'jquery/jquery.min.js',
        'bootstrap/js/bootstrap.js',
    ];*/
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function registerAssetFiles($view)
    {
        //加版本号，目的：使浏览器加载最新的js和css文件
        $release = 20170707;
        $this->css = [
            UrlService::buildUrl('bootstrap/css/bootstrap.css',['v'=>$release]),
            UrlService::buildUrl('/css/app.css'),
        ];
        $this->js = [
            UrlService::buildUrl( 'jquery/jquery.min.js'),
            UrlService::buildUrl( 'bootstrap/js/bootstrap.js'),
        ];
        parent::registerAssetFiles($view);
    }
}
