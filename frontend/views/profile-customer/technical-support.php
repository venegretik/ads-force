<?php

use yii\helpers\Url;

/** @var yii\web\View $this */
$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/technical-support.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
?>
<div class="rigth-column">
    <div style="margin-bottom: 20px;" class="technical-support-title">
        <h2 class="main_color_text">Список обращений</h2>
        <!-- <div class="review-switch">
            <label><input type="checkbox" class="ios-switch bigswitch" checked />
                <div>
                    <div></div>
                </div>
            </label>
            <p class="Font-size18 main_color_text">Показывать архив</p>
        </div> -->
    </div>
    <div class="call-tehnical-list">
        <?php if (!empty($dialogs)) : ?>
            <?php foreach ($dialogs as $item) : ?>
                <div class="call-tehnical-item white_color_bg">
                    <div class="call-tehnical-item-img">
                        <img src="<?= Url::to(['img/profile/profile-chat/avatar-icon.svg']) ?>" alt="">
                    </div>
                    <div class="call-tehnical-item-text">
                        <b class="main_color_text">Ads.Force</b>
                        <p>Техническая поддержка</p>
                        <a class="main_color_text" href="<?= Url::to(['technical-support-chat', 'link' => $item['id']]) ?>">Тикет №<?= $item['id'] ?> Заголовок — <?= $item['theme'] ?></a>
                    </div>
                    <!-- <p class="date-call-tehnical">19 ноября</p> -->
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="call-list-button">
            <a href="<?= Url::to(['technical-support-single']) ?>">Создать обращение</a>
            <div class="pagination-items">
                <a href="">
                    <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.5 1L1 4.5L4.5 8" class="arrow-color" stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 1L5.5 4.5L9 8" class="arrow-color" stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <ul>
                    <li>
                        <a class="active-paginate main_color_text" href="">1</a>
                    </li>
                    <li>
                        <a href="" class="main_color_text">2</a>
                    </li>
                    <li>
                        <a href="" class="main_color_text">3</a>
                    </li>
                </ul>
                <a href="">
                    <svg class="right-arrow-pagination" width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.5 1L1 4.5L4.5 8" class="arrow-color" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 1L5.5 4.5L9 8" class="arrow-color" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
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
                    <a href="<?= Url::to(['profile-news']) ?>" class="more-news Font-size18 title_color">Еще + </a>
                </div>
            </div>
        </div>
    </div>
</div>