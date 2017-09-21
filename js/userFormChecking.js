function doUserCreate(){
    var firstName =  $("#fName").val();
    var lastName =  $("#lName").val();
    var userName =  $("#uName").val();
    var email =  $("#email").val();
    var password =  $("#pword").val();    
    var active = $('#optionsActive:checked').val();//if not checked == undefined
    var securityLevel =  $("#secLevel").val();
    var errorCount = 0;
    
    if(firstName.length ===0){
        errorCount++;
        $("#first-name-container").addClass("has-error");
    }
    
    if(lastName.length === 0){
        errorCount++;
        $("#last-name-container").addClass("has-error");
    }
    
    if(userName.lenth === 0){
        errorCount++;
        $("#username-container").addClass("has-error");
    }
    
    if(email.legth === 0){
        errorCount++;
        $("#email-container").addClass("has-error");
    }
    
    if(password.length === 0){
        errorCount++;
        $("#password-container").addClass("has-error");
    }
    
    if(active === undefined){        
        $("#active-container").addClass("has-error");
        errorCount++;
    }
    
    if(securityLevel !== 1 || securityLevel !== 2){
        $("#security-level-container").addClass("has-error");
        errorCount++;
    }
    
    if(errorCount > 0){
        return false;
    }else{
        $("#userInputId").submit();
    }
    
    
    
}

function doUserEdit(){
    
}




