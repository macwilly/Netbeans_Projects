<?php
//checking to see where the user came from. If it is not either of these it will
//send the user back to the main page. Also adding in other variables that will be used on this page
if($secLevel != 2){
    header('Location: ./handshapes.php');
}
$jsCheck = "";
$ie = 0;
$aeType = $_GET["type"];

if (FILTER_VAR($aeType, FILTER_SANITIZE_NUMBER_INT) == 1) {
    $handshapeAddEdit = "Add Handshape";
    $jsCheck = "doHandshapeCreate()";
    $ie = 1;
} elseif (FILTER_VAR($aeType, FILTER_SANITIZE_NUMBER_INT) == 2) {
    $handshapeAddEdit = "Edit Handshape";
    $jsCheck = "doHandshapeEdit()";
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
                    <h1 class="page-header"><?php echo $handshapeAddEdit; ?></h1>
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
                                    include '../include/handshapeAddForm.inc.php';                                    
                                }else if($aeType == 2){
                                    include '../include/handshapeEditForm.inc.php';
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
<script src="../js/handshapeFormChecking.js" type="text/javascript"></script>
<?php include '../include/footer.inc.php'; ?>
