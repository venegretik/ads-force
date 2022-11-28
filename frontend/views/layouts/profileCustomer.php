<?php

/** @var \yii\web\View $this */
/** @var string $content */

use console\models\News;
use console\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ProfileCustomerAsset;

$user = User::find()->where(['id' => Yii::$app->getUser()->getId()])
    ->with('balance')
    ->asArray()
    ->one();

$news = News::find()->asArray()->limit(3)->all();

ProfileCustomerAsset::register($this);
$js = <<< JS
$('.chat-hide').click(function(e){
    $('.chat-hide').fadeOut(300);
    $('.chat-show').fadeIn(300);
});
$('.chat-close').click(function(e){
    $('.chat-show').fadeOut(300);
    $('.chat-hide').fadeIn(300);
});
$('.avtorize-header').click(function (e) {
    if($(this).parent().find('.avtorize-modal').css('display') == "block"){
        $(this).parent().find('.avtorize-modal').fadeOut(300);
        $('.avtorize-content-top').find('img').css({'transform':'rotate(0deg)'})
    }
    else{
        $(this).parent().find('.avtorize-modal').fadeIn(300);
        $('.avtorize-content-top').find('img').css({'transform':'rotate(-180deg)'})
    }
})
$(document).ready(function(){
    let darkTheme = window.localStorage.getItem('dark-theme');
    console.log(darkTheme);
    if(darkTheme == 'false' || !darkTheme){
        $('.dark-bg').css({'display':'none'});
        $('.sun').css({'display':'flex'});
        document.documentElement.style.setProperty('--text', '#fff');
        document.documentElement.style.setProperty('--background-white', '#414C94');
        document.documentElement.style.setProperty('--background-chat-message', '#0A0B2D');
        $('body').addClass('bg-dark');
    }
    else if(darkTheme == 'true'){
        $('.dark-bg').css({'display':'flex'});
        $('.sun').css({'display':'none'});
        document.documentElement.style.setProperty('--text', '#1F1F1F');
        document.documentElement.style.setProperty('--background-white', '#ffffff');
        document.documentElement.style.setProperty('--background-chat-message', '#ffffff');
        $('body').removeClass('bg-dark');
    }
$('.dark-bg').click(function(e){
    let darkTheme = window.localStorage.getItem('dark-theme');
    if(darkTheme == 'false' || !darkTheme){
        $('.dark-bg').css({'display':'flex'});
        $('.sun').css({'display':'none'});
        document.documentElement.style.setProperty('--text', '#1F1F1F');
        document.documentElement.style.setProperty('--background-white', '#ffffff');
        document.documentElement.style.setProperty('--background-chat-message', '#ffffff');
        localStorage.setItem('dark-theme', 'true');
        $('body').removeClass('bg-dark');
    }
    if(darkTheme == 'true'){
        $('.dark-bg').css({'display':'none'});
        $('.sun').css({'display':'flex'});
        document.documentElement.style.setProperty('--text', '#fff');
        document.documentElement.style.setProperty('--background-white', '#414C94');
        document.documentElement.style.setProperty('--background-chat-message', '#0A0B2D');
        localStorage.setItem('dark-theme', 'false');
        $('body').addClass('bg-dark');
    }
});
});
JS;
$this->registerJs($js);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header>
            <div class="header__container">
                <div class="header-main">
                    <div class="logo-lang">
                        <div class="header__menu">
                            <input id="menu__toggle" type="checkbox">
                            <label class="menu__btn" for="menu__toggle">
                                <span></span>
                            </label>
                            <ul class="menu__box">
                                <input id="menu__toggle-inner" type="checkbox" checked>
                                <label class="menu__btn" for="menu__toggle">
                                    <span></span>
                                </label>
                                <div class="entry dis-none-header">
                                    <div class="login">Вход</div>
                                    <div class="registration">Регистрация</div>
                                </div>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['/']) ?>">Заказчику</a>
                                </li>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['/for-customer']) ?>">Исполнителю</a>
                                </li>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['/why-we']) ?>">Почему ADS.FORCE</a>
                                </li>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['/']) ?>">Разместить заказ</a>
                                </li>
                            </ul>
                        </div>
                        <a href="<?= Url::to(['/']) ?>">
                            <div class="logo">ADSFORCE</div>
                        </a>

                        <div class="language">
                            <span>Eng</span> <span>|</span> <img src="<?= Url::to(['img/footer-header/language-en.webp']) ?>" alt="logo">
                        </div>
                    </div>

                    <div class="links">
                        <div class="link">
                            <a href="<?= Url::to(['/']) ?>">Заказчику</a>
                        </div>
                        <div class="link">
                            <a href="<?= Url::to(['/for-customer']) ?>">Исполнителю</a>
                        </div>
                        <div class="link">
                            <a href="<?= Url::to(['/why-we']) ?>">Почему ADS.FORCE</a>
                        </div>
                        <div class="link">
                            <a href="<?= Url::to(['/']) ?>">Разместить заказ</a>
                        </div>

                    </div>

                    <div class="entry dis-none-header">
                        <!--Отключаеться когда пользователь зашел(добавить класс: dis-none-header)-->
                        <div class="login">Вход</div>
                        <div class="registration">Регистрация</div>
                    </div>
                    <div class="avtorize-modal-container">
                        <div class="avtorize-header">
                            <div class="avtorize-header-img">
                                <img src="<?= Url::to(['img/footer-header/profile-icon.svg']) ?>" alt="">
                            </div>
                            <div class="avtorize-content">
                                <div class="avtorize-content-top">
                                    <h2 class="Font-size18"><?= $user['username'] ?></h2>
                                    <img src="<?= Url::to(['img/footer-header/arrow-icon.svg']) ?>" alt="">
                                </div>
                                <p class="Font-size18 main_color_text">заказчик</p>
                            </div>
                        </div>
                        <div class="avtorize-modal white_color_bg">
                            <div class="left-navbar-top">
                                <div class="hello-user">
                                    <img src="<?= Url::to(['img/profile/profile-meneger/hand.svg']) ?>" alt="">
                                    <h2 class="Font-size24 main_color_text">Привет, <?= $user['username'] ?></h2>
                                </div>
                                <div class="balance-user">
                                    <p class="Font-size18 main_color_text">Баланс: <?= $user['balance']['balance'] ?> руб.</p>
                                </div>
                                <a href="<?= Url::to(['profile-payment-info']) ?>" class="button-add-balance Font-size18">Пополнить</a>
                            </div>
                            <ul>
                                <li>
                                    <a href="<?= Url::to(['profile-private']) ?>">
                                        <img src="<?= Url::to(['img/footer-header/user-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Мой кабинет</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-tasks']) ?>">
                                        <img src="<?= Url::to(['img/footer-header/doc-link-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Мои задания/ работы</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-message']) ?>"><img src="<?= Url::to(['img/profile/profile-meneger/message-link.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Уведомления</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-chat']) ?>">
                                        <img src="<?= Url::to(['img/profile/profile-meneger/message-link-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Сообщения</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-freelancer']) ?>">
                                        <img src="<?= Url::to(['img/profile/profile-meneger/add-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Найти исполнителя</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-payment-info']) ?>">
                                        <img src="<?= Url::to(['img/footer-header/payment-link-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Финансы</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-pro']) ?>"><img src="<?= Url::to(['img/profile/profile-meneger/partners-link-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Партнерская программа</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['technical-support']) ?>"><img src="<?= Url::to(['img/profile/profile-meneger/help-link-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Служба поддержки</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-seetings']) ?>"><img src="<?= Url::to(['img/profile/profile-meneger/seetings-link-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Настройки</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/register/logout']) ?>"><img src="<?= Url::to(['img/profile/profile-meneger/exit-icon.svg']) ?>" alt="">
                                        <p class="Font-size18 main_color_text">Выйти</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- появляется при > 1024px-->
                    <div class="header__menu dis-none-header">
                        <!--Отключаеться когда пользователь зашел(добавить класс: dis-none-header)-->
                        <input id="menu__toggle" type="checkbox">
                        <label class="menu__btn" for="menu__toggle">
                            <span></span>
                        </label>
                        <ul class="menu__box">
                            <input id="menu__toggle-inner" type="checkbox" checked>
                            <label class="menu__btn" for="menu__toggle">
                                <span></span>
                            </label>
                            <div class="entry dis-none-header">
                                <div class="login">Вход</div>
                                <div class="registration">Регистрация</div>
                            </div>
                            <li>
                                <a class="menu__item" href="<?= Url::to(['/']) ?>">Заказчику</a>
                            </li>
                            <li>
                                <a class="menu__item" href="<?= Url::to(['/for-customer']) ?>">Исполнителю</a>
                            </li>
                            <li>
                                <a class="menu__item" href="<?= Url::to(['/why-we']) ?>">Почему ADS.FORCE</a>
                            </li>
                            <li>
                                <a class="menu__item" href="">Разместить заказ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="header-search dis-none-header">
                    <div class="search__container search">
                        <img src="<?= Url::to(['img/footer-header/search.webp']) ?>" alt="">
                        <input type="text" placeholder="Поиск">
                    </div>
                </div>

            </div>
        </header>

        <main role="main" style="position:relative;" class="flex-shrink-0">
            <div class="Profile-container">
                <h1 class="title_color Font-size36">Личный кабинет заказчика</h1>
                <div class="Profile-full">
                    <section class="left-navbar">
                        <div class="left-navbar-top">
                            <div class="hello-user">
                                <img src="<?= Url::to(['img/profile/profile-meneger/hand.svg']) ?>" alt="">
                                <h2 class="Font-size24 main_color_text">Привет, <?= $user['username'] ?></h2>
                                <img src="<?= Url::to(['img/profile/profile-meneger/night.svg']) ?>" class="dark-bg" alt="">
                                <img src="<?= Url::to(['img/profile/profile-meneger/sun-icon.svg']) ?>" class="dark-bg sun" alt="">
                            </div>
                            <div class="balance-user">
                                <p class="Font-size18 main_color_text">Баланс: <?= $user['balance']['balance'] ?> руб.</p>
                            </div>
                            <a href="<?= Url::to(['profile-payment-info']) ?>" class="button-add-balance Font-size18">Пополнить</a>
                        </div>
                        <div class="left-navbar-bottom">
                            <ul>
                                <li>
                                    <a href="<?= Url::to(['profile-private']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-private' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/user-icon.svg']) ?>" alt="">Моя страница</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-message']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-message' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/message-link.svg']) ?>" alt="">
                                        Уведомления
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-tasks']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-tasks' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/doc-link-icon.svg']) ?>" alt="">Мои заказы</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-chat']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-chat' || Yii::$app->controller->action->id === 'profile-chat-private' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/message-link-icon.svg']) ?>" alt="">Сообщения</a>
                                    <div class="circle-message">
                                        <p class="white_color">12</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-freelancer']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-freelancer' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/performers-link-icon.svg']) ?>" alt="">Мои исполнители</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-payment-info']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-payment-info' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/payment-link-icon.svg']) ?>" alt="">Финансы</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-pro']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-pro' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/partners-link-icon.svg']) ?>" alt="">Партнерская программа</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['technical-support']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'technical-support-chat' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/help-link-icon.svg']) ?>" alt="">Служба поддержки</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['profile-seetings']) ?>" class="Font-size24 main_color_text <?= Yii::$app->controller->action->id === 'profile-seetings' ? 'active-link' : '' ?>"><img src="<?= Url::to(['img/profile/profile-meneger/seetings-link-icon.svg']) ?>" alt="">Настройки</a>
                                </li>
                            </ul>
                        </div>
                        <div class="left-nav-bar-news">
                            <div class="news-title">
                                <img src="<?= Url::to(['img/profile/profile-meneger/news-icon.svg']) ?>" alt="">
                                <h2 class="Font-size24 main_color_text">Новости проекта</h2>
                            </div>
                            <div class="news-list">
                                <ul>
                                    <?php if (!empty($news)) : ?>
                                        <?php foreach ($news as $value) : ?>
                                            <li>
                                                <a style="display: flex; align-items: center; gap: 5px" href="<?= Url::to(['profile-news-private', 'link' => $value['link']]) ?>">
                                                    <p class="date-news Font-size18 white_color"><?= date('d.m', strtotime($value['date'])) ?></p>
                                                    <p class="Font-size18 main_color_text">Статья «<?= $value['title'] ?>»</p>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                                <a href="<?= Url::to(['profile-news']) ?>" class="more-news Font-size18 title_color">Еще + </a>
                            </div>
                        </div>
                    </section>
                    <?= $content ?>
                </div>
                <div class="chat">
                    <div class="chat-hide">
                        <img src="<?= Url::to(['/img/index/rewievImg.png']) ?>" alt="">
                        <div>
                            <h2>Иванов Иван</h2>
                            <p>Онлайн-поддержка ADSFORCE</p>
                        </div>
                    </div>
                    <div class="chat-show">
                        <div class="chat-show-header">
                            <img src="<?= Url::to(['/img/index/rewievImg.png']) ?>" alt="">
                            <p>Онлайн-поддержка ADSFORCE</p>
                            <div class="chat-close">
                                &times;
                            </div>
                        </div>
                        <div class="message-chat">
                            <div class="message-container">
                                <div class="message-tehpod">
                                    <div class="message-title">
                                        <img src="<?= Url::to(['/img/index/rewievImg.png']) ?>" alt="">
                                        <div class="message-main-content">
                                            <div class="message-title-text">
                                                <h2>Иванов Иван</h2>
                                                <p>оператор чата</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content-text">
                                        <p>Здравствуйте! Буду рад Вам помочь по любому вопросу. </p>
                                    </div>
                                    <div class="message-content-text">
                                        <p>Здравствуйте! Буду рад Вам помочь по любому вопросу. </p>
                                    </div>
                                    <div class="message-content-text">
                                        <p>Здравствуйте! Буду рад Вам помочь по любому вопросу. </p>
                                    </div>
                                </div>
                                <p class="dont-empty-form">Заполните данные ниже для продолжения диалога</p>
                                <form action="">
                                    <input type="text" name="name" placeholder="Ваше имя">
                                    <input type="tel" name="telephone" placeholder="Номер телефона">
                                    <input type="email" name="email" placeholder="E-mail">
                                </form>
                            </div>
                            <div class="input-message-block">
                                <div class="input-message-relative">
                                    <input type="text" class="input-message" placeholder="Сообщение">
                                    <div class="left-buttons">
                                        <img src="<?= Url::to(['img/profile/profile-chat/chat-smile.svg']) ?>" alt="">
                                    </div>
                                    <div class="right-buttons">
                                        <img src="<?= Url::to(['img/profile/profile-chat/img-send.svg']) ?>" alt="">
                                        <img src="<?= Url::to(['img/profile/profile-chat/send-message.svg']) ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="mt-auto">
            <div class="footer__container">
                <div class="footer-main">
                    <div class="logo-feedback">
                        <div class="logo-lang">
                            <div class="logo">ADSFORCE</div>
                            <div class="language">
                                <span>Eng</span> <span>|</span> <img src="<?= Url::to(['img/footer-header/language-en.webp']) ?>" alt="logo">
                            </div>
                        </div>
                        <div class="contacts-mobile">
                            <div class="contacts-mobile__phone">
                                <img src="<?= Url::to(['img/footer-header/phone-mobile.webp']) ?>" alt="">
                                <a href="tel:8 945 118 39 34" class="contacts__tel">8 945 118 39 34</a>
                            </div>
                            <div class="contacts-mobile__email">
                                <img src="<?= Url::to(['img/footer-header/email-mobile.webp']) ?>" alt="">
                                <a href="mailto:general@myforce.ru" class="contacts__email">general@myforce.ru</a>
                            </div>
                        </div>
                        <div class="feedback-text">Если у вас возникли какие-либо вопросы, мы с радостью поможем</div>
                        <button class="footer-btn">Обратная связь</button>
                        <div class="personal-data">
                            *отправляя формы на данном сайте, вы даёте согласие на обработку персональных данных
                            в соответствии с 152-ФЗ
                        </div>
                    </div>

                    <div class="footer__links">
                        <div class="links__left-column">
                            <div class="link">
                                <a href="<?= Url::to(['/']) ?>">Заказчику</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['/for-customer']) ?>">Исполнителю</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['/why-we']) ?>">Почему ADS.FORCE</a>
                            </div>
                            <div class="link">
                                <a href="">Быстрый старт</a>
                            </div>
                        </div>

                        <div class="links__right-column">
                            <div class="link">
                                <a href="<?= Url::to(['/performers-page']) ?>">ТОП — исполнителей</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['/performers-catalog']) ?>">Каталог исполнителей</a>
                            </div>
                            <div class="link">
                                <a href="">Специализации</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['profile-performer/profile-private']) ?>">Отзывы</a>
                            </div>
                        </div>

                    </div>

                    <div class="info__other">
                        <div class="entry dis-none-header">
                            <div class="login">Вход</div>
                            <div class="registration">Регистрация</div>
                        </div>
                        <div class="info__contacts">
                            <a href="tel:8 945 118 39 34" class="contacts__tel">8 945 118 39 34</a>
                            <a href="mailto:general@myforce.ru" class="contacts__email">general@myforce.ru</a>
                            <div class="contacts-icons">
                                <a href="https://t.me/gsilver27" target="_blank">
                                    <img src="<?= Url::to(['img/footer-header/telegram.webp']) ?>" alt="Telegram">
                                </a>
                                <a href="" target="_blank">
                                    <img src="<?= Url::to(['img/footer-header/instagram.webp']) ?>" alt="Instagram">
                                </a>
                            </div>
                        </div>
                        <div class="info__other">
                            <div>ИНН: 6167130086</div>
                            <div>ОГРН: 1156196049415</div>
                            <div class="policy">
                                <a href="">Политика конфиденциальности</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
