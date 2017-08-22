<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2017/7/26
 * Time: 14:35
 */

namespace app\controllers\common;

use yii\web\Controller;
use yii;

class BaseController extends  Controller
{
    //同意获取POST参数
    public function post($key,$default=""){
        return yii::$app->request->post($key,$default);
    }

    //同意获取GET参数
    public function get($key,$default=""){
        return yii::$app->request->get($key,$default);
    }

    public function renderJson($data = [],$msg = "ok",$code="200" ){
        header('Content-type:application/json');//设置头部内容格式
        echo json_encode([
            'data' => $data,
            'msg'  => $msg,
            'code' => $code,
            'req_id' => uniqid(),
        ]);
        return Yii::$app->end();//终止请求直接返回
    }

}