var E = window.wangEditor;
var editor = new E('#editor');
var $content = $('#content');

editor.customConfig.onchange = function (html) {
//     // 监控变化，同步更新到 textarea
    $content.val(html)
};

editor.customConfig.uploadImgServer = '/posts/image/upload'; // 上传图片到服务器
// // 设置 headers（举例）
editor.customConfig.uploadImgHeaders = {
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
};
//自定义文件上传名称
editor.customConfig.uploadFileName = 'fileName';
// 自定义菜单配置
editor.customConfig.menus = [
    'head',  // 标题
    'bold',  // 粗体
    'fontSize',  // 字号
    'fontName',  // 字体
    'italic',  // 斜体
    'underline',  // 下划线
    'strikeThrough',  // 删除线
    'foreColor',  // 文字颜色
    'backColor',  // 背景颜色
    'image',  // 插入图片
];

editor.create();
// 初始化 textarea 的值
$content.val(editor.txt.html());