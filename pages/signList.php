<?php
session_start();
$secLevel = $_SESSION['secLevel'];
if ($secLevel == "") {
    header('Location: ./index.php');
}
?>
<?php include '../include/header.inc.php'; ?>
<?php include '../function/getSigns.php'; ?>
<?php include '../function/util.php'; ?>
<?php include '../function/getHandshape.php'; ?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Signs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="well">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="sign-table">
                            <thead>
                                <tr>
                                    <?php
                                    if ($secLevel >= 2) {
                                        echo '<th></th>';
                                    }
                                    ?>
                                    <th>Gloss</th>
                                    <th>Start Dominant Handshape</th>
                                    <th>Start Nondominant Handshape</th>
                                    <th>Start Image</th>
                                    <th>End Image</th>
                                    <th>End Dominant Handshape</th>
                                    <th>End Nondominant Handshape</th>
                                    <th>English</th>
                                    <th>Finished</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //call class to get all of the information for the table 
                                //build table with loop
                                $s = getSignList();

                                foreach ($s as $printSign) {
                                    $count = 1;

                                    //setting up the hover classes for the data table
                                    if ($count % 2 != 0) {
                                        echo '<tr class="odd">';
                                    } else {
                                        echo '<tr class="even">';
                                    }
                                    if ($secLevel >= 1) {
                                        echo '<td><button onclick="editS(\'' . $printSign->get_gloss() . '\')" type="button" class="btn btn-primary">View</button></td>';
                                    }

                                    echo '<td>' . $printSign->get_gloss() . '</td>';
                                    echo '<td>' . getHandshapePhoto($printSign->get_dominant_start_HS()) . '</td>';
                                    echo '<td>' . getHandshapePhoto($printSign->get_nondominant_start_HS()) . '</td>'; 
                                    echo '<td>' . getSignPhoto("start",$printSign->get_start_photo()) . '</td>'; 
                                    echo '<td>' . getSignPhoto("end",$printSign->get_end_photo()) . '</td>'; 
                                    echo '<td>' . getHandshapePhoto($printSign->get_dominant_end_HS()) . '</td>'; 
                                    echo '<td>' . getHandshapePhoto($printSign->get_nondominant_end_HS()) . '</td>'; 
                                    echo '<td>' . $printSign->get_english_meaning() . '</td>';
                                    echo '<td>' . finshTextConvert($printSign->get_finished()) . '</td>';
                                    echo '</tr>';
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
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
<form method="POST" name="editSign" action="./sign.php?type=3">
    <input type="hidden" name="signGloss" id="signGloss">
</form>

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>
<?php include '../include/datatable_jquery.inc.php'; ?>

<!-- DataTables JavaScript -->
<script>

    function editS(_gloss) {
        $("#signGloss").val(_gloss);
        $("form").submit();
    }

</script>
<?php include '../include/footer.inc.php'; ?>
