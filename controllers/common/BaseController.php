<?php
<<<<<<< Updated upstream
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2017/7/26
 * Time: 14:35
 */

namespace app\controllers\common;

=======
namespace app\controllers\common;

use app\models\User;
use app\service\UrlService;
>>>>>>> Stashed changes
use yii\web\Controller;
use yii;

class BaseController extends  Controller
{
<<<<<<< Updated upstream
=======
    protected  $auth_cookie_name = "chaogege";

    protected  $allowAllAction = [
        'user/login'
    ];

    //本系统所有的页面在登录之后才能访问，在框架中加入统一的验证方法
    public function beforeAction($action)
    {
       $loginStatus = $this->checkLoginStatus();
       if ( !$loginStatus && !in_array( $action->uniqueId,$this->allowAllAction ) ) {
           if ( Yii::$app->request->isAjax ) {
               $this->renderJson([],'未登录返回用户中心',-302);
           } else {
                $this->redirect( UrlService::buildUrl("user/login")); //返回登陆页面
           }
           return false;
       }
       return true;

    }

>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======
    //验证登录是否有效 返回true or false
    protected function checkLoginStatus(){
        $request = yii::$app->request;
        $cookies = $request->cookies;
        $auth_cookies = $cookies->get( $this->get_cookie_name );
        if( !$auth_cookies ){
            return false;
        }
        list( $auth_token,$uid ) = explode('#',$auth_cookies );
        if ( !$auth_token || !$uid) {
            return false;
        }
        if ($uid && preg_match('/^\d+$/',$uid ) ){
            $userInfo = User::findOne(['id'=>$uid]);
            if ( !$userInfo ) {
                return false;
            }

            //校验码
            if ( $auth_token != $this->createAuthToken( $userInfo['uid'],$userInfo['name'],$userInfo['email'],$_SERVER['HTTP_USER_AGENT'])){
                return false;
            }

            return true;
        }

    }

    //设置登录的cookie
    protected function createLoginStatus( $userInfo ){
        $auth_token = $this->createAuthToken( $userInfo['id'],$userInfo['name'],$userInfo['email'],$_SERVER['HTTP_USER_AGENT']);
        $cookies = Yii::$app->request->cookies;
        $cookies->add(
            new yii\web\Cookie([
                'name' => $this->auth_cookie_name,
                'value' => $auth_token.'#'.$userInfo['id'],
            ])
        );
    }

    //用户相关信息的生成和加密校验码函数
    public function createAuthToken( $uid,$name,$email,$user_agent ){
        return md5($uid.$name,$email,$user_agent);
    }

>>>>>>> Stashed changes
}