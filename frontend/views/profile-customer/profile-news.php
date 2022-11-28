<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->registerCssFile(Url::to(['css/profile-performer/profile-news.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$js = <<< JS
$('.news__block').on('change', '.date__checkbox', function () {
    $('.news-category').submit();
})
$(".news__block").on('submit', '.news-category', function (e) {
    e.preventDefault();
    $.pjax.reload({
        url: '',
        type: 'POST',
        data: $(this).serialize(),
        container: '#newsContainer'
    })
})
JS;
$this->registerJs($js)
?>
<div class="news__block">
    <?php Pjax::begin(['id' => 'newsContainer']) ?>
    <div class="title-news">
        <h2 class="Font-size36 main_color_text">Новости проекта</h2>
    </div>
    <?= Html::beginForm('', 'post', ['class' => 'news-category']) ?>
    <label class="<?= empty($_POST['date']) || $_POST['date'] == 'all' ? 'active-category' : '' ?> Font-size18 main_color_text">
        Все
        <input class="date__checkbox" style="display: none;" type="checkbox" name="date" value="all">
    </label>
    <label class="<?= !empty($_POST['date']) && $_POST['date'] == 'day' ? 'active-category' : '' ?> Font-size18 main_color_text">
        За сутки
        <input class="date__checkbox" style="display: none;" type="checkbox" name="date" value="day">
    </label>
    <label class="<?= !empty($_POST['date']) && $_POST['date'] == 'week' ? 'active-category' : '' ?> Font-size18 main_color_text">
        За неделю
        <input class="date__checkbox" style="display: none;" type="checkbox" name="date" value="week">
    </label>
    <?= Html::endForm(); ?>

    <div class="news-list">
        <?php if (!empty($news)) : ?>
            <?php foreach ($news as $k => $i) : ?>
                <?php if ($k == 0) : ?>
                    <a data-pjax="0" href="<?= Url::to(['profile-news-private', 'link' => $i['link']]) ?>" class="new-news">
                        <div class="new-news-item white_color_bg">
                            <img src="<?= Url::to(['/img/profile/profile-tasks/news-img.svg']) ?>" alt="">
                            <div class="new-news-text">
                                <p class="new-news-day main_color_text"><?= date('Y-m-d', strtotime($i['date'])) == date('Y-m-d') ? 'Сегодня' : date('d.m.Y', strtotime($i['date'])) ?></p>
                                <h2 class="new-news-title Font-size18 main_color_text">Статья «<?= $i['title'] ?>»</h2>
                                <p class="new-news-content main_color_text"><?= $i['subtitle'] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="news-medium-level">
            <?php if (!empty($news)) : ?>
                <?php foreach ($news as $k => $i) : ?>
                    <?php if ($k != 0) : ?>
                        <a data-pjax="0" href="<?= Url::to(['profile-news-private', 'link' => $i['link']]) ?>" class="news-medium-item white_color_bg">
                            <p class="new-news-day main_color_text"><?= date('Y-m-d', strtotime($i['date'])) == date('Y-m-d') ? 'Сегодня' : date('d.m.Y', strtotime($i['date'])) ?></p>
                            <h2 class="Font-size18 main_color_text">Статья «<?= $i['title'] ?>»</h2>
                            <p class="new-news-content main_color_text"><?= $i['subtitle'] ?></p>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
    <div class="pagination-items">
        <?= LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>