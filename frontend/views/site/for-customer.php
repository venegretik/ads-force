<?php

use console\models\Categories;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */

$this->title = 'My.Force';
$this->registerCssFile(Url::to(['css/index.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/component-css/performers-card.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/slick-theme.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/slick.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerJsFile(Url::to(['js/slick.min.js']), ['depends' => JqueryAsset::class]);
$js = <<< JS
const availableScreenWidth = window.screen.availWidth;
if(availableScreenWidth <=735){
$('.specialization-items').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
        slidesToShow: 3,
        vertical: true,
        verticalSwiping: true,
        prevArrow: $('.prev-spec'),
        nextArrow: $('.next-spec')
})
}
$('.performers-cards-mob').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    prevArrow: $('.prev-performer'),
    nextArrow: $('.next-performer'),
    vertical: true,
        verticalSwiping: true
});
  $('.rewiev-items').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  prevArrow: $('.prev'),
nextArrow: $('.next'),
responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 580,
      settings: {
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 2
      }
    }
  ]
});

JS;
$this->registerJs($js);
AppAsset::register($this);
?>
<section class="Freelancer-Full">
    <div class="Freelancer-content-center">
        <div class="Freelancer-content-text">
            <h1 class="Font-size50">Маркетологи, дизайнеры, разработчики для вашего бизнеса!</h1>
            <p class="Font-size28">Работайте с исполнителями и заказчиками по всему миру!</p>
        </div>
        <div class="Freelancer-content-buttons">
            <div class="Freelancer-content-buttons-black">
                <a href="<?= Url::to(['index']) ?>">
                    <button>
                        <img class="Freelancer-content-buttons-black-img" src="<?= Url::to(['img/index/iconMenegerButton.svg']) ?>" alt="">
                        <p>Заказчику</p>
                    </button>
                </a>
            </div>
            <div class="Freelancer-content-buttons-prev">
                <a href="<?= Url::to(['tasks']) ?>">
                    <button class="button-active">
                        <p>Найти заказ</p>
                    </button>
                </a>
                <a href="<?= Url::to(['signup']) ?>">
                    <button>
                        <p>Разместить портфолио</p>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="Freelancer-absolute-img">
        <img src="<?= Url::to(['img/index/Freelancer-mask.png']) ?>" alt="">
    </div>
    <div class="Meneger-absolute-img" style="display: block;">
        <img src="<?= Url::to(['img/index/Meneger.png']) ?>" alt="">
    </div>
</section>
<section class="Main-info">
    <div class="Main-info-bg">
        <div class="Main-info-items container-index">
            <div class="Main-info-item">
                <h3 class="Font-size36">500+</h3>
                <p class="Font-size24">Специалистов на бирже</p>
            </div>
            <div class="Main-info-item">
                <h3 class="Font-size36">1900+</h3>
                <p class="Font-size24">Заказов уже выполнено</p>
            </div>
            <div class="Main-info-item">
                <h3 class="Font-size36">1710+</h3>
                <p class="Font-size24">Положительных отзывов</p>
            </div>
        </div>
    </div>
</section>
<section class="performers-container">
    <div class="performers-title container-index">
        <h1 class="Font-size36">ТОП-исполнители</h1>
        <a>
            <button class="topShow">Хочу в ТОП</button>
        </a>
    </div>
    <div class="performers-cards desctop-performer container-index">
        <?php if (!empty($performers)) : ?>
            <?php foreach ($performers as $performer) : ?>
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
                            <p><?= $performer['position'] ?></p>
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
                                    <div style="background-image: url(<?= Url::to(['img/index/stars.png']) ?>); height: 20px; background-repeat: no-repeat;" class="stars">
                                        <div style="background-image: url(<?= Url::to(['img/index/yellowStars.png']) ?>); height: 20px; background-repeat: no-repeat; width: <?= $performer['rating'] ?>%" class="yellow_stars"></div>
                                    </div>
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
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="performers-cards-mob performers-cards container-index">
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
                                <p><?= $performer['position'] ?></p>
                            </div>
                            <?php
                            $category = Categories::find()->asArray()->where(['id' => $performer['specialization_id']])->select('title')->one();
                            $skils = json_decode($performer['skills'], 1);
                            ?>
                            <p class="text-italic"><?= $category['title'] ?></p>
                            <p class="liked-message">1810 положительных отзывов</p>
                            <ul>
                                <?php if ($skils) : ?>
                                    <?php foreach ($skils as $k => $skill) : ?>
                                        <?php if ($k == 3) break; ?>
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
                                        <?php foreach ($skils as $k => $skill) : ?>
                                            <?php if ($k == 3) break; ?>
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
    <div class="arrows-slider container-index">
        <img class="prev-performer" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
        <img class="arrows-slider-right next-performer" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
    </div>
