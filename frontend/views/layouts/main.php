<?php

/** @var \yii\web\View $this */

/** @var string $content */

use console\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;


$user = User::find()->where(['id' => Yii::$app->getUser()->getId()])
    ->with('balance')
    ->with('role')
    ->asArray()
    ->one();
if (!Yii::$app->getUser()->isGuest) {
    $user['role']['role'] === \console\models\Role::ROLE_CUSTOMER ? $role = true : $role = false;
}
$js = <<< JS

$('.Modal-close').click(function(e) {
    $('.modalRegister').fadeOut(300);
    $('body').css({'overflow':'auto'})
});

$('.regPop').click(function(e) {
    $('.modalRegister').css({'display':'flex'});
    $('body').css({'overflow':'hidden'})
});
$('.topShow').click(function(e) {
    $('.ModalPro').fadeIn(300);
    $('body').css({'overflow':'hidden'})
});
$('.chat-hide').click(function(e){
    $('.chat-hide').fadeOut(300);
    $('.chat-show').fadeIn(300);
});
$('.chat-close').click(function(e){
    $('.chat-show').fadeOut(300);
    $('.chat-hide').fadeIn(300);
});
$('.ModalClosePro').click(function(e) {
    $('.ModalPro').fadeOut(300);
    $('body').css({'overflow':'auto'})
});
$('.ModalPro .buttonClick').click(function(e) {
    if($('.Freelancer-content-buttons-black-img').css('display') == "none"){
    $(this).addClass('Freelancer-content-buttons-black');
    $(this).removeClass('Freelancer-content-buttons-main');
    $('.Freelancer-content-buttons-black-img').css({'display':'block'});
    $('.Freelancer-content-buttons-main-img').css({'display':'none'});
    $('.buttonClick a button p').html('Заказчику');
    $('.PerformerModalPro').fadeOut(0);
    $('.CustomerModalPro').fadeIn(300);
    }
    else if($('.Freelancer-content-buttons-black-img').css('display') == "block"){
    $(this).addClass('Freelancer-content-buttons-main');
    $(this).removeClass('Freelancer-content-buttons-black');
    $('.Freelancer-content-buttons-black-img').css({'display':'none'});
    $('.Freelancer-content-buttons-main-img').css({'display':'block'});
    $('.buttonClick a button p').html('Исполнителю');
    $('.CustomerModalPro').fadeOut(0);
    $('.PerformerModalPro').fadeIn(300);
    }
});
$('.Modal-login-close').click(function(e) {
    $('.modalLogin').fadeOut(300);
    $('body').css({'overflow':'auto'})
});

$('.logPop').click(function(e) {
    $('.modalLogin').css({'display':'flex'});
    $('body').css({'overflow':'hidden'})
});

$('.swap-modal').click(function(e) {
    if($('.modalLogin').css('display') == "flex"){
        $('.modalLogin').css({'display':'none'});
        $('.modalRegister').css({'display':'flex'})
    }
    else
        if($('.modalRegister').css('display') == "flex"){
            $('.modalRegister').css({'display':'none'});
            $('.modalLogin').css({'display':'flex'})
        }
});

$('.register_form').on('submit', function (e) {
    e.preventDefault();
    let pass = $('#password').val();
        secondPass = $('#second-pass').val();
    if(pass == secondPass){
        $.ajax({
            url: '/register/signup',
            data: $(this).serialize(),
            type: 'POST',
            dataType: 'JSON'
        }).done(function (r) {
            if(!r.status){
                if(r.message.email)
                    $('#email').text(r.message.email).fadeIn(100);
                if(r.message.username)
                    $('#username').text(r.message.username).fadeIn(100);
                if(r.message.password)
                    $('#username').text(r.message.password).fadeIn(100);
            } else {
                $('.error_register-block').fadeOut(100);
            }
        })
    } else {
        $('#password').fadeIn(100);
    }
});

