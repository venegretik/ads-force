<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-messages.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);

?>

<div class="right-column">
    <div class="messages-list">
        <div class="messages-item white_color_bg">
            <h2 class="main_color_text">У вас 1 новое сообщение от Victor.V</h2>
            <p class="main_color_text">«Приветствую! Давай-те попробуем так…»</p>
            <a class="main_color_text" href="<?= Url::to(['profile-chat-private']) ?>">Перейти к сообщению</a>
            <img src="<?= Url::to(['img/profile/profile-meneger/close-icon.svg']) ?>" alt="">
        </div>
        <div class="messages-item white_color_bg">
            <h2 class="main_color_text">У вас 1 новое сообщение от Victor.V</h2>
            <p class="main_color_text">«Приветствую! Давай-те попробуем так…»</p>
            <a class="main_color_text" href="<?= Url::to(['profile-chat-private']) ?>">Перейти к сообщению</a>
            <img src="<?= Url::to(['img/profile/profile-meneger/close-icon.svg']) ?>" alt="">
        </div>
        <div class="messages-item white_color_bg">
            <h2 class="main_color_text">У вас 1 новое сообщение от Victor.V</h2>
            <p class="main_color_text">«Приветствую! Давай-те попробуем так…»</p>
            <a class="main_color_text" href="<?= Url::to(['profile-chat-private']) ?>">Перейти к сообщению</a>
            <img src="<?= Url::to(['img/profile/profile-meneger/close-icon.svg']) ?>" alt="">
        </div>
    </div>
</div>