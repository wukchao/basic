<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2017/7/26
 * Time: 14:47
 */
namespace app\controllers;


use app\controllers\common\BaseController;
use app\models\User;
use app\service\UrlService;
use yii\web\Cookie;

class UserController extends  BaseController
{
    //伪登陆功能
    public function actionVLogin()
    {
        $uid = $this->get('uid','0');
        if( !$uid ){
            return $this->render( UrlService::buildUrl('/') );
        }
        //查询用户信息
        $user_info = User::find()->where(['id'=>$uid])->one();
        if(!$user_info){
            return $this->render( UrlService::buildUrl('/') );
        }
        //cookie 保存用户的登陆状态,cookie比较容易篡改，所以cookie要加密 规则：user_auth_token +"#" +uid
      /*  $auth_token = md5($user_info['id'].$user_info['name'].$user_info['email'].$_SERVER['HTTP_USER_AGENT']);
        $cookie = \Yii::$app->response->cookies;
        $cookie->add(new Cookie([
           "name" => "chaogege",
           "value" => $auth_token.$user_info['uid'],
        ]));*/
        $this->createLoginStatus($user_info);
        return $this->redirect(UrlService::buildUrl('/'));
    }


}