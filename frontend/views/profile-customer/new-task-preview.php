<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/task-page.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/component-css/task-item.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/new-task-preview.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);

$js = <<< JS
$('.save__task').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: 'save-task',
    data: $(this).serialize(),
    type: 'POST',
    dataType: 'JSON'
  })
})
JS;
$this->registerJs($js);
?>
<div class="Profile-container">
    <div class="task-page-full">
        <div class="link-back">
            <a href="<?= Url::to(['profile-create-task', 'link' => $_GET['link']]) ?>">
                <img src="<?= Url::to(['img/task-page/arrow-task.svg']) ?>"/> Вернуться назад</a>
        </div>
        <div class="task-card white_color_bg">
            <div class="filter-task-item">
                <div class="filter-task-item-main">
                    <div class="status-task">
                        <p>Свободен</p>
                        <div class="date-mobile">
                            <p><?= date('d.m.Y', strtotime($task['date_public'])) ?></p>
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
                            <p><?= !empty($task['price']) ? $task['price'] : 'Договорная' ?></p>
                        </div>
                    </div>
                </div>
                <div class="right-item-filter">
                    <p><?= date('d.m.Y', strtotime($task['date_public'])) ?></p>
                    <a href="<?= Url::to(['profile-create-task', 'link' => $_GET['link']]) ?>">
                        <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    </a>
                    <img id="delete__task" src="<?= Url::to(['img/profile/profile-tasks/delete-icon.svg']) ?>" alt="">
                </div>
            </div>
            <div class="task-title">
                <h2 class="Font-size24 main_color_text"><?= $task['title'] ?></h2>
            </div>
            <div class="task-text-about-project">
                <div class="Font_size18 main_color_text">
                    <b>О проекте:</b><?= $task['about_project'] ?>
                </div>
            </div>
            <div class="tehnical-text">
                <div class="Font_size18 main_color_text"><b>Техническое задание:</b> <?= $task['technical_task'] ?>
                </div>
            </div>
            <!-- <div class="file-block">
                <img src="<?= Url::to(['img/task-page/file-icon.svg']) ?>" alt="">
                <div class="file-list">
                    <ul>
                        <li>
                            <a download="" href="<?= Url::to(['img/task-page/file-icon.svg']) ?>" target="_blank">dsadasda</a>
                        </li>
                    </ul>
                </div>
            </div> -->
            <div>
                <p class="main_color_text"><b>Срок выполнения:</b> <?= $task['deadline'] ?></p>
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
        <div class="task-button">
            <?= Html::beginForm('', 'post', ['class' => 'save__task']) ?>
            <input type="hidden" name="id" value="<?= !empty($_GET['link']) ? $_GET['link'] : '' ?>">
            <button class="Font-size28">Сохранить</button>
            <?= Html::endForm(); ?>
        </div>
    </div>
</div>