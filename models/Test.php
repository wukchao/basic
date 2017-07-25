<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2017/7/25
 * Time: 17:34
 */

namespace app\models;
use yii\db\ActiveRecord;


class Test extends  ActiveRecord
{
    public  static  function  tableName()
    {
        return "{{%test}}";
    }
}