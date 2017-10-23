<?php
session_start();
$type = filter_input(INPUT_GET, "type", FILTER_VALIDATE_INT);
$secLevel = $_SESSION['secLevel'];
if($secLevel == ""){
    header('Location: ./index.php');
}
if ($secLevel == 1 && ($type == 1 || $type == 2)) {
    header('Location: ./signList.php');
}
?>
<?php include '../include/header.inc.php'; ?>

<?php
if ($type == 1) {
    $page_header = "Add Sign";
    $page_include = "../include/signAddForm.inc.php";
    $addEdit_button = "Add Sign";
    $jsCheck = "doSignCreate()";
    $ie = 1;
} elseif ($type == 2) {
    $page_header = "Edit "; //. $signName;
    $page_include = "../include/signEditForm.inc.php";
    $addEdit_button = "Add Sign";
    $jsCheck = "doSignEdit()";
    $ie = 2;
} elseif ($type == 3) {
    $page_header = "Sign Name"; //$signName;
    $page_include = "../include/signView.inc.php";
    $addEdit_button = "Edit Sign"; //this will be used to link to edit the sign 
}
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $page_header; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php include $page_include; ?>
                </div>
                <!-- /.col-lg-12 -->
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
<script src="../js/signFormCheck.js" type="text/javascript"></script>
<?php include '../include/footer.inc.php'; ?>
