(function($) {

    $(".form-style .form-control").on("input", function() {
        if ($(this).val()) {
            $(this).addClass("hasValue");
        } else {
            $(this).removeClass("hasValue");
        }
    });
});