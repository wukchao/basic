<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2017/7/26
 * Time: 12:00
 */

namespace app\service;


use yii\helpers\Url;

class UrlService
{
    /**
     * 返回一个 内部链接
     * @param $uri
     * @param array $param
     * @return string
     */
    public static  function buildUrl($uri,$param = [] ){
        return Url::toRoute(array_merge([$uri],$param));

    }

    /**
     * 返回空链接
     * @return string
     */

    public static  function  buildNullUrl(){
        return "javascript:void(0);";
    }

}