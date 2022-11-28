<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-chat.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
?>
<section class="rigth-column">
    <div class="chat-list">
        <a href="<?= Url::to(['profile-chat-private']) ?>">
            <div class="chat-item">
                <div class="chat-item-img">
                    <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-icon.png']) ?>" alt="">
                </div>
                <div class="chat-item-content">
                    <div class="chat-item-content-top">
                        <h2 class="Font-size24 main_color_text">Александр Иванов</h2>
                        <div class="chat-item-content-time">
                            <img src="<?= Url::to(['img/profile/profile-chat/chat-status.svg']) ?>" alt="">
                            <p class="gray_color">21:27</p>
                        </div>
                    </div>
                    <p class="skill-list main_color_text">Редизайн</p>
                    <div class="text-message">
                        <p class="text-message-prev">Текст сообщения Текст сообщения...</p>
                        <p class="message-number-absolute">1</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?= Url::to(['profile-chat-private']) ?>">
            <div class="chat-item">
                <div class="chat-item-img">
                    <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-icon.png']) ?>" alt="">
                </div>
                <div class="chat-item-content">
                    <div class="chat-item-content-top">
                        <h2 class="Font-size24 main_color_text">Александр Иванов</h2>
                        <div class="chat-item-content-time">
                            <img src="<?= Url::to(['img/profile/profile-chat/chat-status.svg']) ?>" alt="">
                            <p class="gray_color">21:27</p>
                        </div>
                    </div>
                    <p class="skill-list main_color_text">Редизайн</p>
                    <p class="text-message-prev">Текст сообщения Текст сообщения...</p>
                </div>
            </div>
        </a>
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
</section>