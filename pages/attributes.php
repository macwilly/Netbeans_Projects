<?php
session_start();
$secLevel = $_SESSION['secLevel'];
if ($secLevel != 3) {
    header('Location: ./index.php');
}
?>
<?php include '../include/header.inc.php'; ?>
<?php include '../function/getAttribute.php'; ?>
<?php include '../function/util.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Attributes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="well">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="attribute-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Attribute</th>
                                    <th>Description</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //call class to get all of the information for the table 
                                //build table with loop
                                $a = getAttributes(FALSE);

                                foreach ($a as $printAttribute) {
                                    $count = 1;

                                    //setting up the hover classes for the data table
                                    if ($count % 2 != 0) {
                                        echo '<tr class="odd">';
                                    } else {
                                        echo '<tr class="even">';
                                    }
                                    echo '<td><button onclick="editA(\'' . $printAttribute->get_aName() . '\');" type="button" class="btn btn-primary">Edit</button></td>';
                                    echo '<td>' . $printAttribute->get_aName() . '</td>';
                                    echo '<td>' . $printAttribute->get_desc() . '</td>';
                                    echo '<td>' . activeTextConvert($printAttribute->get_active()) . '</td>';
                                    echo '</tr>';
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <form method="POST" name="editAttribute" action="./attribute.php?type=2">
                    <input type="hidden" name="attributeName" id="attributeName" value="">

                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->

<script>

    function editA(_name) {
        $("#attributeName").val(_name);
        $("form").submit();
    }

</script>
<?php include '../include/bottom_jquery.inc.php'; ?>


<!-- DataTables JavaScript -->
<?php include '../include/datatable_jquery.inc.php'; ?>

<?php include '../include/footer.inc.php'; ?>
