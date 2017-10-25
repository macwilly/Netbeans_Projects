function doHandshapeCreate() {
    removeErrors();
    if(doCheck > 0){
        return;
    }else{
        $('#handshapeInputId').attr('action', '../classes/handshapeCheck.php');
        $("#handshapeInputId").submit();
        
    }

}


function doHandshapeEdit() {
    removeErrors();
    if(doCheck > 0){
        return;
    }else{
        $('#handshapeInputId').attr('action', '../classes/handshapeCheck.php');
        $("#handshapeInputId").submit();
        
    }
}


function doCheck() {
    var desc = $("#inputHSDescription").val();
    var eDesc = $("#inputHSEMBRDescription").val();
    var active = $('#optionsActive:checked').val();//if not checked == undefined    
    alert(active);
    var errorCount = 0;

    if (desc.length === 0) {
        errorCount++;
        $("#description-container").addClass("has-error");
    }
    if (eDesc.length === 0) {
        errorCount++;
        $('#EMBR-description-container').addClass("has-error");
    }
    if (active === undefined) {
        $("#active-container").addClass("has-error");
        errorCount++;
    }
    
    return errorCount;
}

/**
 * Used to reset the user page so that errors that have been fixed will not
 * show in red
 * @returns {undefined}
 */
function removeErrors() {
    $("#description-container").removeClass("has-error");
    $("#EMBR-description-container").removeClass("has-error");
    $("#active-container").removeClass("has-error");

}
