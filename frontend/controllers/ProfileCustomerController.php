<?php

namespace frontend\controllers;

use console\models\Customer;
use console\models\News;
use console\models\Reviews;
use console\models\Support;
use console\models\SupportMessage;
use console\models\Tasks;
use console\models\User;
use PDO;
use Yii;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

class ProfileCustomerController extends AccessController
{
    public $layout = 'profileCustomer';

    public function actionIndex()
    {
        $user = User::find()->where(['id' => Yii::$app->getUser()->getId()])
            ->asArray()
            ->one();

        return $this->render('index', compact('user'));
    }

    public function actionProfileFreelancer()
    {
        return $this->render('profile-freelancer');
    }

    public function actionProfilePrivate()
    {
        $user_id = Yii::$app->getUser()->getId();
        $info = Customer::find()
            ->asArray()
            ->where(['user_id' => $user_id])
            ->one();
        $reviews = Reviews::find()
            ->with('info')
            ->asArray()
            ->where(['about_id' => $user_id])
            ->all();
        $tasks = Tasks::find()
            ->asArray()
            ->where(['author_id' => $user_id])
            ->andWhere(['status' => Tasks::STATUS_FREE])
            ->all();

        return $this->render('profile-private', compact('info', 'reviews', 'tasks'));
    }