$('.login_form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/register/check-email',
        data: {email: $('#login_email').val()},
        type: 'POST',
        dataType: 'JSON'
    }).done(function (r) {
        if(!r.status){
            $('#login_email-error').text(r.message).fadeIn(100);
        } else {
            $.ajax({
                url: '/register/login',
                data: $('.login_form').serialize(),
                type: 'POST',
                dataType: 'JSON'
            }).done(function (rsp) {
                if(!rsp.status){
                    console.log(rsp);
                }
            })
        }
    })
})
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
JS;
$this->registerJs($js);
AppAsset::register($this);
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
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
              rel="stylesheet">
    </head>

    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header>
            <div class="header__container">
                <div class="header-main">
                    <div class="logo-lang">
                        <div class="header__menu">
                            <!--Отключаеться когда пользователь НЕ зашел(добавить класс: dis-none-header)-->
                            <input id="menu__toggle1" type="checkbox">
                            <label class="menu__btn" for="menu__toggle1">
                                <span></span>
                            </label>
                            <ul class="menu__box">
                                <input id="menu__toggle-inner" type="checkbox" checked>
                                <label class="menu__btn" for="menu__toggle1">
                                    <span></span>
                                </label>
                                <div class="entry">
                                    <div class="login logPop">Вход</div>
                                    <div class="registration regPop">Регистрация</div>
                                </div>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['for-customer']) ?>">Заказчику</a>
                                </li>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['index']) ?>">Исполнителю</a>
                                </li>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['why-we']) ?>">Почему ADS.FORCE</a>
                                </li>
                                <li>
                                    <a class="menu__item" href="<?= Url::to(['index']) ?>">Разместить заказ</a>
                                </li>
                            </ul>
                        </div>
                        <a href="<?= Url::to(['/']) ?>" class="logo">ADSFORCE</a>
                        <div class="language">
                            <span>Eng</span> <span>|</span> <img
                                    src="<?= Url::to(['img/footer-header/language-en.webp']) ?>" alt="logo">
                        </div>
                    </div>

                    <div class="links">
                        <div class="link">
                            <a href="<?= Url::to(['for-customer']) ?>">Заказчику</a>
                        </div>
                        <div class="link">
                            <a href="<?= Url::to(['index']) ?>">Исполнителю</a>
                        </div>
                        <div class="link">
                            <a href="<?= Url::to(['why-we']) ?>">Почему ADS.FORCE</a>
                        </div>
                        <div class="link">
                            <a href="<?= Url::to(['index']) ?>">Разместить заказ</a>
                        </div>

                    </div>
                    <?php if (Yii::$app->getUser()->isGuest) : ?>
                        <div class="entry">
                            <div class="login logPop">Вход</div>
                            <div class="registration regPop">Регистрация</div>
                        </div>
                    <?php else : ?>
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
                                    <p><?= $role ? 'заказчик' : 'исполнитель' ?></p>
                                </div>
                            </div>
                            <div class="avtorize-modal">
                                <ul>
                                    <li>
                                        <a href="<?= $role ? Url::to(['profile-customer/profile-payment-info']) : Url::to(['profile-performer/profile-payment-info']) ?>">
                                            <img src="<?= Url::to(['img/footer-header/payment-link-icon.svg']) ?>" alt="">
                                            <p>Мой счёт:<?= $user['balance']['balance'] ?> ₽</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['tasks']) ?>">
                                            <img src="<?= Url::to(['img/profile/profile-meneger/search-icon.svg']) ?>" alt="">
                                            <p>Поиск задач</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= $role ? Url::to(['profile-customer/profile-tasks']) : Url::to(['profile-performer/profile-tasks']) ?>">
                                            <img src="<?= Url::to(['img/footer-header/doc-link-icon.svg']) ?>" alt="">
                                            <p>Мои задания/ работы</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= $role ? Url::to(['profile-customer/profile-message']) : Url::to(['profile-performer/profile-message']) ?>">
                                            <img src="<?= Url::to(['img/profile/profile-meneger/message-link.svg']) ?>" alt="">
                                            <p>Уведомления</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= $role ? Url::to(['/profile-customer']) : Url::to(['/profile-performer']) ?>">
                                            <img src="<?= Url::to(['img/footer-header/user-icon.svg']) ?>" alt="">
                                            <p>Мой кабинет</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= $role ? Url::to(['/profile-customer/profile-chat']) : Url::to(['/profile-performer/profile-chat']) ?>">
                                            <img src="<?= Url::to(['img/profile/profile-meneger/message-link-icon.svg']) ?>" alt="">
                                            <p>Сообщения</p>
                                        </a>
                                    </li>
