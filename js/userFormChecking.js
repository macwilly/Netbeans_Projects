function doUserCreate() {

    removeError(2);
    var errors = doCheck(2);

    if (errors > 0) {
        return false;
    } else {
        $('#userInputId').attr('action', '../classes/userCheck.php');
        $("#userInputId").submit();
    }



}

function doUserEdit() {
    removeError(2);
    var errors = doCheck(2);

    if (errors > 0) {
        return false;
    } else {
        $('#userInputId').attr('action', '../classes/userCheck.php');
        $("#userInputId").submit();
    }
}

function doUserEditUser(){
    removeError(1);
    var errors = doCheck(1);
    if (errors > 0) {
        return false;
    } else {
        $('#userInputId').attr('action', '../classes/userCheck.php');
        $("#userInputId").submit();
    }
}

function doCheck(sec) {
    var firstName = $("#fName").val();
    var lastName = $("#lName").val();
    var userName = $("#uName").val();
    var email = $("#email").val();
    var password = $("#pword").val();
    var active = $('#optionsActive:checked').val();//if not checked == undefined    
    var inEdit = $("#insertEdit").val();
    var errorCount = 0;
    
    if(sec === 2){
        var securityLevel = $("#secLevel").val();
    }

    if (firstName.length === 0) {
        errorCount++;
        $("#first-name-container").addClass("has-error");
    }

    if (lastName.length === 0) {
        errorCount++;
        $("#last-name-container").addClass("has-error");
    }

    if (userName.length === 0) {
        errorCount++;
        $("#username-container").addClass("has-error");
    }

    if (email.length === 0) {
        errorCount++;
        $("#email-container").addClass("has-error");
    }

    if (password.length === 0) {
        errorCount++;
        $("#password-container").addClass("has-error");
    }

    if (active === undefined) {
        $("#active-container").addClass("has-error");
        errorCount++;
    }
    if(sec === 3){
        if (securityLevel != 1 && securityLevel != 2 && securityLevel !=3) {
        $("#security-level-container").addClass("has-error");
        errorCount++;
    }
    }
    

    if (inEdit != 1 && inEdit != 2) {
        errorCount++;
    }
    return errorCount++;
}

function removeError(sec) {
    $("#first-name-container").removeClass("has-error");
    $("#last-name-container").removeClass("has-error");
    $("#username-container").removeClass("has-error");
    $("#email-container").removeClass("has-error");
    $("#password-container").removeClass("has-error");
    $("#active-container").removeClass("has-error");    
    if(sec === 2){
        $("#security-level-container").removeClass("has-error");
    }
}