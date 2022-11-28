<?php

use yii\helpers\Url;

/** @var yii\web\View $this */
$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-seetings.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$js = <<< JS
let statusClient = false;
$('.your-click').click(function(){
    statusClient = false;
    $('.phiz-click').removeClass('active-button');
    $('.phiz-fase').fadeOut(300);
    $('.add-payer-form-show').find('img').css({'transform':'rotate(0deg) '})
    $('.your-click').addClass('active-button');
    $('.your-fase').fadeOut(300);
});
$('.phiz-click').click(function(){
    statusClient = true;
    $('.phiz-click').addClass('active-button');
    $('.your-click').removeClass('active-button');
    $('.add-payer-form-show').find('img').css({'transform':'rotate(0deg) '})
    $('.phiz-fase').fadeOut(300);
    $('.your-fase').fadeOut(300);
})
$('.add-payer-form-show').click(function(){
    if(statusClient){
    if($('.phiz-fase').css('display') == "none"){
        $('.phiz-fase').fadeIn(300);
        $('.add-payer-form-show').find('img').css({'transform':'rotate(-180deg) '})
    }
    else{
        $('.phiz-fase').fadeOut(300);
        $('.add-payer-form-show').find('img').css({'transform':'rotate(0deg) '})
    }
    }
    else{
        if($('.your-fase').css('display') == "none"){
            $('.your-fase').fadeIn(300);
            $('.add-payer-form-show').find('img').css({'transform':'rotate(-180deg) '})
        }
        else{
            $('.your-fase').fadeOut(300);
            $('.add-payer-form-show').find('img').css({'transform':'rotate(0deg) '})
        }
    }
})
JS;
$this->registerJs($js);

