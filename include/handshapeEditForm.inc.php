<?php

include '../classes/handShapeClass.php';
if ($_SESSION["editUser"] == "") {
    //editing the current user that is logged in
    $user = new users($_SESSION["userId"]);
    $user->getUserInfo();
   
} else {
    //editing another user
    $user = new users($_SESSION["editUser"]);
    $user->getUserInfo();
}

?>
<form name="userInput" id="handshapeInputId" enctype="multipart/form-data"  method="POST" action="">
    <div class="col-lg-6">
        <div class="form-group" id="first-name-container">
            <label class="control-label">Description</label>
            <input class="form-control" name="inputHSDescription" id="fName" placeholder="John">
        </div>
        <div class="form-group" id="last-name-container">
            <label class="control-label">EMBR Description</label>
            <input class="form-control" name="inputHSEMBRDescription" id="lName" placeholder="Smith">
        </div>
        <div class="form-group" id="active-container">
            <label class="control-label">Active</label>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsActive" id="optionsActive" value="1">Yes
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsActive" id="optionsActive" value="0">No
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group" id="last-name-container">
            <label class="control-label">Image</label>
            <input class="form-control" name="inputUserLastName" id="lName" placeholder="Smith">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-9 ">
            <button type="button" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary"><?php echo $handshapeAddEdit; ?></button>
        </div>
    </div>
    <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie; ?>">
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#sec<?php echo $user->getSecurity_level()?>").attr("selected","selected");
    });
</script>