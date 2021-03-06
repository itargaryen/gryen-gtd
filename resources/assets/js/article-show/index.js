/**
 * Created by targaryen on 2017/5/18.
 */

import '../common/_highlight';

const TBody = $('body');
const TArtclBox = $('.t-rtcl-box');
const Images = TArtclBox.find('img').not('a img');
const TFullScreen = TBody.find('#tFullScreen');
const TFullScreenImg = TFullScreen.find('#tFullScreenImg');

/**
 * 查看原图
 */
Images.click((elem) => {
    const self = $(elem.currentTarget);

    if (self.data('status') !== 'open') {
        const src = self.attr('src').split('?')[0];

        TFullScreenImg.attr('src', src).data('status', 'open');
        TBody.addClass('t-overflow-y-hidden');
        TFullScreen.css('display', 'flex').hide().fadeIn(700);
        TFullScreenImg.fadeIn(700);
    }
});

/**
 * 关闭原图查看
 */
TFullScreen.click(() => {
    TBody.removeClass('t-overflow-y-hidden');
    TFullScreenImg.attr('src', '').data('status', 'close');
    TFullScreenImg.fadeOut(300);
    TFullScreen.fadeOut(300);
});
