<?php

use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/** @var yii\web\View $this */

$arrMonth = [
    1 => 'января',
    2 => 'февраля',
    3 => 'марта',
    4 => 'апреля',
    5 => 'мая',
    6 => 'июня',
    7 => 'июля',
    8 => 'августа',
    9 => 'сентября',
    10 => 'октября',
    11 => 'ноября',
    12 => 'декабря',
];

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/tasks.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/component-css/filter.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/component-css/task-item.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/component-css/slider-range.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerJsFile(Url::to(['js/slider-range.js']), ['depends' => JqueryAsset::class]);
$js = <<< JS
let statusFilter = false
    $('.filter-item .categories-select-top').click(function (e) {
    if($(this).parent().find('.categories-select-bottom').css('display') == "block"){
        $(this).parent().find('.categories-select-bottom').fadeOut(300);
        $(this).find('svg').css({'transform':'translate(0%, -50%) rotate(0deg)'})
    }
    else{
        $(this).parent().find('.categories-select-bottom').fadeIn(300);
        $(this).find('svg').css({'transform':'translate(0%, -50%) rotate(-180deg) '})
    }
})
$('.mobile-filter-open').click(function (e) {
    $('.filter').fadeIn(300);
    $('body').css({'overflow':'hidden'})
});

$('.filter-close').click(function (e) {
    $('.filter').fadeOut(300);
    $('body').css({'overflow':'auto'})
});

$('.tasks-content-main').on('change', '.change_filter', function () {
    $('.filter_form').submit();
});

$('.filter_form').on('submit', function (e) {
    e.preventDefault();
    $.pjax.reload({
        container: '#task_container',
        url: '/tasks',
        data: $(this).serialize(),
        type: 'GET',
    });
})

