<?php


namespace frontend\controllers;


use console\models\Role;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class AccessController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['profile-customer'],
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            $user_id = \Yii::$app->getUser()->getId();
                            $role = Role::find()->where(['user_id' => $user_id])->one();
                            if (!empty($role) && $role->role === Role::ROLE_CUSTOMER){
                                return true;
                            } else {
                                return \Yii::$app->response->redirect(Url::to(['/profile-performer']));
                            }
                        }
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['profile-performer'],
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action){
                            $user_id = \Yii::$app->getUser()->getId();
                            $role = Role::find()->where(['user_id' => $user_id])->one();
                            if (!empty($role) && $role->role === Role::ROLE_PERFORMERS){
                                return true;
                            } else {
                                return \Yii::$app->response->redirect(Url::to(['/profile-customer']));
                            }
                        }
                    ],
                ],
            ],
        ];
    }
}