<!--                                    <li>-->
<!--                                        <a href="--><?//= Url::to(['profile-customer/profile-pro']) ?><!--"><img-->
<!--                                                    src="--><?//= Url::to(['img/profile/profile-meneger/partners-link-icon.svg']) ?><!--"-->
<!--                                                    alt="">-->
<!--                                            <p>Партнерская программа</p>-->
<!--                                        </a>-->
<!--                                    </li>-->
                                    <li>
                                        <a href="<?= $role ? Url::to(['/profile-customer/technical-support']) : Url::to(['/profile-performer/technical-support']) ?>">
                                            <img src="<?= Url::to(['img/profile/profile-meneger/help-link-icon.svg']) ?>" alt="">
                                            <p>Служба поддержки</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= $role ? Url::to(['/profile-customer/profile-seetings']) : Url::to(['/profile-performer/profile-seetings']) ?>">
                                            <img src="<?= Url::to(['img/profile/profile-meneger/seetings-link-icon.svg']) ?>" alt="">
                                            <p>Настройки</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['register/logout']) ?>">
                                            <img src="<?= Url::to(['img/profile/profile-meneger/exit-icon.svg']) ?>" alt="">
                                            <p>Выйти</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>


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
                            <div class="entry">
                                <div class="login logPop">Вход</div>
                                <div class="registration regPop">Регистрация</div>
                            </div>
                            <li>
                                <a class="menu__item" href="<?= Url::to(['for-customer']) ?>">Заказчику</a>
                            </li>
                            <li>
                                <a class="menu__item" href="<?= Url::to(['index']) ?>">Исполнителю</a>
                            </li>
                            <li>
                                <a class="menu__item" href="<?= Url::to(['why-we']) ?>">Почему ADS.FORCE</a>
                            </li>
                            <li>
                                <a class="menu__item" href="<?= Url::to(['index']) ?>">Разместить заказ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="header-search">
                    <div class="search__container search">
                        <img src="<?= Url::to(['img/footer-header/search.webp']) ?>" alt="">
                        <input type="text" placeholder="Поиск">
                    </div>
                </div>

            </div>
        </header>
        <div class="modalRegister">
            <div class="modalBlock">
                <div class="Modal-close">
                    <p>&times;</p>
                </div>
                <h2 class="Font-size24">Добро пожаловать!</h2>
                <div class="modalForm">
                    <?= Html::beginForm('', 'post', ['class' => 'register_form']) ?>
                    <input type="text" required placeholder="Введите никнейм" name="username">
                    <div id="username" class="error_register-block"></div>

                    <input type="email" required placeholder="Номер телефона или e-mail" name="email">
                    <div id="email" class="error_register-block"></div>

                    <select name="role">
                        <option value="1">Исполнитель</option>
                        <option value="2">Заказчик</option>
                    </select>

                    <input type="password" id="password" required placeholder="Придумайте пароль" name="password">
                    <input type="password" id="second-pass" required placeholder="Повторите пароль" name="second-pass">
                    <div id="password" class="error_register-block">Введеные пароли не совпадают</div>

                    <button class="Font-size24">Зарегистрироваться</button>
                    <?= Html::endForm(); ?>
                    <div class="alternative-registration">
                        <div class="alternative-registration-block">
                            <p style="white-space: nowrap;" class="Font-size18">Регистрация с помощью</p>
                            <ul>
                                <li><a href=""><img src="<?= Url::to(['img/index/yandex-logo.svg']) ?>" alt=""></a></li>
                                <li><a href=""><img src="<?= Url::to(['img/index/google-icon.svg']) ?>" alt=""></a></li>
                                <li><a href=""><img src="<?= Url::to(['img/index/vk-icon.svg']) ?>" alt=""></a></li>
                                <li><a href=""><img src="<?= Url::to(['img/index/email-icon.svg']) ?>" alt=""></a></li>
                            </ul>
                            <p class="swap-modal Font-size18">Вход</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modalLogin">
            <div class="modalBlock">
                <div class="Modal-login-close">
                    <p>&times;</p>
                </div>
                <h2 class="Font-size24">Добро пожаловать!</h2>
                <div class="modalForm">
                    <?= Html::beginForm('', 'post', ['class' => 'login_form']) ?>
                    <input id="login_email" type="email" placeholder="email" required name="email">
                    <div id="login_email-error" class="error_register-block"></div>

                    <input id="login_password" type="password" placeholder="Пароль" required name="password">
                    <div id="login_password-error" class="error_register-block"></div>

                    <a class="password-link">Забыл пароль?</a>
                    <button class="Font-size24">Войти</button>
                    <?= Html::endForm(); ?>
                    <div class="alternative-registration">
                        <div class="alternative-registration-block">
                            <p class="Font-size18">Войти с помощью</p>
                            <ul>
                                <li><a href=""><img src="<?= Url::to(['img/index/yandex-logo.svg']) ?>" alt=""></a></li>
                                <li><a href=""><img src="<?= Url::to(['img/index/google-icon.svg']) ?>" alt=""></a></li>
                                <li><a href=""><img src="<?= Url::to(['img/index/vk-icon.svg']) ?>" alt=""></a></li>
                                <li><a href=""><img src="<?= Url::to(['img/index/email-icon.svg']) ?>" alt=""></a></li>
                            </ul>
                            <p class="swap-modal Font-size18">Регистрация</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ModalPro">
            <div class="ModalProCenter">
                <div class="ModalClosePro">
                    &times;
                </div>
                <h2 class="Font-size24">Тарифы</h2>
                <div class="ButtonPro">
                    <div class="buttonClick Freelancer-content-buttons-main">
                        <a>
                            <button>
                                <img class="Freelancer-content-buttons-black-img"
                                     src="<?= Url::to(['img/index/iconMenegerButton.svg']) ?>" style="display: none;"
                                     alt="">
                                <img class="Freelancer-content-buttons-main-img"
                                     src="<?= Url::to(['img/index/iconFreelanceButton.svg']) ?>" alt="">
                                <p>Исполнителю</p>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="ModalProContainer CustomerModalPro" style="display: none;">
                    <div class="ModalProBasic">
                        <h2 class="Font-size24">Начальный</h2>
                        <ul>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                        </ul>
                        <button class="Font-size24">Выбрать</button>
                        <b class="Font-size18">Цена: бесплатно</b>
                    </div>
                    <div class="ModalProBasic">
                        <h2 class="Font-size24">Начальный</h2>
                        <ul>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                        </ul>
                        <button class="Font-size24">Выбрать</button>
                        <b class="Font-size18">Цена: бесплатно</b>
                    </div>
                    <div class="ModalProBasic">
                        <h2 class="Font-size24">Начальный</h2>
                        <ul>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                        </ul>
                        <button class="Font-size24">Выбрать</button>
                        <b class="Font-size18">Цена: бесплатно</b>
                    </div>
                </div>
                <div class="ModalProContainer PerformerModalPro">
                    <div class="ModalProBasic">
                        <h2 class="Font-size24">Начальный</h2>
                        <ul>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                        </ul>
                        <button class="Font-size24">Выбрать</button>
                        <b class="Font-size18">Цена: бесплатно</b>
                    </div>
                    <div class="ModalProBasic">
                        <h2 class="Font-size24">Начальный</h2>
                        <ul>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                        </ul>
                        <button class="Font-size24">Выбрать</button>
                        <b class="Font-size18">Цена: бесплатно</b>
                    </div>
                    <div class="ModalProBasic">
                        <h2 class="Font-size24">Начальный</h2>
                        <ul>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Количество объявлений Х</p>
                            </li>
                            <li>
                                <img src="<?= Url::to(['img/index/plus-icon.svg']) ?>" alt="">
                                <p class="Font-size18">Нет возможности отслеживать выполнение</p>
                            </li>
                        </ul>
                        <button class="Font-size24">Выбрать</button>
                        <b class="Font-size18">Цена: бесплатно</b>
                    </div>
                </div>
            </div>
        </div>
        <main role="main" style="position:relative;" class="flex-shrink-0">
            <?= $content ?>
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
                                <div class="message-title1">
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
        </main>

        <footer class="mt-auto">
            <div class="footer__container">
                <div class="footer-main">
                    <div class="logo-feedback">
                        <div class="logo-lang">
                            <div class="logo">ADSFORCE</div>
                            <div class="language">
                                <span>Eng</span> <span>|</span> <img
                                        src="<?= Url::to(['img/footer-header/language-en.webp']) ?>" alt="logo">
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
                                <a href="<?= Url::to(['for-customer']) ?>">Заказчику</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['index']) ?>">Исполнителю</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['why-we']) ?>">Почему ADS.FORCE</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['why-we']) ?>">Быстрый старт</a>
                            </div>
                        </div>

                        <div class="links__right-column">
                            <div class="link">
                                <a href="<?= Url::to(['performers-page']) ?>">ТОП — исполнителей</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['performers-catalog']) ?>">Каталог исполнителей</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['index']) ?>">Специализации</a>
                            </div>
                            <div class="link">
                                <a href="<?= Url::to(['profile-performer/profile-private']) ?>">Отзывы</a>
                            </div>
                        </div>

                    </div>

                    <div class="info__other">
                        <div class="entry">
                            <div class="login logPop">Вход</div>
                            <div class="registration regPop">Регистрация</div>
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
