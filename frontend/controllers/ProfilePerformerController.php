<?php

namespace frontend\controllers;

use console\models\Support;
use console\models\SupportMessage;
use yii\web\Controller;
use console\models\User;
use Yii;
use yii\web\Response;

class ProfilePerformerController extends AccessController
{
    public $layout = 'profilePerformer';

    public function actionIndex()
    {
        $user = User::find()->where(['id' => Yii::$app->getUser()->getId()])
            ->asArray()
            ->one();
        return $this->render('index', compact('user'));
    }

    public function actionProfileSeetings()
    {
        return $this->render('profile-seetings');
    }

    public function actionProfilePrivate()
    {
        return $this->render('profile-private');
    }

    public function actionProfileTasks()
    {
        return $this->render('profile-tasks');
    }

    public function actionProfileChat()
    {
        return $this->render('profile-chat');
    }

    public function actionProfileChatPrivate()
    {
        return $this->render('profile-chat-private');
    }

    public function actionProfilePaymentInfo()
    {
        return $this->render('profile-payment-info');
    }

    public function actionProfilePro()
    {
        return $this->render('profile-pro');
    }

    public function actionTechnicalSupport()
    {
        $dialogs = Support::find()
            ->asArray()
            ->where(['user_id' => Yii::$app->getUser()->getId()])
            ->orderBy('status desc')
            ->all();
        return $this->render('technical-support', compact('dialogs'));
    }


    public function actionTechnicalSupportSingle()
    {
        return $this->render('technical-support-single');
    }

    public function actionCreateTiket()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (empty($_POST['theme']) || empty($_POST['message'])) {
            return ['status' => false, 'message' => 'Отсутствуют обязательные параметры'];
        }
        $model = new Support();
        $model->user_id = Yii::$app->getUser()->getId();
        $model->support_id = 0;
        $model->theme = $_POST['theme'];
        $model->status = Support::STATUS_OPEN;
        $model->date = date('Y-m-d H:i:s');
        if ($model->save()) {
            $mes = new SupportMessage();
            $mes->dialog_id = $model->id;
            $mes->is_support = SupportMessage::USER;
            $mes->date = date('Y-m-d H:i:s');
            $mes->text = $_POST['message'];
            $mes->is_read = SupportMessage::UN_READ;
            if ($mes->save()) {
                return $this->redirect(['technical-support-chat', 'link' => $model->id]);
            } else {
                return ['status' => false, 'message' => 'Ошибка сохранения сообщения'];
            }
        } else {
            return ['status' => false, 'message' => 'Ошибка создания диалога'];
        }
    }

    public function actionTechnicalSupportChat($link)
    {
        $dialog = Support::find()
            ->asArray()
            ->with('message')
            ->where(['id' => $link])
            ->andWhere(['user_id' => Yii::$app->getUser()->getId()])
            ->one();

        if (empty($dialog))
            return $this->redirect('/profile-performer/technical-support');

        return $this->render('technical-support-chat', compact('dialog'));
    }


    public function actionSendMessage()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (empty($_POST['message']) || empty($_POST['dialog_id'])) {
            return ['status' => false, 'message' => 'Отсутствуют обязательные параметры'];
        }
        $model = new SupportMessage();
        $model->dialog_id = $_POST['dialog_id'];
        $model->is_support = SupportMessage::USER;
        $model->date = date('Y-m-d H:i:s');
        $model->text = $_POST['message'];
        $model->attachments = null;
        $model->is_read = SupportMessage::UN_READ;
        if ($model->save()) {
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => 'Ошибка отправки сообщения'];
        }
    }

    public function actionProfileMessage()
    {
        return $this->render('profile-message');
    }

    public function actionProfileNews()
    {
        return $this->render('profile-news');
    }

    public function actionProfileNewsPrivate()
    {
        return $this->render('profile-news-private');
    }

    public function actionCreatePortfolio()
    {
        return $this->render('create-portfolio');
    }

    public function actionNewTaskPreview()
    {
        return $this->render('new-task-preview');
    }
}

?>