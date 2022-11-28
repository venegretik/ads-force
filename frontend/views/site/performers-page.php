<?php

use console\models\Categories;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\web\JqueryAsset;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->registerCssFile(Url::to(['css/component-css/filter.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/component-css/performers-card.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/performers-page.css']), ['depends' => ['frontend\assets\AppAsset']]);
$js = <<< JS
let statusFilter = false
$('.select-popular p').click(function (e) {
    if($('.select-list').css('display') === "block")
        $('.select-list').fadeOut(300);
    else
        $('.select-list').fadeIn(300);
});
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


JS;
$this->registerJs($js);
AppAsset::register($this);
?>
<div class="container-index">
    <section class="title-tasks">
        <div class="title-text">
            <h2 class="Font-size36">Каталог исполнителей</h2>
            <img src="<?= Url::to(['img/tasks/faq.svg']) ?>" alt="">
        </div>
        <div class="message-title">
            <p>В данном разделе вы можете найти подходящего исполнителя в соответсвии с желаемым опытом и оплатой работ. Для удобства воспользуйтесь фильтрами!</p>
        </div>
    </section>
    <section>
        <div class="title-performers">
            <h2 class="Font-size24">Контекстная реклама</h2>
            <p class="Font-size18">Лучшие маркетологи здесь!</p>
        </div>
    </section>

    <?php Pjax::begin(['id' => 'perf__block']) ?>
    <section class="select-filter">
        <div class="mobile-filter-open">
            <img src="<?= Url::to(['img/tasks/filter-icon.svg']) ?>" alt="">
            <p>Фильтры</p>
        </div>
        <div class="select-popular">
            <P>Сортировать по:</P>
            <select class="select__pop" name="" id="">
                <option value="">Новизне</option>
                <option value="">Рекомендуемые</option>
            </select>
        </div>
    </section>
    <div class="main-content">
        <section class="filter">
            <div class="filter-close">
                &times;
            </div>
            <div class="filter-open-mobile">
                <img src="<?= Url::to(['img/tasks/filter-open.svg']) ?>" alt="">
                <p class="Font-size18">Фильтры</p>
            </div>
            <div style="padding-top: 0; border: none;" class="filter-full">
                <div class="title-categories">
                    <h2 class="Font-size18">Категория</h2>
                    <a href="" class="Font-size18">Сбросить</a>
                </div>
                <?php if (!empty($categories)) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <div class="categories-select">
                            <div class="filter-item">
                                <div class="categories-select-top">
                                    <b class="Font-size18"><?= $category['title'] ?></b>
                                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L7 7L13 1" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="categories-select-bottom">
                                    <ul>
                                        <?php if (!empty($category['subCategories'])) : ?>
                                            <?php foreach ($category['subCategories'] as $v) : ?>
                                                <li>
                                                    <label class="custom-checkbox">
                                                        <input type="checkbox" value="<?= $v['title'] ?>">
                                                        <span class="Font-size18"><?= $v['title'] ?></span>
                                                    </label>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="filter-show-more">
                    <a href="" class="Font-size18">Ещё +</a>
                </div>
            </div>
        </section>
        <div class="performers-full">
            <div class="performers-cards">
                <?php if (!empty($performers)) : ?>
                    <?php foreach ($performers as $performer) : ?>
                        <a href="<?= Url::to(['profile-performer/profile-private']) ?>">
                            <div class="performers-card">
                                <div class="performers-card-left">
                                    <img src="<?= Url::to([$performer['photo']]) ?>" alt="">
                                    <div class="performers-card-stars">
                                        <div style="background-image: url(<?= Url::to(['img/index/stars.png']) ?>); height: 20px; background-repeat: no-repeat;" class="stars">
                                            <div style="background-image: url(<?= Url::to(['img/index/yellowStars.png']) ?>); height: 20px; background-repeat: no-repeat; width: <?= $performer['rating'] ?>%" class="yellow_stars"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="performers-card-right">
                                    <div class="performers-card-right-title">
                                        <h2 class="Font-size20"><?= $performer['name'] ?></h2>
                                        <p><?= $performer['position'] == 'Профи' ? 'PRO' : '' ?></p>
                                    </div>
                                    <?php
                                    $category = Categories::find()->asArray()->where(['id' => $performer['specialization_id']])->select('title')->one();
                                    $skils = json_decode($performer['skills'], 1);
                                    ?>
                                    <p class="text-italic"><?= $category['title'] ?></p>
                                    <p class="liked-message">1810 положительных отзывов</p>
                                    <ul>
                                        <?php if ($skils) : ?>
                                            <?php foreach ($skils as $skill) : ?>
                                                <li>
                                                    <p class="Font-size20"><?= $skill ?></p>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <div class="performers-card-mobile">
                                    <div class="performers-card-mobile-top">
                                        <img src="<?= Url::to([$performer['photo']]) ?>" alt="">
                                        <div>
                                            <div class="performers-card-right-title">
                                                <h2 class="Font-size20"><?= $performer['name'] ?></h2>
                                                <p><?= $performer['position'] ?></p>
                                            </div>
                                            <p class="text-italic"><?= $category['title'] ?></p>
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
                                        <p class="liked-message">1810 положительных отзывов</p>
                                        <ul>
                                            <?php if ($skils) : ?>
                                                <?php foreach ($skils as $skill) : ?>
                                                    <li>
                                                        <p class="Font-size20"><?= $skill ?></p>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="pagination-items">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>