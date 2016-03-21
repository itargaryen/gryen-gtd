/**
 * Created by gcy77 on 2016/3/17.
 */

// 加载编辑器
window.onload = function () {
    var editor = new Simditor({
        textarea: $('#content'),
        markdown: true,
        toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment', '|', 'markdown'],
        upload: {
            url: '',
            params: null,
            fileKey: 'upload_file',
            connectionCount: 3,
            leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
        }
    });
};