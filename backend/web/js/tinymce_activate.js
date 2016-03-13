tinymce.init({
    selector:'textarea',
    forced_root_block : "",
    language_url : '/administrator/js/tinymce_uk.js',
    language : "uk",
    plugins: [
        "code", "charmap", "link", "image"
    ],
    toolbar: [
        "undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |  charmap code"
    ]

});