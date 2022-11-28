<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-pro-acount.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$js = <<< JS
    $('.nopro-click').click(function(){
        $('.no-pro-content').removeClass('d-none');
        $('.pro-content').addClass('d-none');
        $(this).addClass('active-item');
        $('.pro-click').removeClass('active-item');
    })
    $('.pro-click').click(function(){
        $('.no-pro-content').addClass('d-none');
        $('.pro-content').removeClass('d-none');
        $(this).addClass('active-item');
        $('.nopro-click').removeClass('active-item');
    })
JS;
$this->registerJs($js);
?>
<div class="rigth-column">
    <p class="Font-size24 main_color_text">Бальная система для пользователя без PRO - аккаунта или % от комиссии системы за покупку PRO - аккаунта</p>
    <div class="main-content-pro">
        <div class="content-pro-title">
            <div class="content-pro-title-item nopro-click active-item item-border-right">
                <h2 class="Font-size36">Без PRO</h2>
            </div>
            <div class="content-pro-title-item pro-click">
                <h2 class="Font-size36">С PRO</h2>
            </div>
        </div>
        <div class="content-pro-text no-pro-content">
            <b class="Font-size18 main_color_text">Начислим Вам 5 баллов за каждого приведенного пользователя.</b>
            <div class="content-text-before">
                <p class="Font-size18 main_color_text">Просто <b>разместите</b> на своем ресурсе (сайте, канале, блоге, странице в соц.сети) специальную <b>реферальную ссылку</b> или <a href="">отправьте приглашение</a> пользователю напрямую.</p>
                <p class="Font-size18 main_color_text">Вы можете использовать Промо-материалы и видеть приглашенных Вами пользователей. </p>
            </div>
            <div class="links-content-text">
                <div class="link-content">
                    <p class="Font-size18 main_color_text">Реферальная ссылка: http://referalochka=0011</p>
                    <img src="<?= Url::to(['img/profile/private-profile/copy-icon.svg']) ?>" alt="">
                </div>
                <div class="link-content">
                    <p class="Font-size18 main_color_text">Реферальная ссылка: http://referalochka=0011</p>
                    <img src="<?= Url::to(['img/profile/private-profile/copy-icon.svg']) ?>" alt="">
                </div>
            </div>
        </div>
        <div class="content-pro-text pro-content d-none">
            <b class="Font-size18 main_color_text">xzxsadasd</b>
            <div class="content-text-before">
                <p class="Font-size18 main_color_text">Просто <b>разместите</b> на своем ресурсе (сайте, канале, блоге, странице в соц.сети) специальную <b>реферальную ссылку</b> или <a href="">отправьте приглашение</a> пользователю напрямую.</p>
                <p class="Font-size18 main_color_text">Вы можете использовать Промо-материалы и видеть приглашенных Вами пользователей. </p>
            </div>
            <div class="links-content-text">
                <div class="link-content">
                    <p class="Font-size18 main_color_text">Реферальная ссылка: http://referalochka=0011</p>
                    <img src="<?= Url::to(['img/profile/private-profile/copy-icon.svg']) ?>" alt="">
                </div>
                <div class="link-content">
                    <p class="Font-size18 main_color_text">Реферальная ссылка: http://referalochka=0011</p>
                    <img src="<?= Url::to(['img/profile/private-profile/copy-icon.svg']) ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="content-about">
        <p class="Font-size18 main_color_text">Баллы помогают достигать определенный уровень исполнителя/ заказчика, также их можно использовать для оплаты на сайте.</p>
    </div>
    <div class="content-button">
        <button>Стать партнером</button>
    </div>
    <div class="left-nav-bar-news news-mobile">
        <div class="news-title">
            <img src="<?= Url::to(['img/profile/profile-meneger/news-icon.svg']) ?>" alt="">
            <h2 class="Font-size24 main_color_text">Новости проекта</h2>
        </div>
        <div class="news-list">
            <ul>
                <li>
                    <p class="date-news Font-size18 white_color">18.08</p>
                    <p class="Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</p>
                </li>
                <li>
                    <p class="date-news Font-size18 white_color">18.08</p>
                    <p class="Font-size18 main_color_text">Запланированы технические работы с 23:00</p>
                </li>
                <li>
                    <p class="date-news Font-size18 white_color">28.09</p>
                    <p class="Font-size18 main_color_text">Статья «SMM: что это такое и как работает»</p>
                </li>
            </ul>
            <a href="<?=Url::to(['profile-news'])?>" class="more-news Font-size18 title_color">Еще + </a>
        </div>
    </div>
</div>