<?php

use yii\helpers\Url;
use frontend\assets\AppAsset;

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
$this->registerCssFile(Url::to(['css/task-page.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/component-css/task-item.css']), ['depends' => ['frontend\assets\AppAsset']]);
AppAsset::register($this);
$js = <<< JS
    $('.task-button').click(function (e) {
        $('.modalRegister').css({'display':'flex'});
    })
    $('.modalRegisterClose').click(function (e) {
        $('.modalRegister').css({'display':'none'});
    });
    $('.upwout-button').click(function (e) {
        $('.success-modal').css({'display':'flex'});
        $('.formModal').css({'display':'none'});
    })
JS;
$this->registerJs($js);
?>
<div class="container-index">
    <div class="task-page-full">
        <div class="link-back">
            <a style="cursor: pointer;" onclick="history.back()"><img src="<?= Url::to(['img/task-page/arrow-task.svg']) ?>" /> Вернуться назад</a>
        </div>
        <div class="task-card">
            <div class="filter-task-item">
                <div class="filter-task-item-main">
                    <?php if ($task->status == 'Свободен') : ?>
                        <div class="status-task">
                            <p><?= $task->status ?></p>
                        </div>
                    <?php else : ?>
                        <div class="hi-order">
                            <p><?= $task->status ?></p>
                            <img src="<?= Url::to(['img/tasks/smite.svg']) ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <div class="filters-list">
                        <div class="filter-view filter-task-items">
                            <img src="<?= Url::to(['img/tasks/view.svg']) ?>" alt="">
                            <p><?= $task->views ?></p>
                        </div>
                        <div class="filter-view filter-task-items">
                            <img src="<?= Url::to(['img/tasks/human-icon.svg']) ?>" alt="">
                            <p><?= $task->responded ?></p>
                        </div>
                        <div class="filter-view filter-task-items">
                            <img src="<?= Url::to(['img/tasks/summ.svg']) ?>" alt="">
                            <p><?= $task->price > 0 ? $task->price : 'Договорная' ?></p>
                        </div>
                    </div>
                </div>
                <div class="right-item-filter">
                    <p><?= date('d', strtotime($task->date_public)) . ' ' . $arrMonth[date('n', strtotime($task->date_public))] ?></p>
                </div>
            </div>
            <div class="task-title">
                <h2 class="Font-size24"><?= $task->title ?></h2>
            </div>
            <div class="task-text-about-project">
                <div class="Font_size18">
                    <b>О проекте:</b><?= $task->about_project ?>
                </div>
            </div>
            <div class="tehnical-text">
                <div class="Font_size18"><b>Техническое задание:</b> <?= $task->technical_task ?></div>
            </div>
            <?php if (!empty($task->materials) && $task->materials != '[]') : ?>
                <?php $materials = json_decode($task->materials, 1) ?>
                <div class="file-block">
                    <img src="<?= Url::to(['img/task-page/file-icon.svg']) ?>" alt="">
                    <div class="file-list">
                        <ul>
                            <?php foreach ($materials as $material) : ?>
                                <li>
                                    <a download="" href="<?= Url::to([$material['image']]) ?>" target="_blank"><?= $material['name'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <div>
                <p><b>Срок выполнения:</b> <?= $task->deadline ?></p>
            </div>
            <div class="task-tag-list">
                <?php $tags = !empty($task->tags) ? json_decode($task->tags, 1) : [] ?>
                <?php foreach ($tags as $tag) : ?>
                    <div class="task-tag-item">
                        <p>#<?= $tag ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="task-button">
            <a class="Font-size28">Откликнуться</a>
        </div>
    </div>
</div>
<div class="modalRegister">
    <div class="modalRegisterContainer formModal">
        <div class="modalRegisterClose">
            &times;
        </div>
        <h2 class="Font-size24">Отклик на задание</h2>
        <form action="">
            <input type="text" placeholder="Введите имя">
            <textarea name="" placeholder="Сообщение" id="" cols="30" rows="10"></textarea>
        </form>
        <div class="upload-file">
            <div class="upload-link">
                <img src="<?= Url::to(['img/task-page/upload-file.svg']) ?>" alt="">
                <a class="Font-size18" href="">Добавить файлы</a>
            </div>
            <ul>
                <li><a href="">файл1.png</a></li>
            </ul>
        </div>
        <button class="upwout-button Font-size24">Откликнуться</button>
    </div>
    <div class="modalRegisterContainer success-modal">
        <div class="modalRegisterClose">
            &times;
        </div>
        <h2 class="Font-size24">Отклик на задание</h2>
        <p class="Font-size18">Отклик успешно отправлен!</p>
        <button>Перейти в сообщения</button>
    </div>
</div>