JS;
$this->registerJs($js);
AppAsset::register($this);
?>
<div class="container-index">
    <!--title-task-->
    <section class="title-tasks">
        <div class="title-text">
            <h2 class="Font-size36">Каталог заданий</h2>
            <img src="<?= Url::to(['img/tasks/faq.svg']) ?>" alt="">
        </div>
        <div class="message-title">
            <p>В данном разделе вы можете найти подходящие своему опыту и уровню желаемой оплаты задания! Для вашего удобства воспользуйтесь фильтрами по заданиям!</p>
        </div>
    </section>
    <div class="tasks-content-main">
        <!--filter-->
        <section class="filter">
            <form action="" class="filter_form" id="filter_form">
                <div class="filter-close">
                    &times;
                </div>
                <div class="filter-open-mobile">
                    <img src="<?= Url::to(['img/tasks/filter-open.svg']) ?>" alt="">
                    <p class="Font-size18">Фильтры</p>
                </div>
                <div class="remuneration">
                    <div class="title-remuneration">
                        <h2 class="Font-size18">Вознаграждение</h2>
                    </div>
                    <div class="remuneration-minmax">
                        <div class="remuneration-minmax-item">
                            <div class="form_control_container">
                                <p>От</p>
                                <input form="filter_form" class="form_control_container__time__input change_filter" name="fromPrice" type="number" id="fromInput" value="0" min="0" max="100000" />
                            </div>
                            <img src="<?= Url::to(['img/tasks/rub.svg']) ?>" alt="">
                        </div>
                        <div class="remuneration-minmax-item">
                            <div class="form_control_container">
                                <p>До</p>
                                <input form="filter_form" class="form_control_container__time__input change_filter" name="toPrice" type="number" id="toInput" value="100000" min="0" max="100000" />
                            </div>
                            <img src="<?= Url::to(['img/tasks/rub.svg']) ?>" alt="">
                        </div>
                    </div>
                    <div class="range_container">
                        <div class="sliders_control">
                            <input id="fromSlider" class="change_filter" type="range" value="0" min="0" max="100000" />
                            <input id="toSlider" class="change_filter" type="range" value="100000" min="0" max="100000" />
                        </div>
                        <div class="form_control">
                            <p>0</p>
                            <p>100000</p>
                        </div>
                    </div>
                </div>
                <div class="filter-full">
                    <div class="title-categories">
                        <h2 class="Font-size18">Категория</h2>
                        <a href="" class="Font-size18">Сбросить</a>
                    </div>
                    <?php foreach ($category as $val) : ?>
                        <div class="categories-select">
                            <div class="filter-item">
                                <div class="categories-select-top">
                                    <b class="Font-size18"><?= $val['title'] ?></b>
                                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L7 7L13 1" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="categories-select-bottom">
                                    <ul>
                                        <?php foreach ($val['subCategories'] as $i) : ?>
                                            <li>
                                                <label class="custom-checkbox">
                                                    <input class="change_filter" name="skils[]" type="checkbox" value="<?= $i['title'] ?>">
                                                    <span class="Font-size18"><?= $i['title'] ?></span>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="filter-show-more">
                        <a href="" class="Font-size18">Ещё +</a>
                    </div>
                    <div class="review-switch">
                        <label><input type="checkbox" class="ios-switch bigswitch" checked />
                            <div>
                                <div></div>
                            </div>
                        </label>
                        <p class="Font-size18">Только с отзывами</p>
                    </div>
                </div>
            </form>
        </section>
        <div class="mobile-filter">
            <div class="mobile-filter-open">
                <img src="<?= Url::to(['img/tasks/filter-icon.svg']) ?>" alt="">
                <p>Фильтры</p>
            </div>
            <p>Найдено 545 заданий</p>
        </div>
        <section class="task-list">
            <?php Pjax::begin(['id' => 'task_container']) ?>
            <div class="view-tasks-mobile">
                <div class="view-tasks">
                    <p class="Font-size18">Отображать по:</p>
                    <ul>
                        <li>
                            <a class="Font-size18 active-view" href="">5</a>
                        </li>
                        <li>
                            <a class="Font-size18" href="">10</a>
                        </li>
                        <li>
                            <a class="Font-size18" href="">15</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tasks">
                <?php foreach ($tasks as $task) : ?>
                    <a data-pjax="0" href="<?= Url::to(['/task-page/' . $task['id']]) ?>">
                        <div class="task-item">
                            <div class="filter-task-item">
                                <div class="filter-task-item-main">
                                    <?php if ($task['status'] == 'Свободен') : ?>
                                        <div class="status-task">
                                            <p><?= $task['status'] ?></p>
                                        </div>
                                    <?php else : ?>
                                        <div class="hi-order">
                                            <p><?= $task['status'] ?></p>
                                            <img src="<?= Url::to(['img/tasks/smite.svg']) ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <div class="filters-list">
                                        <div class="filter-view filter-task-items">
                                            <img src="<?= Url::to(['img/tasks/view.svg']) ?>" alt="">
                                            <p><?= $task['views'] ?></p>
                                        </div>
                                        <div class="filter-view filter-task-items">
                                            <img src="<?= Url::to(['img/tasks/human-icon.svg']) ?>" alt="">
                                            <p><?= $task['responded'] ?></p>
                                        </div>
                                        <div class="filter-view filter-task-items">
                                            <img src="<?= Url::to(['img/tasks/summ.svg']) ?>" alt="">
                                            <p><?= $task['price'] > 0 ? $task['price'] : 'Договорная' ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-item-filter">
                                    <p><?= date('d', strtotime($task['date_public'])) . ' ' . $arrMonth[date('n', strtotime($task['date_public']))] ?></p>
                                </div>
                            </div>
                            <div class="task-title">
                                <h2 class="Font-size24"><?= $task['title'] ?></h2>
                            </div>
                            <div class="task-text">
                                <?= mb_substr($task['about_project'], 0, 180) ?> <span style="color: #F535DA">... Подробнее</span>
                            </div>
                            <div class="task-tag-list">
                                <?php $tags = !empty($task['tags']) ? json_decode($task['tags'], 1) : [] ?>
                                <?php foreach ($tags as $tag) : ?>
                                    <div class="task-tag-item">
                                        <p>#<?= $tag ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="pagination-tasks">
                <div class="view-tasks">
                    <p class="Font-size18">Отображать по:</p>
                    <label class="pageSize_label Font-size18 <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 5 ? 'active-view' : '' ?>">
                        5
                        <input <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 5 ? 'checked' : '' ?> form="filter_form" class="change_filter" style="display: none;" type="radio" name="pageSize" value="5">
                    </label>
                    <label class="pageSize_label Font-size18 <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 10 ? 'active-view' : '' ?>">
                        10
                        <input <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 10 ? 'checked' : '' ?> form="filter_form" class="change_filter" style="display: none;" type="radio" name="pageSize" value="10">
                    </label>
                    <label class="pageSize_label Font-size18 <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 15 ? 'active-view' : '' ?>">
                        15
                        <input <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 15 ? 'checked' : '' ?> form="filter_form" class="change_filter" style="display: none;" type="radio" name="pageSize" value="15">
                    </label>
                </div>
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </div>
            <?php Pjax::end(); ?>
        </section>
    </div>
</div>