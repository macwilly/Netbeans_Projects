<?php

include '../classes/usersClass.php';
if ($_SESSION["editUser"] == "") {
    //editing the current user that is logged in
    $user = new users($_SESSION["userId"]);
    $user->getUserInfo();
   
} else {
    //editing another user
}

?>
<form name="userInput" id="userInputId"  method="POST" action="">
    <div class="col-lg-6">
        <div class="form-group" id="first-name-container">
            <label class="control-label">First Name EDIT</label>
            <input class="form-control" name="inputUserFirstName" id="fName" placeholder="John" value="<?php echo $user->getFirst_name();?>">
        </div>
        <div class="form-group" id="last-name-container">
            <label class="control-label">Last Name</label>
            <input class="form-control" name="inputUserLastName" id="lName" placeholder="Smith" value="<?php echo $user->getLast_name();?>">
        </div>
        <div class="form-group" id="username-container">
            <label class="control-label">Username</label>
            <input class="form-control" name="inputUserUsername" id="uName" placeholder="jxs1234" value="<?php echo $user->getUsername();?>">
        </div>
        <div class="form-group" id="email-container">
            <label class="control-label">Email</label>
            <input type="email" class="form-control" name="inputUserEmail" id="email" placeholder="jxs1234@email.com" value="<?php echo $user->getEmail();?>">
        </div>
        <div class="form-group" id="password-container">
            <label class="control-label">Password</label>  <!-- Will need to check for ' " and other characters that can break the insert -->
            <input type="password" class="form-control" name="inputUserPassword" id="pword" placeholder="" value="<?php echo $user->getPassword();?>">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group" id="active-container">
            <label class="control-label">Active</label>
            <div class="radio">
                <label>
                    <?php
                        if($user->getActive() == 1){
                            echo '<input type="radio" name="optionsActive" id="optionsActive" value="1" checked>Yes';
                        }else{
                            echo '<input type="radio" name="optionsActive" id="optionsActive" value="1">Yes';
                        }
                    ?>
                </label>
            </div>
            <div class="radio">
                <label>
                    <?php
                        if($user->getActive() == 0){
                            echo '<input type="radio" name="optionsActive" id="optionsActive" value="0" checked>No';
                        }else{
                            echo '<input type="radio" name="optionsActive" id="optionsActive" value="0">No';
                        }
                    ?>
                </label>
            </div>
        </div>
        <div class="form-group" id="security-level-container">
            <label class="control-label">Security Level</label>
            <select class="form-control" name="selectSecurityLevel" id="secLevel">
                <option value="1" id="sec1">User</option>
                <option value="2" id="sec2">Administrator</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-9 ">
            <button type="button" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary"><?php echo $userAddEdit; ?></button>
        </div>
    </div>
    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#sec<?php echo $user->getSecurity_level()?>").attr("selected","selected");
    });
</script>