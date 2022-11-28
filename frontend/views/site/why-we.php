<?php

use console\models\Categories;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/why-we.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/slick-theme.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerCssFile(Url::to(['css/slick.css']), ['depends' => ['frontend\assets\AppAsset']]);
$this->registerJsFile(Url::to(['js/slick.min.js']), ['depends' => JqueryAsset::class]);
$js = <<< JS
$('.slider-items').slick({
    slidesToShow: 2,
  slidesToScroll: 1,
  prevArrow: $('.prev'),
nextArrow: $('.next'),
responsive: [
    {
      breakpoint: 1070,
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: '20%'
      }
    }
]
})

$('.slider-item').click(function(e) {
    let id = $(this).attr('data-id');
    $.ajax({
        url: '/site/show-story',
        data: {id: id},
        type: 'POST',
        dataType: 'JSON',
    }).done(function (rsp) {
        if(!rsp.status)
            location.reload();

        $('#modalImg').attr('src', rsp.story.image);
        $('#modalTitle').text(rsp.story.title);
        $('#modalContent').html(rsp.story.content);
        $('#modalWhatDo').text('');
        let whatDo = JSON.parse(rsp.story.what_do);
        whatDo.map(e => {
            $('#modalWhatDo').append(`
                <li>
                    <img src="/img/why-we/list-icon.svg" alt="">
                    `+ e +`
                </li>
            `)

        });
        $('#modalTerm').text(rsp.story.term);
        $('body').css({'overflow':'hidden'})
        $('.slide-modal').fadeIn(1);
    })
    
})
$('.slide-close').click(function(e) {
    $('.slide-modal').fadeOut(1);
    $('body').css({'overflow':'auto'})
})
JS;
$this->registerJs($js);
AppAsset::register($this);
?>
<div class="container-index">
    <div class="why-we-full">
        <section>
            <div class="why-we-title">
                <div class="why-we-text">
                    <h2 class="Font-size36">Почему мы</h2>
                    <div class="information-title">
                        <p class="Font-size24"><b>Платформа ADS.FORCE</b> - крупная биржа для поиска специалистов и клиентов по маркетингу, дизайну и разработке, дающая возможность сотрудничать с исполнителями и заказчиками не только в пределах своей страны, но и за рубежом.</p>
                        <p class="Font-size24">На ADS.FORCE Вы можете выступать как в роли заказчика, так и исполнителя. Опубликуйте портфолио или разместите заказ через <a href="">Личный Кабинет</a>. Найдите лучшего исполнителя в <a href="">Каталоге специалистов</a> или выберите задачу для выполнения в <a href="">Каталоге заданий</a>.</p>
                        <p class="Font-size24">Ознакомьтесь с другими проектами от разработчиков ADS.FORCE:</p>
                    </div>
                </div>
                <div class="why-we-link-block mobile-link">
                    <div class="why-we-links">
                        <ul>
                            <li>
                                <a href="" class="Font-size24">MyForce</a>
                            </li>
                            <li class="f-end-link">
                                <a href="" class="Font-size24 green-link">Lead.Force</a>
                            </li>
                            <li>
                                <a href="" class="Font-size24 blue-link">Dev.Force</a>
                            </li>
                            <li class="f-end-link">
                                <a href="" class="Font-size24 darkblue-link">Skill.Force</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="why-we-img">
                    <img src="<?= Url::to(['img/why-we/human.png']) ?>" alt="">
                </div>
            </div>
        </section>
        <section>
            <div class="why-we-link-block link-desc">
                <div class="why-we-links">
                    <ul>
                        <li>
                            <a href="" class="Font-size24">MyForce</a>
                        </li>
                        <li class="f-end-link">
                            <a href="" class="Font-size24 green-link">Lead.Force</a>
                        </li>
                        <li>
                            <a href="" class="Font-size24 blue-link">Dev.Force</a>
                        </li>
                        <li class="f-end-link">
                            <a href="" class="Font-size24 darkblue-link">Skill.Force</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <div class="advantage-company">
                <div class="advantage-title">
                    <h2 class="Font-size36">Преимущества Ads.Force</h2>
                </div>
                <div class="advantage-list">
                    <div class="advantage-item">
                        <h3 class="">ИСПОЛНИТЕЛЮ</h3>
                        <ul>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Фильтры для быстрого и легкого поиска заказа;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                        </ul>
                    </div>
                    <div class="advantage-item">
                        <h3 class="f-end-advantage Font-size24">ЗАКАЗЧИКУ</h3>
                        <ul>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Фильтры для быстрого и легкого поиска заказа;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                            <li class="Font-size24"><img src="<?= Url::to(['img/why-we/advantage-icon.svg']) ?>" alt="">Удобный личный кабинет;</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="slider-why-we">
                <div class="slider-title">
                    <h2 class="Font-size36">Почему мы</h2>
                </div>
                <div class="slider-items">
                    <?php foreach ($stories as $story) : ?>
                        <div data-id="<?= $story['id'] ?>" style="background-image: url(<?= Url::to([$story['image']]) ?>);" class="slider-item">
                            <h3 class="Font-size36"><?= $story['title'] ?></h3>
                            <div class="slide-link">
                                <a class="Font-size18">Посмотреть</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="arrows-slider-specialization">
                    <img class="prev" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
                    <img class="arrows-slider-right next" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
                </div>
            </div>
        </section>
        <section>
            <div class="how-work">
                <div class="how-work-title">
                    <h2 class="Font-size36">Как работать с Ads.Force</h2>
                </div>
                <div class="how-work-steps">
                    <div class="how-work-step">
                        <div class="number-step">
                            <h3>1</h3>
                        </div>
                        <div class="step-content">
                            <h3 class="Font-size24">Зарегистрируйтесь</h3>
                            <p class="Font-size24">Расскажите о себе и услугах, которые вы можете предоставить</p>
                        </div>
                    </div>
                    <div class="how-work-step">
                        <div class="number-step">
                            <h3>2</h3>
                        </div>
                        <div class="step-content">
                            <h3 class="Font-size24">Зарегистрируйтесь</h3>
                            <p class="Font-size24">Расскажите о себе и услугах, которые вы можете предоставить</p>
                        </div>
                    </div>
                </div>
                <a href="">
                    <div class="download-link">
                        <button class="Font-size28">Скачать руководство по работе с платформой</button>
                </a>
            </div>
    </div>
    </section>

    <div class="slide-modal">
        <div class="modal-container">
            <div class="modal-img">
                <p id="modalTitle" class="Font-size36">Разработка брендинга</p>
                <div class="slide-close">
                    &times;
                </div>
                <img id="modalImg" src="<?= Url::to(['img/why-we/fon-slider.png']) ?>" alt="">
            </div>
            <div class="slide-modal-text">
                <div class="about-project">
                    <h2 class="Font-size24">О проекте: </h2>
                    <div id="modalContent" class="Font-size24"></div>
                </div>
                <div class="slide-list">
                    <h2 class="Font-size24">Что сделали:</h2>
                    <ul id="modalWhatDo">


                    </ul>
                </div>
                <div class="time-project">
                    <h2 class="Font-size24">За какой срок: <span id="modalTerm" class="Font-size24"></span>
                    </h2>

                </div>
            </div>
        </div>
    </div>
</div>
</div>