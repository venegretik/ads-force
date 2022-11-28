<?php

/** @var \yii\web\View $this */
/** @var string $content */

use console\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\ProfileCustomerAsset;

$this->registerCssFile(Url::to(['css/profile-performer/profile-news.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
?>


<div>
    <div class="title-news">
        <h2 class="Font-size36 main_color_text">Новости проекта</h2>
    </div>
    <div class="news-category">
        <a class="active-category Font-size18">Все</a>
        <a class="Font-size18 main_color_text">За сутки</a>
        <a class="Font-size18 main_color_text">За неделю</a>
    </div>
    <div class="news-list">
        <a class="new-news">
            <div class="new-news-item white_color_bg">
                <img src="<?= Url::to(['/img/profile/profile-tasks/news-img.svg']) ?>" alt="">
                <div class="new-news-text">
                    <p class="new-news-day main_color_text">Сегодня</p>
                    <h2 class="new-news-title Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</h2>
                    <p class="new-news-content main_color_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </a>
        <div class="news-medium-level">
            <a class="news-medium-item white_color_bg">
                <p class="new-news-day main_color_text">Сегодня</p>
                <h2 class="Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</h2>
                <p class="new-news-content main_color_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </a>
            <a class="news-medium-item white_color_bg">
                <p class="new-news-day main_color_text">Сегодня</p>
                <h2 class="Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</h2>
                <p class="new-news-content main_color_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </a>
            <a class="news-medium-item white_color_bg">
                <p class="new-news-day main_color_text">Сегодня</p>
                <h2 class="Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</h2>
                <p class="new-news-content main_color_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </a>
            <a class="news-medium-item white_color_bg">
                <p class="new-news-day main_color_text">Сегодня</p>
                <h2 class="Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</h2>
                <p class="new-news-content main_color_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </a>
            <a class="news-medium-item white_color_bg">
                <p class="new-news-day main_color_text">Сегодня</p>
                <h2 class="Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</h2>
                <p class="new-news-content main_color_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </a>
            <a class="news-medium-item white_color_bg">
                <p class="new-news-day main_color_text">Сегодня</p>
                <h2 class="Font-size18 main_color_text">Статья «Как реклама влияет на продажи?»</h2>
                <p class="new-news-content main_color_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </a>
        </div>
        <div class="bottom-news">
            <div class="">

            </div>
        </div>
    </div>
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
</div>
</div>