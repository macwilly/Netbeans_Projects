function doLogin(){
    
    if($('#username').val().length === 0){
        alert('There was an error');
    }
    
    if($('#password').val().length === 0){
        alert('There was an error');
    }
    
    $('#loginForm').submit();
}