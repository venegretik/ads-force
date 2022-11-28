<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */
$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/profile-create-task.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$js = <<< JS

$('.create-task-select-title').click(function(){
    if($(this).parent().find('.select-category-list').css('display') == "none"){
        $(this).parent().find('.select-category-list').fadeIn(300);
        $(this).find('img').css({'transform':'rotate(-180deg) '})
}
    else{
        $(this).parent().find('.select-category-list').fadeOut(300);
        $(this).find('img').css({'transform':'rotate(0deg)'})
    }
})
$('.container').click(function(){
    $('.select-category-list').fadeOut(300);
    let text = $(this).text().trim();
    if(text === "Своя цена")
        $('.Summ').fadeIn(300);
    else
        $('.Summ').fadeOut(300);
    $(this).parents('.create-task-select').find('.create-task-select-title img').css({'transform':'rotate(0deg)'})
    $(this).parents('.create-task-select').find('.create-task-select-title p').text(text)
});

$('.create__task_form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        url: 'create-task',
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'JSON',
    }).done(function (rsp) {
        console.log(rsp);
    })
})

JS;
$this->registerJs($js);
?>
<section>
    <div class="fon-custom" style="background: linear-gradient(90deg, #00D2FF 0%, #3A7BD5 100%);">
        <img src="<?= Url::to(['img/profile/private-profile/img-fon.png']) ?>" alt="">
    </div>
</section>
<div class="Profile-container" style="max-width: 1110px; padding:0px 20px;">
    <div class="back-link">
        <a onclick="history.back()" class="Font-size18"><img src="<?= Url::to(['img/profile/private-profile/back-profile.svg']) ?>" alt="">Вернуться назад</a>
    </div>
    <div class="create-task-full">
        <?= Html::beginForm('', 'post', ['class' => 'create__task_form']) ?>
        <div class="create-task-select-full">
            <div class="create-task-select-item">
                <p class="Font-size18 main_color_text">Статус</p>
                <div class="create-task-select">
                    <div class="create-task-select-title">
                        <p class="Font-size18 main_color_text">Свободен</p>
                        <img src="<?= Url::to(['img/profile/profile-tasks/arrow-tehnical.svg']) ?>" alt="">
                    </div>
                    <div class="select-category-list">
                        <ul>
                            <li>
                                <label class="container Font-size18 main_color_text">Свободен
                                    <input type="radio" name="statusprice">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container Font-size18 main_color_text">В работе
                                    <input type="radio" name="statusprice">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container Font-size18 main_color_text">Завершен
                                    <input type="radio" name="statusprice">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="create-task-select-item">
                <p class="Font-size18 main_color_text">Цена</p>
                <div class="create-task-select">
                    <div class="create-task-select-title">
                        <p class="Font-size18 main_color_text">Договорная</p>
                        <img src="<?= Url::to(['img/profile/profile-tasks/arrow-tehnical.svg']) ?>" alt="">
                    </div>
                    <div class="select-category-list">
                        <ul>
                            <li>
                                <label class="container Font-size18 main_color_text">Договорная
                                    <input type="radio" name="show_price">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container Font-size18 main_color_text">Своя цена
                                    <input type="radio" name="show_price">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pro-information">
                <div class="pro-information-date">
                    <p>21 сентября</p>
                    <img src="<?= Url::to(['img/profile/profile-tasks/replace-input.svg']) ?>" alt="">
                    <img src="<?= Url::to(['img/profile/profile-tasks/delete-icon.svg']) ?>" alt="">
                </div>
                <p>Со статусом PRO ваше задание увидят больше исполнителей, вы получите место в ТОПе среди лучше, а также кэшбэк на счет!</p>
                <a href="profile-pro">Перейти на PRO</a>
            </div>
        </div>
        <div class="task-form-title">
            <p class="Font-size18 main_color_text">Заголовок</p>
            <input required type="text" name="title" class="white_color_bg main_color_text" placeholder="Заголовок">
        </div>
        <div class="task-form-title Summ" style="display:none;">
            <p class="Font-size18 main_color_text">Цена</p>
            <input type="text" class="price white_color_bg main_color_text" placeholder="Цена">
        </div>
        <div class="text-about-project">
            <p class="Font-size18 main_color_text">О проекте</p>
            <div class="textAreaBlock white_color_bg">
                <?=
                CKEditor::widget([
                    'name' => 'about',
                    'editorOptions' => [
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ]
                ]); ?>
            </div>
        </div>
        <div class="text-about-project">
            <p class="Font-size18 main_color_text">Техническое задание</p>
            <div class="textAreaBlock white_color_bg">
                <?=
                CKEditor::widget([
                    'name' => 'tz',
                    'editorOptions' => [
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ]
                ]); ?>
                <!-- <div class="textAreaItems">
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
                <textarea name="" id="" cols="30" rows="10" class="white_color_bg main_color_text" placeholder="Введите описание проекта"></textarea> -->
            </div>
        </div>
        <div class="upload-file">
            <img src="<?= Url::to(['img/profile/profile-chat/post-file-icon.svg']) ?>" alt="">
            <a class="Font-size18">Добавить вложения</a>
            <p class="Font-size18">файл не выбран</p>
        </div>
        <div class="create-task-select-item input-status-item">
            <p class="Font-size18 main_color_text">Статус</p>
            <div class="create-task-select input-status">
                <input class="main_color_text white_color_bg" type="text" required name="days" placeholder="Количество недель/месяцев">
                <div class="input-status-select">
                    <div class="create-task-select-title">
                        <p class="Font-size18 main_color_text">Месяц</p>
                        <img src="<?= Url::to(['img/profile/profile-tasks/arrow-tehnical.svg']) ?>" alt="">
                    </div>
                    <div class="select-category-list">
                        <ul>
                            <li>
                                <label class="container Font-size18 main_color_text">Месяц
                                    <input type="radio" value="1 неделя" name="deadline">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container Font-size18 main_color_text">Дней
                                    <input type="radio" value="5 дней" name="deadline">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tag-text-area">
            <p class="Font-size18 main_color_text">Теги через ;</p>
            <textarea style="padding: 15px" required placeholder="Укажите теги через ;" name="tags" id="" cols="30" rows="10" class="white_color_bg main_color_text"></textarea>
        </div>
        <div class="button-show-preview">
            <button href="<?= Url::to(['new-task-preview']) ?>">Предпросмотр</button>
        </div>
        <input type="hidden" name="link" value="<?= !empty($_GET['link']) ? $_GET['link'] : '' ?>">
        <?= Html::endForm(); ?>
    </div>

</div>