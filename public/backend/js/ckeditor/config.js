
CKEDITOR.editorConfig = function( config )
{
        // Define changes to default configuration here. For example:
    config.language = 'en';
    
        // config.uiColor = '#AADC6E';
        
        config.toolbar_Full = [
            ['Source','-','Save','NewPage','Preview','-','Templates'],
            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
            '/',
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['BidiLtr', 'BidiRtl' ],
            ['Link','Unlink','Anchor'],
            ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
            '/',
            ['Styles','Format','Font','FontSize'],
            ['TextColor','BGColor'],
            ['Maximize', 'ShowBlocks','-','About']
            ];
        config.extraPlugins = 'panelbutton,colorbutton';
        config.entities = false;
        //config.entities_latin = false;
        
        var ck_url = baseUrl+'public/backend/js/';

        config.filebrowserBrowseUrl = ck_url+'ckfinder/ckfinder.html';

        config.filebrowserImageBrowseUrl = ck_url+'ckfinder/ckfinder.html?type=Images';

        config.filebrowserFlashBrowseUrl = ck_url+'ckfinder/ckfinder.html?type=Flash';

        config.filebrowserUploadUrl = ck_url+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

        config.filebrowserImageUploadUrl = ck_url+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

        config.filebrowserFlashUploadUrl = ck_url+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
        
};  