$('#asLink').click(function () {
    if ($('#asIcon').hasClass("glyphicon-menu-left")) {
        $('#asIcon').removeClass("glyphicon-menu-left");
        $('#asIcon').addClass("glyphicon-menu-down");
    } else if ($('#asIcon').hasClass("glyphicon-menu-down")) {
        $('#asIcon').removeClass("glyphicon-menu-down");
        $('#asIcon').addClass("glyphicon-menu-left");
    }
});