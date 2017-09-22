<?php
//checking to see where the user came from. If it is not either of these it will
//send the user back to the main page. Also adding in other variables that will be used on this page
$userAddEdit = "";
$jsCheck = "";
$ie = 0;
$aeType = $_GET["type"];
if (FILTER_VAR($aeType, FILTER_SANITIZE_NUMBER_INT) == 1) {
    $userAddEdit = "Add User";
    $jsCheck = "doUserCreate()";
    $ie = 1; 
} elseif (FILTER_VAR($aeType, FILTER_SANITIZE_NUMBER_INT) == 2) {
    $userAddEdit = "Edit User";
    $jsCheck = "doUserEdit()";
    $ie = 2;
} else {
    header("Location: ./index.php");
    die();
}
?>
<?php include '../include/header.inc.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $userAddEdit; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">                        
                        <div class="panel-body">                            
                            <form name="userInput" id="userInputId"  method="POST" action="">
                                <div class="col-lg-6">
                                    <div class="form-group" id="first-name-container">
                                        <label class="control-label">First Name</label>
                                        <input class="form-control" name="inputUserFirstName" id="fName" placeholder="John">
                                    </div>
                                    <div class="form-group" id="last-name-container">
                                        <label class="control-label">Last Name</label>
                                        <input class="form-control" name="inputUserLastName" id="lName" placeholder="Smith">
                                    </div>
                                    <div class="form-group" id="username-container">
                                        <label class="control-label">Username</label>
                                        <input class="form-control" name="inputUserUsername" id="uName" placeholder="jxs1234">
                                    </div>
                                    <div class="form-group" id="email-container">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" name="inputUserEmail" id="email" placeholder="jxs1234@email.com">
                                    </div>
                                    <div class="form-group" id="password-container">
                                        <label class="control-label">Password</label>  <!-- Will need to check for ' " and other characters that can break the insert -->
                                        <input type="password" class="form-control" name="inputUserPassword" id="pword" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
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
                                    <div class="form-group" id="security-level-container">
                                        <label class="control-label">Security Level</label>
                                        <select class="form-control" name="selectSecurityLevel" id="secLevel">
                                            <option value="1">User</option>
                                            <option value="2">Administrator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-10 col-sm-3 col-sm-offset-9 col-xs-3 col-xs-9 ">
                                        <button type="button" onclick="return <?php echo $jsCheck; ?>" class="btn btn-primary"><?php echo $userAddEdit; ?></button>
                                    </div>
                                </div>
                                <input type="hidden" name="insertEdit" id="insertEdit" value="<?php echo $ie;?>">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ./col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>
<script src="../js/userFormChecking.js" type="text/javascript"></script>
<?php include '../include/footer.inc.php'; ?>
