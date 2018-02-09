<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>

    $('.addTag').on('click', function () {
        var v = $('#tags').val();
        $('.tagchecklist').append('<li><a href="javascript:;" class="delTag">'+v+'</a>' +
            '<input type="hidden" name="tag_id[]" value="'+v+'"></li>');
        $('#tags').val('');
        $('#tags').focus();
    });

    $('body').on('click','.delTag', function () {
        $(this).parent().remove();
    });

	$(function(){
		uploadImg();
	});

    var editor_config = {
        path_absolute : "{{ URL::to('/') }}/",
        selector : "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        },
	    height : "620"
    };

    tinymce.init(editor_config);
</script>﻿