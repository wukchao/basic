<?php

namespace app\controllers;
use app\models\Test;
use yii\web\Controller;
class IndexController extends Controller{

    /**
     * 创建一个index方法
     */
    public function actionIndex(){

        $url = "http://home.bd.yewifi.com/backend/check/get-check-list";
        $ch =curl_init();
        $post_data = ['username' =>"admin","password"=>"123456"];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //post数据
       curl_setopt($ch, CURLOPT_POST, 1);
        $res = curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        var_dump($output);die;
        curl_close($ch);
        //打印获得的数据
        print_r($output);
    }

    public function actionList(){
        echo "list";
    }
}