?>
<div class="rigth-column">
    <h2 class="main_color_text Font-size24">Ваши данные</h2>
    <div class="you-data-change">
        <div class="change-photo">
            <p class="main_color_text Font-size18"><b>Изображение</b> jpeg, png</p>
            <div class="change-photo-img">
                <img src="<?= Url::to(['img/index/Freelancer.png']) ?>" alt="">
            </div>
            <div class="change-photo-text">
                <a href="">Выбрать файл</a>
                <p>Файл не выбран</p>
                <a href="<?= Url::to(['profile-pro']) ?>" class="button-pro">Стать PRO</a>
            </div>
        </div>
        <div class="change-input">
            <form action="">
                <div class="input-form-change">
                    <label for="">Имя пользователя</label>
                    <div class="input-relative">
                        <input placeholder="Имя пользователя" class="main_color_text" type="text">
                        <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    </div>
                </div>
                <div class="input-form-change">
                    <label for="">Номер телефона</label>
                    <div class="input-relative">
                        <input placeholder="Номер телефона" class="main_color_text" type="tel">
                        <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    </div>
                </div>
                <div class="input-form-change">
                    <label for="">Электронная почта</label>
                    <div class="input-relative">
                        <input placeholder="Электронная почта" class="main_color_text" type="email">
                        <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    </div>
                </div>
                <div class="identification-email">
                    <p class="error-email">Почта не подтверждена</p>
                    <a class="identification-email-button white_color_bg">Отправить письмо</a>
                </div>
                <div class="input-form-change">
                    <label for="">Пароль</label>
                    <div class="input-relative">
                        <input placeholder="Пароль" class="main_color_text" type="pass">
                        <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    </div>
                </div>
                <div class="form-button">
                    <button>Сохранить</button>
                </div>
            </form>
        </div>
    </div>
    <div class="payment-form">
        <div class="payment-title">
            <h2 class="main_color_text">Оплата</h2>
            <div class="payment-buttons">
                <button class="active-button main_color_text your-click">Юридическое лицо</button>
                <button class="main_color_text phiz-click">Физическое лицо</button>
            </div>
        </div>
        <div class="add-payer">
            <p class="main_color_text">Данные плательщика необходимы для оплаты услуг сервиса или пополнения баланса через банковскую карту или виртуальный кошелек</p>
            <div class="add-payer-form-show">
                <h2>Добавить плательщика</h2>
                <img src="<?= Url::to(['img/profile/private-profile/arrow-mobile.svg']) ?>" alt="">
            </div>
        </div>
        <form action="" class="your-fase" style="display: none;">
            <div class="input-form-change">
                <label for="">Полное название организации</label>
                <div class="input-relative">
                    <input placeholder="Полное название организации" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">Генеральный директор</label>
                <div class="input-relative">
                    <input placeholder="Генеральный директор" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">Юридический адрес</label>
                <div class="input-relative">
                    <input placeholder="Юридический адрес" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">Фактический адрес</label>
                <div class="input-relative">
                    <input placeholder="Фактический адрес" class="main_color_text" type="email">
                    <label class="custom-checkbox">
                        <input class="change_filter" name="" type="checkbox" value="">
                        <span class="Font-size18 main_color_text">dsada</span>
                    </label>
                </div>
            </div>
            <div class="input-form-change">
                <label for="">ИНН</label>
                <div class="input-relative">
                    <input placeholder="ИНН" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">КПП</label>
                <div class="input-relative">
                    <input placeholder="КПП" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">ОГРН</label>
                <div class="input-relative">
                    <input placeholder="ОГРН" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">БИК</label>
                <div class="input-relative">
                    <input placeholder="БИК" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">Расчетный счет</label>
                <div class="input-relative">
                    <input placeholder="Расчетный счет" class="main_color_text" type="email">
                </div>
            </div>
        </form>
        <form action="" class="phiz-fase" style="display: none;">
            <div class="input-form-change">
                <label for="">Ваша фамилия</label>
                <div class="input-relative">
                    <input placeholder="Ваша фамилия" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">Ваше имя</label>
                <div class="input-relative">
                    <input placeholder="Ваше имя" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">Ваше отчество (если есть)</label>
                <div class="input-relative">
                    <input placeholder="Ваше отчество (если есть)" class="main_color_text" type="email">
                </div>
            </div>
            <div class="input-form-change">
                <label for="">Адрес регистрации</label>
                <div class="input-relative">
                    <input placeholder="Адрес регистрации" class="main_color_text" type="email">
                </div>
            </div>
        </form>
        <div class="payer-list">
            <div class="payer-item">
                <div class="payer-text">
                    <p class="main_color_text">Иванов Иван Иванович</p>
                    <p class="main_color_text">г. Москва, ул. Академическая, д.21</p>
                    <p class="main_color_text">+7 (903) 123 45 67</p>
                    <p class="main_color_text">test@gmail.ru</p>
                </div>
                <div class="payer-img">
                    <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    <img src="<?= Url::to(['img/profile/profile-tasks/delete-icon.svg']) ?>" alt="">
                </div>
            </div>
            <div class="payer-item">
                <div class="payer-text">
                    <p class="main_color_text">Иванов Иван Иванович</p>
                    <p class="main_color_text">г. Москва, ул. Академическая, д.21</p>
                    <p class="main_color_text">+7 (903) 123 45 67</p>
                    <p class="main_color_text">test@gmail.ru</p>
                </div>
                <div class="payer-img">
                    <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    <img src="<?= Url::to(['img/profile/profile-tasks/delete-icon.svg']) ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="message-user">
        <div class="message-title">
            <h2 class="main_color_text">Уведомления</h2>
        </div>
        <div class="message-checkbox-list">
            <div class="message-checkbox-item">
                <h2 class="main_color_text">Email-уведомления:</h2>
                <ul>
                    <li>
                        <label class="custom-checkbox">
                            <input class="change_filter" name="" type="checkbox" value="">
                            <span class="Font-size18 main_color_text">Новости</span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-checkbox">
                            <input class="change_filter" name="" type="checkbox" value="">
                            <span class="Font-size18 main_color_text">Изменение статуса заказа</span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-checkbox">
                            <input class="change_filter" name="" type="checkbox" value="">
                            <span class="Font-size18 main_color_text">Окончание средств на балансе</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="message-checkbox-item">
                <h2 class="main_color_text">Email-уведомления:</h2>
                <ul>
                    <li>
                        <label class="custom-checkbox">
                            <input class="change_filter" name="" type="checkbox" value="">
                            <span class="Font-size18 main_color_text">Новости</span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-checkbox">
                            <input class="change_filter" name="" type="checkbox" value="">
                            <span class="Font-size18 main_color_text">Изменение статуса заказа</span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-checkbox">
                            <input class="change_filter" name="" type="checkbox" value="">
                            <span class="Font-size18 main_color_text">Новое сообщение</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <button class="save-changes-button">Сохранить изменения</button>
    </div>
</div>