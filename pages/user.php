<?php
//checking to see where the user came from. If it is not either of these it will
//send the user back to the main page.
$userAddEdit = "";
$aeType = $_GET["type"];
if (FILTER_VAR($aeType, FILTER_SANITIZE_NUMBER_INT) == 1) {
    $userAddEdit = "Add User";
} elseif (FILTER_VAR($aeType, FILTER_SANITIZE_NUMBER_INT) == 2) {
    $userAddEdit = "Edit User";
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
                            <form name="userInput" method="POST" action="">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" name="inputUserFirstName" placeholder="John">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" name="inputUserLastName" placeholder="Smith">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="inputUserUsername" placeholder="jxs1234">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="inputUserEmail" placeholder="jxs1234@email.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>  <!-- Will need to check for ' " and other characters that can break the insert -->
                                        <input type="password" class="form-control" name="inputUserPassword" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Active</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsActive" id="optionsActive1" value="1" checked>Yes
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsActive" id="optionsActive2" value="0">No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label>Security Level</label>
                                            <select class="form-control">
                                                <option value="1">User</option>
                                                <option value="2">Administrator</option>
                                            </select>
                                        </div>
                                </div>
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
<?php include '../include/footer.inc.php'; ?>
