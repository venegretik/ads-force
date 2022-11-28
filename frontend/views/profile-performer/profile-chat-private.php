<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-chat-private.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
?>
<section class="rigth-column">
    <div class="chat-private white_color_bg">
        <div class="header-chat-private">
            <div class="header-chat-img bg-chat-img">
                <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-private.png']) ?>" alt="">
            </div>
            <div class="header-chat-content">
                <div class="header-chat-name">
                    <h2 class="main_color_text">Дарья Агапова</h2>
                    <div class="header-chat-online"></div>
                </div>
                <p class="header-chat-status">в сети</p>
            </div>
        </div>
        <div class="chat-body-message">
            <div class="chat-body-main">
                <div class="message-container">
                    <div class="message-user">
                        <div class="message-user-header">
                            <div class="header-chat-img bg-chat-img">
                                <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-private.png']) ?>" alt="">
                            </div>
                            <h2 class="main_color_text">Дарья Агапова</h2>
                            <p>исполнитель</p>
                        </div>
                        <div class="message-list">
                            <div class="message-text bg-chat">
                                <p class="main_color_text">Текст сообщения</p>
                                <p class="time-message main_color_text">14:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="message-user">
                        <div class="message-user-header">
                            <div class="header-chat-img bg-chat-img">
                                <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-private.png']) ?>" alt="">
                            </div>
                            <h2 class="main_color_text">Дарья Агапова</h2>
                            <p>исполнитель</p>
                        </div>
                        <div class="message-list">
                            <div class="message-text my-message">
                                <p>Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                            <div class="message-text my-message">
                                <p>Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-body-input">
                <input type="text" class="bg-chat main_color_text" placeholder="Сообщение">
                <div class="buttons-message">
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