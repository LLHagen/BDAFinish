<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: ".editor",
        statusbar: false,
        menubar:false,
        branding: false,
        width : "100%",
        height : "200",
        plugin_preview_width : "100%",
        plugin_preview_height : "600",
        theme_advanced_resizing : true,
        content_css: "{{ asset('css/tinymce/tinymce.css') }}",
    });
</script>
