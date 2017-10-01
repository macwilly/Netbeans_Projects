<?php include '../include/header.inc.php'; ?>
<?php include '../function/getHandShape.php'; ?>
<?php include '../function/util.php'; ?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hand Shapes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="well">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="handshape-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Description</th>
                                    <th>EMBR Description</th>
                                    <th>Image</th>                                    
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //call class to get all of the information for the table 
                                //build table with loop
                                $hs = getHandshapes();

                                foreach ($hs as $printHandshape) {
                                    $count = 1;

                                    //setting up the hover classes for the data table
                                    if ($count % 2 != 0) {
                                        echo '<tr class="odd">';
                                    } else {
                                        echo '<tr class="even">';
                                    }
                                    echo '<td><button onclick="editUser('.$printHandshape->get_id() .')" type="button" class="btn btn-primary">Edit</button></td>';
                                    echo '<td>' . $printHandshape->get_description() . '</td>';
                                    echo '<td>' . $printHandshape->get_embrDescription() . '</td>';
                                    echo '<td>' . $printHandshape->get_imageLocation() . '</td>'; // will need to chage this to be a link                                                                        
                                    echo '<td>' . activeTextConvert($printHandshape->get_active()) . '</td>';                                    
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

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>
<?php include '../include/datatable_jquery.inc.php'; ?>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    
    function editUser(id){  
        var url = "../function/otherUserEdit.php?id=" + id;
        document.location.href = url;
        
    }
</script>
<?php include '../include/footer.inc.php'; ?>