</section>
<section class="specialization-full">
    <div class="performers-title-specialization container-index">
        <h1 class="Font-size36">Специализация</h1>
    </div>
    <div class="specialization-items container-index">
        <?php if (!empty($categories)) : ?>
            <?php foreach ($categories as $v) : ?>
                <a href="<?= Url::to(['performers-page']) ?>">
                    <div class="specialization-item" style="background-image: linear-gradient(0deg, rgba(63, 63, 63, 0.5), rgba(63, 63, 63, 0.5)), url(<?= Url::to([$v['image']]) ?>);">
                        <p class="Font-size24"><?= $v['title'] ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
        <a class="see_more" href="<?= Url::to(['performers-catalog']) ?>">Все категории</a>
    </div>
    <div class="arrows-slider-specialization">
        <img class="prev-spec" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
        <img class="arrows-slider-right next-spec" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
    </div>
</section>
<section class="progressBar">
    <div class="progressBarTitle container-index">
        <h2 class="Font-size36">Как начать работу с ADSFORCE</h2>
        <a href="<?= Url::to(['index']) ?>">
            <button class="progressBlackButton">
                <!--progressBarButton-->
                <img src="<?= Url::to(['img/index/iconMenegerButton.svg']) ?>" alt="">
                <p>Заказчику</p>
            </button>
        </a>
    </div>
    <div class="progress-bar-content">
        <div class="progress-bar-img">
            <img src="<?= Url::to(['img/index/ImgManagerBar.png']) ?>" alt="">
        </div>
        <div>
            <ul>
                <li>
                    <div>
                        <h2 class="Font-size24">Опубликуйте заказ</h2>
                        <p>Расскажите о задаче и опубликуйте в каталоге</p>
                    </div>
                </li>
                <li class="client">
                    <div>
                        <h2 class="Font-size24">Опубликуйте заказ</h2>
                        <p>Расскажите о задаче и опубликуйте в каталоге</p>
                    </div>
                </li>
                <li class="success">
                    <div>
                        <h2 class="Font-size24">Опубликуйте заказ</h2>
                        <p>Расскажите о задаче и опубликуйте в каталоге</p>
                    </div>
                </li>
                <li class="chat">
                    <div>
                        <h2 class="Font-size24">Опубликуйте заказ</h2>
                        <p>Расскажите о задаче и опубликуйте в каталоге</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="rewiev-full">
    <div class="rewiew-title container-index">
        <h2 class="Font-size36">Отзывы</h2>
    </div>
    <div class="rewiev-items container-index">
        <?php if (!empty($reviews)) : ?>
            <?php foreach ($reviews as $review) : ?>
                <div class="rewiev-card">
                    <div class="rewiev-card-top">
                        <img src="<?= Url::to([$review['info']['photo']]) ?>" alt="">
                        <div class="rewiev-card-title">
                            <h2 class="Font_size24"><?= $review['info']['name'] ?></h2>
                            <p>Заказчик</p>
                        </div>
                    </div>
                    <div class="rewiev-card-content">
                        <p><?= $review['text'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    <div class="arrows-slider container-index">
        <img class="prev" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
        <img class="arrows-slider-right next" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
    </div>
</section>