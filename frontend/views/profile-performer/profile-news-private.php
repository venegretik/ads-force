<?php

/** @var \yii\web\View $this */
/** @var string $content */

use console\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ProfileCustomerAsset;

$this->registerCssFile(Url::to(['css/profile-performer/profile-news-private.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
?>

<div class="profile-news-private-container-full">
    <div class="bread-title">
        <h2 class="main_color_text Font-size18">Новости проекта</h2>
        <h2 class="main_color_text Font-size18">-</h2>
        <h2 class="main_color_text Font-size18">Статья “Как реклама влияет на продажи?”</h2>
    </div>
    <div class="profile-news-private-container">
        <div class="profile-news-full white_color_bg">
            <p class="news-day main_color_text">Сегодня</p>
            <h2 class="main_color_text Font-size24">Как реклама влияет на продажи?</h2>
            <div class="profile-news-title" style="background: linear-gradient(0deg, rgba(48, 38, 38, 0.58), rgba(48, 38, 38, 0.58)), url('../../img/profile/private-profile/bg-slider.png');
    background-repeat: no-repeat;
    background-size:cover;
    background-position: center;">
            </div>
            <div class="profile-news-content">
                <p class="opacity-text main_color_text">Автор: Вероника Ильина</p>
                <p class="opacity-text main_color_text">Источник: Ads.Force</p>
                <p class="main_color_text Font-size18">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra.
                </p>
            </div>
            <div class="other-news">
                <h2 class="Font-size24 main_color_text">Другие новости</h2>
                <ul>
                    <li class="main_color_text">Статья «SMM: что это такое и как работает»</li>
                    <li class="main_color_text">Статья «SMM: что это такое и как работает»</li>
                    <li class="main_color_text">Статья «SMM: что это такое и как работает»</li>
                    <li class="main_color_text">Статья «SMM: что это такое и как работает»</li>
                </ul>
            </div>
        </div>
        <div class="contact-news white_color_bg">
            <img src="<?= Url::to(['img/profile/profile-tasks/telegram-icon.svg']) ?>" alt="">
            <h2 class="main_color_text">Больше новостей в Telegram</h2>
            <p class="main_color_text Font-size18">Никакого спама и рекламы, только лучшее для вашего бизнеса</p>
            <a href="">Подписаться</a>
        </div>
    </div>
</div>