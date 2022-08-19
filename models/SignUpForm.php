<?php
namespace app\models;

use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [[['username', 'password', 'password_repeat'], 'required'],
        [['username', 'password', 'password_repeat'], 'string', 'min' => 4, 'max' => 16],
        ['password_repeat', 'compare', 'compareAttribute' => 'password']];

    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user -> auth_key = \Yii::$app->security->generateRandomString();

        //this boolian construction returns the save() method result and reacts on this result. If it's false will be generated an error with message 
        //Why is used VarDumper?
        if ($user -> save())
        {
            return true;
        }
        \Yii::error(message:"User was not saved. ". VarDumper::dumpAsString($user->errors));
        return false;
    }
    
}
?>