/**
 * Created by gcy77 on 2016/3/17.
 */
const $ = require('jquery');

let textarea = $('#content-textarea');
let trArtclFrm = $('.tar-article-form');
let trArtTtlBox = $('.tar-artl-ttlbox');
let trArtTtl = trArtTtlBox.html();
let coverInput = $('#tCover');
let tEditCover = $('.t-edit-cover'); // 封面图
let tTagInput = $('#tTagInput'); // 手动输入标签的 INPUT 组件
let tTagBox = $('#tTagBox'); // 选中的标签存放容器
let tTag = $('.t-tag'); // 标签
let tTags = $('#tTags'); // 要提交的标签
let tTagsArray = []; // 标签数组

trArtTtlBox.html(null);

/**
 * 加载编辑器
 */
if (textarea.length > 0) {
    //noinspection NpmUsedModulesInstalled
    require('simple-module');
    require('simple-hotkeys');
    //noinspection NpmUsedModulesInstalled
    require('simple-uploader');
    require('to-markdown');
    require('marked');
    require('simditor-markdown');

    let Simditor = require('simditor');

    new Simditor({
        textarea: textarea,
        markdown: false,
        toolbar: ['bold', 'italic', 'underline', 'strikethrough', 'ol', 'ul', 'blockquote', 'code', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment', 'markdown'],
        upload: {
            url: '/files/upload',
            params: null,
            fileKey: 'upload_file',
            connectionCount: 3,
            leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
        }
    });

    let simditorBody = trArtclFrm.find('.simditor-placeholder');

    simditorBody.before(trArtTtl);
}

/**
 * 提交或者保存文章
 */
if (trArtclFrm.length > 0) {
    let articleForm = trArtclFrm.find('form').find('[name = "status"]');
    let submitArticle = $('#submit-article');
    let saveArticle = $('#save-article');

    submitArticle.click(() => {
        articleForm.val(1).end().submit();
    });

    saveArticle.click(() => {
        articleForm.val(0).end().submit();
    });
}

/**
 * 文章封面图处理
 */
coverInput.on('change', function () {
    let cover = coverInput.prop('files')[0];

    let fr = new FileReader();

    fr.readAsDataURL(cover);
    fr.onload = function (e) {
        tEditCover.attr({'style': 'background: url(' + e.target.result + ') no-repeat;background-size: cover;'});
    };

});

/**
 * 点选添加标签
 */
tTag.on('click', function () {
    let tag = $.trim($(this).text());

    if (tTagBox.children().length < 4 && $.inArray(tag, tTagsArray) < 0) {
        tTagsArray.push(tag);
        tTagBox.append($(this));
        tTags.val(tTagsArray.join(','));
    } else {
        console.log('标签最多 4 个！');
    }
});

/**
 * 鼠标点击事件监听
 * 输入框添加标签处理
 */

tTagInput.keydown(function (e) {
    // 添加标签
    if (e.which === 9) {
        if (tTagInput.is(":focus") && tTagInput.val().length > 0 && tTagBox.children().length < 4) {
            let tag = $.trim(tTagInput.val());

            if ($.inArray(tTagInput.val(), tTagsArray) < 0) {
                tTagBox.append(`<span class="t-tag label label-default">${tag}</span>`);
                tTagsArray.push(tag);
                tTags.val(tTagsArray.join(','));
            } else {
                console.log('已经添加过了！');
            }
        } else {
            console.log('输入不合法！');
        }
        tTagInput.val(null);
        return false;
    }

    // 删除标签
    if (e.which === 8) {
        let tags = tTagBox.children();

        if (tags.length > 0) {
            tags.eq(tags.length - 1).remove();
            tTagsArray.pop();
            tTags.val(tTagsArray.join(','));
        } else {
            console.log('没有标签！');
        }
        return false;
    }
});
