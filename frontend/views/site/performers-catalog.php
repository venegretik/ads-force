<?php

use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->registerCssFile(Url::to(['css/performers-catalog.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/component-css/filter.css']), ['depends' => ['frontend\assets\AppAsset']]);

$js = <<< JS
    $('.2-row').find('rect').css({'fill':'#1EBBED'});
    $('.1-row').find('rect').css({'fill':'#D9D9D9'});
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

$('.2-row').click(function (e) {
    $(this).find('rect').css({'fill':'#1EBBED'});
    $('.1-row').find('rect').css({'fill':'#D9D9D9'});
    $('.category-item').css({'width':'calc(50% - 5px)'});
    $('.category-item').css({'max-width':'350px'});
    $('.category-items').css({'flex-wrap':'wrap'});
});
$('.1-row').click(function (e) {
    $(this).find('rect').css({'fill':'#1EBBED'});
    $('.2-row').find('rect').css({'fill':'#D9D9D9'});
    $('.category-item').css({'width':'100%'});
    $('.category-item').css({'max-width':'none'});
    $('.category-items').css({'flex-wrap':'wrap'});
});

$('.tasks-content-main').on('submit', '.filter_form', function (e) {
    e.preventDefault();
    $.pjax.reload({
        container: '#category_container',
        url: '/performers-catalog',
        data: $(this).serialize(),
        type: 'GET',
    });
})

$('.tasks-content-main').on('click', '.change_filter', function () {
    $('.filter_form').submit()
})
JS;
$this->registerJs($js);
AppAsset::register($this);
?>
<div class="catalog-container">
    <section class="title-tasks">
        <div class="title-text">
            <h2 class="Font-size36">Каталог исполнителей</h2>
            <img src="<?= Url::to(['img/tasks/faq.svg']) ?>" alt="">
        </div>
        <div class="message-title">
            <p>В данном разделе вы можете найти подходящего исполнителя в соответсвии с желаемым опытом и оплатой работ. Для удобства воспользуйтесь фильтрами!</p>
        </div>
    </section>
    <section class="category-title">
        <h2 class="Font-size24">Интернет продвижение и реклама</h2>
        <p class="Font-size18">Пусть о вашем бизнесе узнают новые клиенты</p>
    </section>
    <section class="filter-view-full">
        <div class="filter-view-category">
            <svg class="2-row" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="8" height="8" fill="#E0E0E0" />
                <rect x="9" width="8" height="8" fill="#E0E0E0" />
                <rect x="9" y="9" width="8" height="8" fill="#E0E0E0" />
                <rect y="9" width="8" height="8" fill="#E0E0E0" />
            </svg>
            <svg class="1-row" width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="3.4" height="3.4" fill="#D9D9D9" />
                <rect y="4.53333" width="3.4" height="3.4" fill="#D9D9D9" />
                <rect y="9.06665" width="3.4" height="3.4" fill="#D9D9D9" />
                <rect y="13.6" width="3.4" height="3.4" fill="#D9D9D9" />
                <rect x="4.5332" width="15.8667" height="3.4" fill="#D9D9D9" />
                <rect x="4.5332" y="4.53333" width="15.8667" height="3.4" fill="#D9D9D9" />
                <rect x="4.5332" y="9.06665" width="15.8667" height="3.4" fill="#D9D9D9" />
                <rect x="4.5332" y="13.6" width="15.8667" height="3.4" fill="#D9D9D9" />
            </svg>
        </div>
    </section>
    <div class="tasks-content-main">
        <section class="category-list">
            <?php Pjax::begin(['id' => 'category_container']) ?>
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

            <div class="category-items">
                <?php if (!empty($categories)) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <div style="position: relative; background: url(<?= Url::to([$category['image']]) ?>)" class="category-item">
                            <a class="category_link" href="<?= Url::to(['performers-page']) ?>"></a>
                            <h3 class="Font-size18"><?= $category['title'] ?></h3>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="pagination-tasks">
                <form class="filter_form">
                    <div class="view-tasks">
                        <p class="Font-size18">Отображать по:</p>
                        <label class="pageSize_label Font-size18 <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 5 ? 'active-view' : '' ?>">
                            5
                            <input <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 5 ? 'checked' : '' ?> class="change_filter" style="display: none;" type="radio" name="pageSize" value="5">
                        </label>
                        <label class="pageSize_label Font-size18 <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 10 ? 'active-view' : '' ?>">
                            10
                            <input <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 10 ? 'checked' : '' ?> class="change_filter" style="display: none;" type="radio" name="pageSize" value="10">
                        </label>
                        <label class="pageSize_label Font-size18 <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 15 ? 'active-view' : '' ?>">
                            15
                            <input <?= !empty($_GET['pageSize']) && $_GET['pageSize'] == 15 ? 'checked' : '' ?> class="change_filter" style="display: none;" type="radio" name="pageSize" value="15">
                        </label>
                    </div>
                </form>
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </div>
            <?php Pjax::end(); ?>
        </section>
    </div>
</div>