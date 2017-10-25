<?php 
session_start();
$secLevel = $_SESSION['secLevel'];
if($secLevel != 3){
    header('Location: ./index.php');
}
?>
<?php include '../include/header.inc.php';?>

<?php
    $type = filter_input(INPUT_GET, "type", FILTER_VALIDATE_INT);
    
    if($type==1){
        $ie = 1;
        $button = 'Add Attribute';
        $jsCheck = 'addAttribute()';
        $inc = '../include/attributeAddForm.inc.php';
    }elseif($type == 2){
        $ie = 2;
        $button = 'Edit Attribute';
        $jsCheck = 'editAttribute()';
        $inc = '../include/attributeEditForm.inc.php';
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
                        <h1 class="page-header">Attribute</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <?php include $inc;?>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>
<script src="../js/attributeFormCheck.js" type="text/javascript"></script>
<?php include '../include/footer.inc.php'; ?>
