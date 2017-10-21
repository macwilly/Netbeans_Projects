<?php
session_start();
//checking to see where the user came from. If it is not either of these it will
//send the user back to the main page. Also adding in other variables that will be used on this page

$aeType = filter_input(INPUT_GET, "type", FILTER_VALIDATE_INT);
$secLevel = $_SESSION['secLevel'];
if($secLevel == ""){
    header('Location: ./index.php');
}
if($secLevel == 1 && $aeType != 2){
    header('Location: ./index.php');
}

$userAddEdit = "";
$jsCheck = "";
$ie = 0;
$haystack = $_SERVER['HTTP_REFERER'];
$needle = "users.php";
$pos = strrpos($haystack, $needle);


if ($aeType == 1) {
    $userAddEdit = "Add User";
    $jsCheck = "doUserCreate()";
    $ie = 1;
} elseif ($aeType== 2) {
    $userAddEdit = "Edit User";
    if($secLevel == 1){
        $jsCheck = "doUserEditUser()";
    }else{
        $jsCheck = "doUserEdit()";
    }
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
                            
                            <?php                            
                                if($aeType == 1){
                                    include '../include/userAddForm.inc.php';                                    
                                }else if($aeType == 2){
                                    include '../include/userEditForm.inc.php';
                                }
                            ?>
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
