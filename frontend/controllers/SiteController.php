<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use console\models\Categories;
use console\models\Performers;
use console\models\Reviews;
use console\models\SuccessStories;
use console\models\Tasks;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $categories = Categories::find()->asArray()->all();
        $performers = Performers::find()->asArray()->limit(6)->all();
        $reviews = Reviews::find()->limit(12)->with('info')->asArray()->all();
        return $this->render('index', compact(
            'categories',
            'performers',
            'reviews'
        ));
    }

    public function actionForCustomer()
    {
        $categories = Categories::find()->asArray()->all();
        $performers = Performers::find()->asArray()->limit(6)->all();
        $reviews = Reviews::find()->limit(12)->with('info')->asArray()->all();
        return $this->render('for-customer', compact(
            'categories',
            'performers',
            'reviews'
        ));
    }
    public function actionTasks()
    {

        $filter = ['AND'];
        if (!empty($_GET['fromPrice']))
            $filter[] = ['>=', 'price', $_GET['fromPrice']];

        if (!empty($_GET['toPrice']))
            $filter[] = ['<=', 'price', $_GET['toPrice']];

        if (!empty($_GET['skils']))
            foreach ($_GET['skils'] as $val)
                $filter[] = ['like', 'tags', "%{$val}%", false];


        $query = Tasks::find()
            ->asArray()
            ->where(['OR', ['status' => 'Свободен'], ['status' => 'Повышенный спрос']])
            ->andWhere(['active' => true])
            ->andWhere($filter);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => !empty($_GET['pageSize']) ? $_GET['pageSize'] : 5]);
        $tasks = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $category = Categories::find()
            ->with('subCategories')
            ->asArray()
            ->all();

        return $this->render('tasks', compact('category', 'tasks', 'pages'));
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPerformersPage()
    {
        $categories = Categories::find()->with('subCategories')->asArray()->all();
        $query = Performers::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => !empty($_GET['pageSize']) ? $_GET['pageSize'] : 1]);
        $performers = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('performers-page', compact('categories', 'performers', 'pages'));
    }

    public function actionTaskPage($id)
    {
        $task = Tasks::find()
            ->where(['active' => 1])
            ->andWhere(['OR', ['status' => 'Свободен'], ['status' => 'Повышенный спрос']])
            ->andWhere(['id' => $id])
            ->one();
        if (empty($task)) {
            return $this->redirect(Url::to(['/tasks']));
        }

        if (!empty($_COOKIE['Views'])) {
            $cookie = $_COOKIE['Views'];
            $array = json_decode($cookie, true);
            if (!in_array($id, $array)) {
                $array[] = $id;
                $cookie = json_encode($array, JSON_UNESCAPED_UNICODE);
                setcookie('Views', $cookie, time() + 3600 * 24 * 365 * 10, '/');
                $task->views = $task->views + 1;
                $task->update();
            }
        } else {
            $cookLink = json_encode([$id], JSON_UNESCAPED_UNICODE);
            setcookie('Views', $cookLink, time() + 3600 * 24 * 365 * 10, '/');
            $task->views = $task->views + 1;
            $task->update();
        }

        return $this->render('task-page', compact('task'));
    }

    public function actionWhyWe()
    {
        $stories = SuccessStories::find()->asArray()->all();
        return $this->render('why-we', compact('stories'));
    }

    public function actionShowStory()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $story = SuccessStories::find()->asArray()->where(['id' => $_POST['id']])->one();
        if (!empty($story)) {
            return ['status' => true, 'story' => $story];
        } else {
            return ['status' => false];
        }
    }

    public function actionPerformersCatalog()
    {
        $query = Categories::find()->asArray();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => !empty($_GET['pageSize']) ? $_GET['pageSize'] : 5]);
        $categories = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('performers-catalog', compact('categories', 'pages'));
    }
}
