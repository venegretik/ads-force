<?php

use yii\helpers\Url;

/** @var yii\web\View $this */
$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/task-page.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/component-css/task-item.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/new-task-preview.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
?>
<div class="Profile-container">
    <div class="task-page-full">
        <div class="link-back">
            <a style="cursor: pointer;" onclick="history.back()"><img src="<?= Url::to(['img/task-page/arrow-task.svg']) ?>" /> Вернуться назад</a>
        </div>
        <div class="task-card white_color_bg">
            <div class="filter-task-item">
                <div class="filter-task-item-main">
                    <div class="status-task">
                        <p>Свободен</p>
                        <div class="date-mobile">
                            <p>25 сентября</p>
                        </div>
                    </div>
                    <div class="filters-list">
                        <div class="filter-view filter-task-items">
                            <img src="<?= Url::to(['img/tasks/view.svg']) ?>" alt="">
                            <p>12</p>
                        </div>
                        <div class="filter-view filter-task-items">
                            <img src="<?= Url::to(['img/tasks/human-icon.svg']) ?>" alt="">
                            <p>32</p>
                        </div>
                        <div class="filter-view filter-task-items">
                            <img src="<?= Url::to(['img/tasks/summ.svg']) ?>" alt="">
                            <p>43</p>
                        </div>
                    </div>
                </div>
                <div class="right-item-filter">
                    <p>25 сентября</p>
                    <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    <img src="<?= Url::to(['img/profile/profile-tasks/delete-icon.svg']) ?>" alt="">
                </div>
            </div>
            <div class="task-title">
                <h2 class="Font-size24 main_color_text">dasdwww</h2>
            </div>
            <div class="task-text-about-project">
                <div class="Font_size18 main_color_text">
                    <b>О проекте:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.
                </div>
            </div>
            <div class="tehnical-text">
                <div class="Font_size18 main_color_text"><b>Техническое задание:</b> вфывфвфывццф</div>
            </div>
            <div class="file-block">
                <img src="<?= Url::to(['img/task-page/file-icon.svg']) ?>" alt="">
                <div class="file-list">
                    <ul>
                        <li>
                            <a download="" href="<?= Url::to(['img/task-page/file-icon.svg']) ?>" target="_blank">dsadasda</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <p class="main_color_text"><b>Срок выполнения:</b> 15 дней</p>
            </div>
            <div class="task-tag-list">
                <div class="task-tag-item">
                    <p>#еукф</p>
                </div>
            </div>
        </div>
        <div class="task-button">
            <a href="index" class="Font-size28">Сохранить</a>
        </div>
    </div>
</div>