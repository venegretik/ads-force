<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-tasks.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerCssFile(Url::to(['css/component-css/task-item.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
?>
<div class="profile-right">
    <?php if (empty($tasks)) : ?>
        <div class="profile-empty">
            <h2 class="Font-size24 gray_color">Не найдено ни одного взятого в работу заказа :(</h2>
            <a href="<?= Url::to(['profile-create-task']) ?>">Разместить заказ</a>
        </div>
    <?php else : ?>
        <div class="tasks">
            <?php foreach ($tasks as $task) : ?>
                <a href="<?= Url::to(['new-task-preview', 'link' => $task['id']]) ?>">
                    <div class="task-item white_color_bg <?= $task['active'] == \console\models\Tasks::STATUS_INACTIVE ? 'inactive__tasks' : '' ?>">
                        <div class="filter-task-item">
                            <div class="filter-task-item-main">
                                <div class="hi-order">
                                    <p><?= $task['status'] ?></p>
                                    <img src="<?= Url::to(['img/tasks/smite.svg']) ?>" alt="">
                                </div>
                                <div class="filters-list">
                                    <div class="filter-view filter-task-items">
                                        <img src="<?= Url::to(['img/profile/profile-tasks/message-icon.svg']) ?>"
                                             alt="">
                                        <p class="img-title">Перейти в чат с исполнителем </p>
                                    </div>
                                    <div class="filter-view filter-task-items">
                                        <img src="<?= Url::to(['img/profile/profile-tasks/profile-icon.svg']) ?>"
                                             alt="">
                                        <p class="img-title">Перейти на страницу исполнителя</p>
                                    </div>
                                    <div class="filter-view filter-task-items">
                                        <img src="<?= Url::to(['img/tasks/summ.svg']) ?>" alt="">
                                        <p><?= !empty($task['price']) ? $task['price'] : 'Договорная'?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="right-item-filter">
                                <p><?= date('d.m.Y', strtotime($task['date_public'])) ?></p>
                            </div>
                        </div>
                        <div class="task-title">
                            <h2 class="Font-size24 main_color_text"><?= $task['title'] ?></h2>
                        </div>
                        <div class="task-text main_color_text">
                            <?= $task['about_project'] ?>
                            <span style="color: #F535DA">... Подробнее</span>
                        </div>
                        <?php $tags = !empty($task['tags']) ? json_decode($task['tags'], 1) : [] ?>
                        <div class="task-tag-list">
                            <?php foreach($tags as $i): ?>
                                <div class="task-tag-item">
                                    <p>#<?= $i ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

            <div class="navigation-task">
                <a href="<?= Url::to(['profile-create-task']) ?>">Разместить заказ</a>
<!--                <div class="pagination-items">-->
<!--                    <a href="">-->
<!--                        <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M4.5 1L1 4.5L4.5 8" class="arrow-color" stroke="#1F1F1F" stroke-width="1.5"-->
<!--                                  stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            <path d="M9 1L5.5 4.5L9 8" class="arrow-color" stroke="#1F1F1F" stroke-width="1.5"-->
<!--                                  stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a class="active-paginate main_color_text" href="">1</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="" class="main_color_text">2</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="" class="main_color_text">3</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <a href="">-->
<!--                        <svg class="right-arrow-pagination" width="10" height="9" viewBox="0 0 10 9" fill="none"-->
<!--                             xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M4.5 1L1 4.5L4.5 8" class="arrow-color" stroke="#fff" stroke-width="1.5"-->
<!--                                  stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            <path d="M9 1L5.5 4.5L9 8" class="arrow-color" stroke="#fff" stroke-width="1.5"-->
<!--                                  stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </div>
        </div>
    <?php endif; ?>


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