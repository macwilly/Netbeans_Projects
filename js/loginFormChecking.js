function doLogin(){
    
    if($('#username').val().length === 0){
        alert('There was an error');
        return false;
    }
    
    if($('#password').val().length === 0){
        alert('There was an error');
        return false;
    }
    
    $('#loginForm').attr('action','../classes/loginCheck.php');
    $('#loginForm').submit();
}

