<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'ADS.Force';
$this->registerCssFile(Url::to(['css/profile-performer/technical-support-chat.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-chat-private.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$this->registerCssFile(Url::to(['css/profile-performer/profile-left-nav.css']), ['depends' => ['frontend\assets\ProfileCustomerAsset']]);
$js = <<< JS
$('.chat-private-show').click(function(){
    if($('.chat-private').css('display') == "none"){
        $('.chat-private').fadeIn(300);
        $(this).find('img').css({'transform':'rotate(-180deg) '})
        $(".message-container").scrollTop($(".message-container")[0].scrollHeight);
}
    else{
        $('.chat-private').fadeOut(300);
        $(this).find('img').css({'transform':'rotate(0deg)'})
    }
})
$('.container').click(function(){
    $('.select-category-list').fadeOut(300);
});
$('.send__message').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/profile-customer/send-message',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'JSON',
    }).done(function (r) {
       if(r.status){
        var mes = $('#message').val(),
            date = new Date();
        $('.message-list').append(`
            <div class="message-text my-message">
                <p class="main_color_text">`+ mes +`</p>
                <p class="time-message main_color_text">`+ date.getHours() +` `+ date.getMinutes() +`</p>
            </div>
        `);
        $('#message').val('');
       }
       $(".message-container").scrollTop($(".message-container")[0].scrollHeight);
    })
})
JS;
$this->registerJs($js);
?>
<div class="rigth-column">

    <div class="support-chat-title">
        <h2 class="main_color_text Font-size24">Данные обращения № <?= !empty($dialog['id']) ? $dialog['id'] : '' ?></h2>
    </div>
    <div class="support-chat-information">
        <!-- <div class="information-item">
            <p class="Font-size18">Раздел:</p>
            <b class="main_color_text">Статус PRO</b>
        </div> -->
        <div class="information-item">
            <p class="Font-size18">Тема:</p>
            <b class="main_color_text"><?= !empty($dialog['theme']) ? $dialog['theme'] : '' ?></b>
        </div>
        <div class="information-item">
            <p class="Font-size18">Дата:</p>
            <b class="main_color_text"><?= !empty($dialog['date']) ? date('d.m.Y', strtotime($dialog['date'])) : '' ?></b>
        </div>
        <div class="information-item">
            <p class="Font-size18">Текст обращения:</p>
            <b class="main_color_text"><?= !empty($dialog['message'][0]['text']) ? $dialog['message'][0]['text'] : '' ?></b>
        </div>
    </div>
    <div class="chat-private-show">
        <h2>Посмотреть историю диалога с поддержкой</h2>
        <img src="<?= Url::to(['img/profile/profile-tasks/arrow-tehnical.svg']) ?>" style="cursor: pointer;" alt="">
    </div>
    <div class="chat-private white_color_bg" style="display: none;">
        <div class="header-chat-private">
            <div class="header-chat-img bg-chat-img">
                <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-private.png']) ?>" alt="">
            </div>
            <div class="header-chat-content">
                <div class="header-chat-name">
                    <h2 class="main_color_text">Ads.Force</h2>
                    <div class="header-chat-online"></div>
                </div>
                <p class="header-chat-status">в сети</p>
            </div>
        </div>
        <div class="chat-body-message">
            <div class="chat-body-main">
                <div class="message-container">
                    <div class="message-user">
                        <!-- <div class="message-user-header">
                            <div class="header-chat-img bg-chat-img">
                                <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-private.png']) ?>" alt="">
                            </div>
                            <h2 class="main_color_text">Ads.Force</h2>
                            <p>Тех. поддержка</p>
                        </div> -->
                        <div class="message-list">
                            <?php if (!empty($dialog['message'])) : ?>
                                <?php foreach ($dialog['message'] as $item) : ?>
                                    <div class="message-text <?= $item['is_support'] == 0 ? 'bg-chat' : 'my-message' ?>">
                                        <p class="main_color_text"><?= $item['text'] ?></p>
                                        <p class="time-message main_color_text"><?= date('H:i', strtotime($item['date'])) ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- <div class="message-user">
                        <div class="message-user-header">
                            <div class="header-chat-img bg-chat-img">
                                <img src="<?= Url::to(['img/profile/profile-chat/profile-chat-private.png']) ?>" alt="">
                            </div>
                            <h2 class="main_color_text">Дарья Агапова</h2>
                            <p>исполнитель</p>
                        </div>
                        <div class="message-list">
                            <div class="message-text my-message">
                                <p>Текст сообщения</p>
                                <p class="time-message">14:00</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="chat-body-input">
                <?= Html::beginForm('', 'post', ['class' => 'send__message']) ?>
                <input type="hidden" name="dialog_id" value="<?= !empty($dialog['id']) ? $dialog['id'] : '' ?>">
                <input id="message" required type="text" name="message" class="bg-chat main_color_text" placeholder="Сообщение">
                <div class="buttons-message">
                    <!-- <div class="left-buttons">
                        <img src="<?= Url::to(['img/profile/profile-chat/chat-smile.svg']) ?>" alt="">
                    </div> -->
                    <div class="right-buttons">
                        <!-- <img src="<?= Url::to(['img/profile/profile-chat/img-send.svg']) ?>" alt=""> -->
                        <button style="background-color: transparent; outline: none; border: none"><img src="<?= Url::to(['img/profile/profile-chat/send-message.svg']) ?>" alt=""></button>
                    </div>
                </div>
                <?= Html::endForm(); ?>
            </div>
        </div>
    </div>
</div>