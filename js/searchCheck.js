function doNavSearch() {
    if ($('#navSearchInput').val() == '') {
        alert("You need to enter something to search.");
    } else {
        $('#navSearch').attr('action', '../pages/searchResults.php');
        $("#navSearch").submit();
    }

}

function doSearchMainBar() {
    if ($('#mainBar').val() == '') {
        alert("You need to enter infomration into your search.");
    } else {
        $('#sender').val("main");
        $('#mainSearch').attr('action', '../pages/searchResults.php');
        $("#mainSearch").submit();
    }
}

function doAdvanceSearch() {
    $('#sender').val("advance");
    $('#mainSearch').attr('action', '../pages/searchResults.php');
    $("#mainSearch").submit();
}