<?php

use yii\web\JqueryAsset;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/create-portfolio.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerCssFile(Url::to(['css/slick-theme.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerCssFile(Url::to(['css/slick.css']), ['depends' => ['frontend\assets\ProfilePerformerAsset']]);
$this->registerJsFile(Url::to(['js/slick.min.js']), ['depends' => JqueryAsset::class]);
$js = <<< JS

$('.img-slider-items').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  prevArrow: $('.prev-img'),
nextArrow: $('.next-img'),
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
        slidesToShow: 1
      }
    }
  ]
});
$('.ModalClose').click(function(e){
    $('.modalPortfolio').fadeOut(300);
    $('.modalPortfolio').css({'overflow':'none'});
    $('body').css({'overflow':'auto'});
});

$('.button-main').click(function(e){
    $('.modalPortfolio').fadeIn(300);
    $('.modalPortfolio').css({'overflow':'auto'});
    $('body').css({'overflow':'none'});
});
JS;
$this->registerJs($js);
?>
<section>
    <div class="fon-custom" style="background: linear-gradient(90deg, #00D2FF 0%, #3A7BD5 100%);">
        <img src="<?= Url::to(['img/profile/private-profile/img-fon.png']) ?>" alt="">
    </div>
</section>
<div class="FormPortfolio">
    <div class="back-link">
        <a onclick="history.back()" class="Font-size18"><img src="<?= Url::to(['img/profile/private-profile/back-profile.svg']) ?>" alt="">Вернуться назад</a>
    </div>
    <div class="form-main-container">
        <div class="form-main-delete">
            <div class="form-main-bg white_color_bg">
                <svg width="86" height="78" viewBox="0 0 86 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5428 75.8512L38.2483 47.9991C39.9115 46.327 40.7431 45.491 41.7021 45.1778C42.5457 44.9022 43.4543 44.9022 44.2979 45.1778C45.2568 45.491 46.0885 46.3271 47.7518 47.9991L75.2725 75.6654M51.4 51.6667L63.4482 39.5547C65.1115 37.8826 65.9431 37.0466 66.9021 36.7333C67.7457 36.4578 68.6543 36.4578 69.4979 36.7333C70.4568 37.0466 71.2885 37.8826 72.9518 39.5547L85 51.6667M34.6 26.3333C34.6 30.9971 30.8392 34.7778 26.2 34.7778C21.5608 34.7778 17.8 30.9971 17.8 26.3333C17.8 21.6696 21.5608 17.8889 26.2 17.8889C30.8392 17.8889 34.6 21.6696 34.6 26.3333ZM21.16 77H64.84C71.8967 77 75.425 77 78.1203 75.6194C80.4911 74.405 82.4187 72.4673 83.6267 70.0839C85 67.3743 85 63.8273 85 56.7333V21.2667C85 14.1727 85 10.6257 83.6267 7.91612C82.4187 5.53273 80.4911 3.59498 78.1203 2.38058C75.425 1 71.8967 1 64.84 1H21.16C14.1033 1 10.575 1 7.87972 2.38058C5.50888 3.59498 3.58132 5.53273 2.37332 7.91612C1 10.6257 1 14.1727 1 21.2667V56.7333C1 63.8273 1 67.3743 2.37332 70.0839C3.58132 72.4673 5.50888 74.405 7.87972 75.6194C10.575 77 14.1033 77 21.16 77Z" stroke="#828282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <img src="<?= Url::to(['img/profile/private-profile/delete-icon.svg']) ?>" alt="">
        </div>
        <div class="text-pro-create">
            <p>Со статусом PRO вас увидят больше заказчиков, вы получите место в ТОПе среди лучше, а также кэшбэк на счет!</p>
            <button>Перейти на PRO</button>
        </div>
        <div class="text-about-project">
            <p class="Font-size18 main_color_text">О проекте</p>
            <div class="textAreaBlock">
                <div class="textAreaItems">
                    <div class="textAreaIcon white_color_bg">
                        <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1H8.38462C9.36388 1 10.303 1.39509 10.9955 2.09835C11.6879 2.80161 12.0769 3.75544 12.0769 4.75C12.0769 5.74456 11.6879 6.69839 10.9955 7.40165C10.303 8.10491 9.36388 8.5 8.38462 8.5H1V1Z" stroke="#1F1F1F" class="arrow-color" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1 8.5H9.30769C10.287 8.5 11.2261 8.89509 11.9185 9.59835C12.611 10.3016 13 11.2554 13 12.25C13 13.2446 12.611 14.1984 11.9185 14.9016C11.2261 15.6049 10.287 16 9.30769 16H1V8.5Z" stroke="#1F1F1F" stroke-width="2" class="arrow-color" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="textAreaIcon white_color_bg">
                        <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.625 1V6.83333C2.625 8.15942 3.13861 9.43118 4.05285 10.3689C4.96709 11.3065 6.20707 11.8333 7.5 11.8333C8.79293 11.8333 10.0329 11.3065 10.9471 10.3689C11.8614 9.43118 12.375 8.15942 12.375 6.83333V1" stroke="#1F1F1F" class="arrow-color" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1 16H14" class="arrow-color" stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="textAreaIcon white_color_bg" style="border-right:0px ;">
                        <p class="main_color_text">/</p>
                    </div>
                </div>
                <textarea name="" id="" cols="30" rows="10" class="white_color_bg main_color_text" placeholder="Введите описание проекта"></textarea>
            </div>
        </div>
        <div class="file-upload">
            <div class="add-file">
                <img src="<?= Url::to(['img/task-page/file-icon.svg']) ?>" alt="">
                <a href="" class="Font-size18">Добавить вложения</a>
            </div>
            <div class="file-list">
                <ul>
                    <li>Файл 1.png</li>
                    <li>Файл 1.png</li>
                    <li>Файл 1.png</li>
                </ul>
            </div>
        </div>
    </div>
    <button class="button-main main_color_text Font-size28">Предпросмотр</button>
</div>
<div class="modalPortfolio">
    <div class="modalPortfolioContainer">
        <div class="portfolioBG">
            <h2 class="Font-size36">UI/UX дизайн для Автошколы</h2>
        </div>
        <div class="ModalClose">
            &times;
        </div>
        <div class="portfolioInformation">
            <h2 class="Font-size24">О проекте: </h2>
            <p class="Font-size24">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque. </p>
        </div>
        <div class="img-slider-full">
            <h2 class="Font-size24">Изображения:</h2>
            <div class="img-slider">
                <div class="img-slider-items">
                    <div class="img-slider-item">
                        <img src="../../img/profile/private-profile/bg-slider.png" alt="">
                    </div>
                    <div class="img-slider-item">
                        <img src="../../img/profile/private-profile/bg-slider.png" alt="">
                    </div>
                    <div class="img-slider-item">
                        <img src="../../img/profile/private-profile/bg-slider.png" alt="">
                    </div>
                </div>
                <div class="arrows-slider container-index">
                    <img class="prev-img" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
                    <img class="arrows-slider-right next-img" src="<?= Url::to(['img/index/arrowSlider.svg']) ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>