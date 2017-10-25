function addAttribute() {

    removeError();
    var errors = doCheck();

    if (errors > 0) {
        return false;
    } else {
        $('#attributeForm').attr('action', '../classes/attributeCheck.php');
        $("#attributeForm").submit();
    }
}

function editAttribute() {
    removeError();
    var errors = doCheck();

    if (errors > 0) {
        return false;
    } else {
        $('#attributeForm').attr('action', '../classes/attributeCheck.php');
        $("#attributeForm").submit();
    }
}

function doCheck() {
    var attrName = $("#aName").val();
    var desc = $("#description").val();
    var active1 = $('#optionsActive1:checked').val();//if not checked == undefined
    var active0 = $('#optionsActive0:checked').val();//if not checked == undefined
    
    var inEdit = $("#insertEdit").val();
    var errorCount = 0;

    if (attrName.length === 0) {
        errorCount++;
        $("#attribute-name-container").addClass("has-error");
    }

    if (desc.length === 0) {
        errorCount++;
        $("#description-container").addClass("has-error");
    }

    if (active1 === undefined && active0 === undefined) {
        $("#active-container").addClass("has-error");
        errorCount++;
    }

    //if (inEdit != 1 && inEdit != 2) {
    //    errorCount++;
    //}
    return errorCount++;
}

function removeError(sec) {
    $("#attribute-name-container").removeClass("has-error");
    $("#description-container").removeClass("has-error");
    $("#active-container").removeClass("has-error");
}