    public function actionSaveSkills()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user_id = Yii::$app->getUser()->getId();
        $info = Customer::find()
            ->where(['user_id' => $user_id])
            ->one();
        if (empty($_POST['skill'])){
            return ['status' => false, 'message' => 'Укажите ваш навык'];
        }
        $skills = !empty($info->skils) ? json_decode($info->skils, 1) : [];
        $skills[] = $_POST['skill'];
        $info->skils = json_encode($skills, JSON_UNESCAPED_UNICODE);
        if ($info->update() !== false){
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения данных'];
        }
    }

    public function actionSaveAbout()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user_id = Yii::$app->getUser()->getId();
        $info = Customer::find()
            ->where(['user_id' => $user_id])
            ->one();
        if (empty($_POST['about'])) {
            return ['status' => false, 'message' => 'Нельзя указывать пустое значение'];
        }
        $info->about = $_POST['about'];
        if ($info->update() !== false){
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения данных'];
        }
    }

    public function actionSaveInformation()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user_id = Yii::$app->getUser()->getId();
        $info = Customer::find()
            ->where(['user_id' => $user_id])
            ->one();
        if (empty($_POST['information'])) {
            return ['status' => false, 'message' => 'Нельзя указывать пустое значение'];
        }
        $info->information = $_POST['information'];
        if ($info->update() !== false){
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения данных'];
        }
    }

    public function actionProfilePaymentInfo()
    {
        return $this->render('profile-payment-info');
    }

    public function actionProfileChat()
    {
        return $this->render('profile-chat');
    }

    public function actionProfileChatPrivate()
    {
        return $this->render('profile-chat-private');
    }

    public function actionProfileSeetings()
    {
        $info = Customer::find()
            ->where(['user_id' => Yii::$app->getUser()->getId()])
            ->asArray()
            ->one();
        return $this->render('profile-seetings', compact('info'));
    }

    public function actionSavePhoto()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($_FILES['file']['size'] > 5242880) {
            return ['status' => false, 'message' => 'Размер фото не должен превышать 5 мегабайт'];
        }
        $user_id = Yii::$app->getUser()->getId();
        $url = "/img/user-photo/{$user_id}";
        $uploadfile = $url . '/' . basename($_FILES['file']['name']);
        $info = Customer::findOne(['user_id' => $user_id]);
        if (!file_exists('../web' . $url)) {
            mkdir('../web' . $url);
        }
        $files = scandir('../web' . $url);

        if (!empty($files[2])) {
            unlink('../web'.$url.'/'.$files[2]);
        }
        if (move_uploaded_file($_FILES['file']['tmp_name'], '../web' . $uploadfile)) {
            $info->photo = $uploadfile;
            if ($info->update() !== false){
                return ['status' => true];
            } else {
                return ['status' => false, 'message' => 'Ошибка обновления данных'];
            }
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения файла'];
        }
    }

    public function actionSaveProfile()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user_id = Yii::$app->getUser()->getId();
        if (empty($_POST['fio']) && empty($_POST['phone'])) {
            return ['status' => false, 'message' => 'Отсутствуют обязательные параметры'];
        }
        $info = Customer::findOne(['user_id' => $user_id]);
        $info->fio = $_POST['fio'];
        $info->phone = $_POST['phone'];
        if ($info->update() !== false){
            return ['status' => true];
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения параметров'];
        }
    }

    public function actionChangePassword()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (empty($_POST['password'])){
            return ['status' => false, 'message' => 'Ведите пароль'];
        }
        if (strlen($_POST['password']) < 8){
            return ['status' => false, 'message' => 'Пароль должен быть длиной 8 символов'];
        }
        $user_id = Yii::$app->getUser()->getId();
        $user = User::findOne($user_id);
        $user->password_hash = Yii::$app->security->generatePasswordHash($_POST['password']);
        if ($user->update() !== false){
            return ['status' => true, 'message' => 'Пароль успешно изменен'];
        } else {
            return ['status' => false, 'message' => 'Ошибка обновлени пароля'];
        }
    }

    public function actionSaveFizInfo()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $arr = [
            'f' => "Фамилию",
            'i' => "Имя",
            'o' => 'Отчество',
            'addr' => 'Адрес',
        ];
        if (!empty($_POST)){
            unset($_POST['_csrf-frontend']);
            foreach ($arr as $key => $item){
                if (empty($_POST[$key])){
                    return ['status' => false, 'message' => "Укажите {$item}"];
                }
            }
        }
        $info = Customer::findOne(['user_id' => Yii::$app->getUser()->getId()]);
        $info->fiz_payment_info = json_encode($_POST, JSON_UNESCAPED_UNICODE);
        if ($info->update() !== false){
            return ['status' => true, 'message' => 'Данные плательщика сохранены'];
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения данных'];
        }
    }

    public function actionSaveJurInfo()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $arr = [
            'organization' => 'полное название организации',
            'director' => 'фио генерального директора',
            'jurAddress' => 'юридический адрес',
            'realAddress' => 'фактический адрес',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'ogrn' => 'ОГРН',
            'bik' => 'БИК',
            'check' => 'расчетный счет',
        ];
        if (!empty($_POST)){
            unset($_POST['_csrf-frontend']);
            foreach ($arr as $key => $item){
                if (empty($_POST[$key])){
                    return ['status' => false, 'message' => "Укажите {$item}"];
                }
            }
        }
        $info = Customer::findOne(['user_id' => Yii::$app->getUser()->getId()]);
        $info->jur_payment_info = json_encode($_POST, JSON_UNESCAPED_UNICODE);
        if ($info->update() !== false){
            return ['status' => true, 'message' => 'Данные плательщика сохранены'];
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения данных'];
        }
    }

    public function actionProfilePro()
    {
        return $this->render('profile-pro');
    }

    public function actionProfileTasks()
    {
        $query = Tasks::find()
            ->asArray()
            ->where(['author_id' => Yii::$app->getUser()->getId()]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $tasks = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('profile-tasks', compact('tasks', 'pages'));
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

    public function actionTechnicalSupportChat($link)
    {
        $dialog = Support::find()
            ->asArray()
            ->with('message')
            ->where(['id' => $link])
            ->andWhere(['user_id' => Yii::$app->getUser()->getId()])
            ->one();

        if (empty($dialog))
            return $this->redirect('/profile-customer/technical-support');

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

    public function actionProfileCreateTask($link = null)
    {
        if (!empty($link)) {
            $task = Tasks::find()
                ->asArray()
                ->where(['id' => $link])
                ->andWhere(['author_id' => Yii::$app->getUser()->getId()])
                ->one();
            return $this->render('profile-create-task', compact('task'));
        } else {
            return $this->render('profile-create-task');
        }
    }

    public function actionCreateTask()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user_id = Yii::$app->getUser()->getId();
        if (empty($_POST['link'])) {
            $task = Tasks::find()
                ->where(['author_id' => $user_id])
                ->andWhere(['active' => Tasks::STATUS_INACTIVE])
                ->count();
            if ($task != 0) {
                return ['status' => false, 'message' => 'Завершите создание прошлого задания или удалите его'];
            }
            if (empty($user_id) || empty($_POST['title']) || empty($_POST['about']) || empty($_POST['deadline'])) {
                return ['status' => false, 'message' => 'Отсутствуют обязательные параметры'];
            }
            $model = new Tasks();
        } else {
            $model = Tasks::find()->where(['author_id' => $user_id])->andWhere(['id' => $_POST['link']])->one();
            if (empty($model)) {
                return $this->redirect(Url::to('/profile-customer'));
            }
        }
        if (!strpos($_POST['tags'], ';')){
            return ['status' => false, 'message' => 'Теги надо перечислять через запятую'];
        }
        $model->author_id = $user_id;
        $model->title = $_POST['title'];
        $model->about_project = $_POST['about'];
        $model->deadline = $_POST['deadline'];
        $model->technical_task = !empty($_POST['tz']) ? $_POST['tz'] : null;
        $model->price = !empty($_POST['price']) ? $_POST['price'] : null;
        $model->tags = !empty($_POST['tags']) ? json_encode(explode(';', $_POST['tags']), JSON_UNESCAPED_UNICODE) : null;
        $model->status = Tasks::STATUS_FREE;
        $model->active = Tasks::STATUS_INACTIVE;
        $model->date_public = date('Y-m-d H:i:s');
        if ($model->save() || $model->update() !== false) {
            return $this->redirect(Url::to(['new-task-preview', 'link' => $model->id]));
        } else {
            return ['status' => false, 'message' => 'Ошибка сохранения'];
        }
    }

    public function actionNewTaskPreview($link)
    {
        $user_id = Yii::$app->getUser()->getId();
        $task = Tasks::find()->where(['id' => $link])->andWhere(['author_id' => $user_id])->asArray()->one();
        if (empty($task)) {
            return $this->redirect(Url::to('/profile-customer'));
        }
        return $this->render('new-task-preview', compact('task'));
    }

    public function actionSaveTask()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $user_id = Yii::$app->getUser()->getId();
        if (empty($_POST['id']) || empty($user_id)) {
            return ['status' => false, 'message' => 'Отсутствуют обязательные параметры'];
        }
        $task = Tasks::find()
            ->where(['active' => Tasks::STATUS_INACTIVE])
            ->andWhere(['author_id' => $user_id])
            ->one();
        if (empty($task)) {
            return ['status' => false, 'message' => 'У вас нет заданий в процессе создания'];
        }
        $task->active = Tasks::STATUS_ACTIVE;
        if ($task->update() !== false)
            return $this->redirect('/profile-customer/profile-tasks');
        else
            return ['status' => false, 'message' => 'Ошибка сохраннения задания'];
    }

    public function actionProfileMessage()
    {
        return $this->render('profile-message');
    }

    public function actionProfileNews()
    {
        $filter = ['AND'];

        if (!empty($_POST['date'])) {
            if ($_POST['date'] == 'all') {
                $filter = [];
            }
            if ($_POST['date'] == 'day') {
                $filter = ['>=', 'date', date('Y-m-d H:i:s', strtotime('-1 day'))];
            }
            if ($_POST['date'] == 'week') {
                $filter = ['>=', 'date', date('Y-m-d H:i:s', strtotime('-1 week'))];
            }
        }

        $query = News::find()->asArray()->where($filter);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 7]);
        $news = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('profile-news', compact('news', 'pages'));
    }

    public function actionProfileNewsPrivate($link)
    {
        $news = News::findOne(['link' => $link]);
        $newses = News::find()->asArray()->where(['!=', 'id', $news->id])->limit(3)->all();
        return $this->render('profile-news-private', compact('news', 'newses'));
    }
}
