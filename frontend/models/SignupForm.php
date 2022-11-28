<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот никнейм уже успользуется'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Эта почта уже используется'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['role', 'required'],
            ['role', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail()
    {
        Yii::$app->mailer->compose()
            ->setFrom(['info@myforce.ru' => 'ADS.FORCE - экосистема для бизнеса'])
            ->setTo($this->email)
            ->setSubject('Регистрация в ADS.FORCE, ваш пароль и ссылка на личный кабине')
            ->setTextBody('Текст сообщения')
            ->setHtmlBody("<a href='http://ads-force/register/signup-confirm?email={$this->email}&role={$this->role}'>http://ads-force/register/signup-confirm</a>")
            ->send();
    }
}
