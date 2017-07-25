<?php

namespace app\controllers;
use app\models\Test;
use yii\web\Controller;
class IndexController extends Controller{

    /**
     * 创建一个index方法
     */
    public function actionIndex(){
       $model = new Test();
       $res = $model->find()->asArray()->one();
       var_dump($res);die;
    }

    public function actionList(){
        echo "list";
    }
}
