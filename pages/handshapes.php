<?php include '../include/header.inc.php'; ?>
<?php include '../function/getHandshape.php'; ?>
<?php include '../function/util.php'; ?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Handshapes</h1>
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
                                $hs = getHandshapes(FALSE);

                                foreach ($hs as $printHandshape) {
                                    $count = 1;
                                    if($printHandshape->get_imageLocation() == "na"){
                                        $photo = "none.gif";
                                    }else{
                                        $photo = $printHandshape->get_imageLocation();
                                    }
                                    //setting up the hover classes for the data table
                                    if ($count % 2 != 0) {
                                        echo '<tr class="odd">';
                                    } else {
                                        echo '<tr class="even">';
                                    }
                                    echo '<td><button onclick="editHS('.$printHandshape->get_id() .')" type="button" class="btn btn-primary">Edit</button></td>';
                                    echo '<td>' . $printHandshape->get_description() . '</td>';
                                    echo '<td>' . $printHandshape->get_embrDescription() . '</td>';
                                    echo '<td><img src="../images/handshape/' . $photo . '" height="108px" width="77px" alt="'. $photo .'"/></td>';
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
<form method="POST" name="editHandshape" action="./handshape.php?type=2">
    <input type="hidden" name="handshapeId" id="handshapeId">
    
</form>

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>


<!-- DataTables JavaScript -->
<?php include '../include/datatable_jquery.inc.php'; ?>

<script>
    
    function editHS(_id){ 
        $("#handshapeId").val(_id);
        $("form").submit();        
    }
    
</script>
<?php include '../include/footer.inc.php'; ?>
