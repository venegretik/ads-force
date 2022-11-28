<?php

/** @var \yii\web\View $this */
/** @var string $content */

use yii\helpers\Url;

$this->registerCssFile(Url::to(['css/profile-performer/profile-news-private.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
?>
<div class="profile-news-private-container-full">
    <div class="bread-title">
        <h2 class="main_color_text Font-size18"><a href="<?= Url::to(['profile-news']) ?>">Новости проекта</a></h2>
        <h2 class="main_color_text Font-size18">-</h2>
        <h2 class="main_color_text Font-size18">Статья “<?= $news->title ?>”</h2>
    </div>
    <div class="profile-news-private-container">
        <div class="profile-news-full white_color_bg">
            <p class="news-day main_color_text"><?= date('Y-m-d', strtotime($news->date)) == date('Y-m-d') ? 'Сегодня' : date('d.m.Y', strtotime($news->date)) ?></p>
            <h2 class="main_color_text Font-size24"><?= $news->title ?></h2>
            <div class="profile-news-title" style="background: linear-gradient(0deg, rgba(48, 38, 38, 0.58), rgba(48, 38, 38, 0.58)), url('<?= $news->image ?>');
    background-repeat: no-repeat;
    background-size:cover;
    background-position: center;">
            </div>
            <div class="profile-news-content">
                <p class="opacity-text main_color_text">Автор: <?= $news->author ?></p>
                <p class="opacity-text main_color_text">Источник: <?= $news->source ?></p>
                <p class="main_color_text Font-size18"><?= $news->content ?></p>
            </div>
            <?php if (!empty($newses)) : ?>
                <div class="other-news">
                    <h2 class="Font-size24 main_color_text">Другие новости</h2>
                    <ul>
                        <?php foreach ($newses as $v) : ?>
                            <li class="main_color_text">
                                <a href="<?= Url::to(['profile-news-private', 'link' => $v['link']]) ?>">
                                    Статья «<?= $v['title'] ?>»
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>



        </div>
        <div class="contact-news white_color_bg">
            <img src="<?= Url::to(['img/profile/profile-tasks/telegram-icon.svg']) ?>" alt="">
            <h2 class="main_color_text">Больше новостей в Telegram</h2>
            <p class="main_color_text Font-size18">Никакого спама и рекламы, только лучшее для вашего бизнеса</p>
            <a href="">Подписаться</a>
        </div>
    </div>
</div>