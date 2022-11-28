<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\User;
use console\models\Balance;
use console\models\Customer;
use console\models\Performers;
use console\models\Role;
use frontend\models\SignupForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class RegisterController extends Controller
{

    public function beforeAction($action)
    {
        $actions = [
            'signup-confirm'
        ];
        if (in_array($action->id, $actions))
            $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionCheckEmail()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user = User::findByEmail($_POST['email']);
        if (!$user)
            return ['status' => false, 'message' => 'Пользователь с такой почтой не найден'];
        else
            return ['status' => true];
    }

    public function actionSignup()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new SignupForm();
        $model->username = $_POST['username'];
        $model->email = $_POST['email'];
        $model->password = $_POST['password'];
        $model->role = $_POST['role'];
        $model->validate();
        if ($model->signup()) {
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => $model->errors];
        }
    }

    public function actionSignupConfirm($email, $role)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user = User::findByEmailCheck($email);
        $user->status = User::STATUS_ACTIVE;
        if ($user->update() !== false) {
            $model = new Balance();
            $model->user_id = $user->id;
            $model->validate();
            if ($role == Role::ROLE_CUSTOMER){
                $info = new Customer();
            } else {
                $info = new Performers();
            }
            $info->user_id = $user->id;
            $info->email = $email;
            $info->validate();
            $rol = new Role();
            $rol->user_id = $user->id;
            $rol->role = $role;
            $rol->validate();
            if ($model->save() && $info->save() && $rol->save()) {
                return $this->redirect('/');
            } else {
                return ['status' => false, 'message' => $model->errors];
            }
        } else {
            return ['status' => false, 'message' => 'Ошибка подтверждения почты'];
        }
    }

    public function actionLogin()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new LoginForm();
        $model->email = $_POST['email'];
        $model->password = $_POST['password'];
        $model->validate();
        if ($model->login()) {
            return $this->redirect('/profile-performer');
        } else {
            return ['status' => false, 'message' => $model->errors];
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/');
    }
}
