<?php

namespace app\controllers;
use app\models\Test;
use yii\web\Controller;
class IndexController extends Controller{

    /**
     * 创建一个index方法
     */
    public function actionIndex(){
    }

    public function actionList(){
        echo "list";
    }
}
