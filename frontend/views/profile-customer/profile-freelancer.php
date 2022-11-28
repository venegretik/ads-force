<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/component-css/performers-card.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-freelancer.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
?>
<section class="profile-right">
    <div class="performers-cards">
        <div class="performers-card">
            <div class="performers-card-left">
                <img src="<?= Url::to(['img/index/Freelancer.png']) ?>" alt="">
                <div class="performers-card-stars">
                    <div style="background-image: url(<?= Url::to(['img/index/stars.png']) ?>); height: 20px; background-repeat: no-repeat;" class="stars">
                        <div style="background-image: url(<?= Url::to(['img/index/yellowStars.png']) ?>); height: 20px; background-repeat: no-repeat; width: 40%" class="yellow_stars"></div>
                    </div>
                </div>
            </div>
            <div class="performers-card-right">
                <div class="performers-card-right-title">
                    <h2 class="Font-size20 main_color_text">name</h2>
                    <p>position</p>
                </div>
                <p class="text-italic main_color_text">title</p>
                <p class="liked-message main_color_text">1810 положительных отзывов</p>
                <ul>
                    <li>
                        <p class="Font-size20 main_color_text">skill</p>
                    </li>
                </ul>
            </div>

            <div class="performers-card-mobile">
                <div class="performers-card-mobile-top">
                    <img src="<?= Url::to(['img/index/Freelancer.png']) ?>" alt="">
                    <div>
                        <div class="performers-card-right-title">
                            <h2 class="Font-size20 main_color_text">name</h2>
                            <p class="main_color_text">position</p>
                        </div>
                        <p class="text-italic main_color_text">title</p>
                        <div class="performers-card-stars">
                            <ul>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="performers-card-mobile-bottom">
                    <p class="liked-message main_color_text">1810 положительных отзывов</p>
                    <ul>
                        <li>
                            <p class="Font-size20 main_color_text">skill</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="performers-card">
            <div class="performers-card-left">
                <img src="<?= Url::to(['img/index/Freelancer.png']) ?>" alt="">
                <div class="performers-card-stars">
                    <div style="background-image: url(<?= Url::to(['img/index/stars.png']) ?>); height: 20px; background-repeat: no-repeat;" class="stars">
                        <div style="background-image: url(<?= Url::to(['img/index/yellowStars.png']) ?>); height: 20px; background-repeat: no-repeat; width: 40%" class="yellow_stars"></div>
                    </div>
                </div>
            </div>
            <div class="performers-card-right">
                <div class="performers-card-right-title">
                    <h2 class="Font-size20 main_color_text">name</h2>
                    <p>position</p>
                </div>
                <p class="text-italic main_color_text">title</p>
                <p class="liked-message main_color_text">1810 положительных отзывов</p>
                <ul>
                    <li>
                        <p class="Font-size20 main_color_text">skill</p>
                    </li>
                </ul>
            </div>

            <div class="performers-card-mobile">
                <div class="performers-card-mobile-top">
                    <img src="<?= Url::to(['img/index/Freelancer.png']) ?>" alt="">
                    <div>
                        <div class="performers-card-right-title">
                            <h2 class="Font-size20 main_color_text">name</h2>
                            <p class="main_color_text">position</p>
                        </div>
                        <p class="text-italic main_color_text">title</p>
                        <div class="performers-card-stars">
                            <ul>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                                <li>
                                    <div class="yellowStar"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="performers-card-mobile-bottom">
                    <p class="liked-message main_color_text">1810 положительных отзывов</p>
                    <ul>
                        <li>
                            <p class="Font-size20 main_color_text">skill</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!--Пагинация-->
    <div class="navigation-task">
        <a href="<?=Url::to(['profile-create-task'])?>">Разместить заказ</a>
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