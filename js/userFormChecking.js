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
    }
    
    if(lastName.length === 0){
        errorCount++;
    }
    
    if(userName.lenth === 0){
        errorCount++;
    }
    
    if(email.legth === 0){
        errorCount++;
    }
    
    if(password.length === 0){
        errorCount++;
    }
    
    if(active === undefined){        
        
        errorCount++;
    }
    
    if(securityLevel !== 1 || securityLevel !== 2){
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


