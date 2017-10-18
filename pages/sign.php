<?php include '../include/header.inc.php'; ?>
<?php
$type = filter_input(INPUT_GET, "type", FILTER_VALIDATE_INT);

if ($type == 1) {
    $page_header = "Add Sign";
    $page_include = "../include/signAddForm.inc.php";
} elseif ($type == 2) {
    $page_header = "Edit "; //. $signName;
    $page_include = "../include/signEditForm.inc.php";
} elseif ($type == 3) {
    $page_header = "Sign Name"; //$signName;
    $page_include = "../include/signView.inc.php";
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
<?php
include $page_include;
?>
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
<?php include '../include/footer.inc.php'; ?>
