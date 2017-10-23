<?php 
session_start();
$secLevel = $_SESSION['secLevel'];
if($secLevel != 3){
    header('Location: ./index.php');
}
?>
<?php include '../include/header.inc.php';?>

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
                    
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>
<?php include '../include/footer.inc.php'; ?>
