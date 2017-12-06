<?php
session_start();
$secLevel = $_SESSION['secLevel'];
if ($secLevel == "") {
    header('Location: ./index.php');
}
?>
<?php include '../include/header.inc.php'; ?>
<?php include '../function/getAttribute.php'; ?>
<?php include '../function/getHandshape.php'; ?>
<?php include '../function/searchProcessor.php'; //this handles all of the searching  ?>
<?php include '../function/util.php'; ?>
<?php include '../function/getSigns.php'; ?>



<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Search Results</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form role="form" name="mainSearch" id="mainSearch" method="POST" action="">
                <div class="row">
                    <div class="col-lg-8">    
                        <div class="input-group custom-search-form">
                            <input type="text" name="mainBar" id="mainBar" class="form-control input-lg" placeholder="Search...">
                            <span class="input-group-btn">
                                <button id="mainSearch-submit" onclick="doSearchMainBar()" class="btn btn-default btn-lg" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div><!-- /.col-lg-8 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" id="asLink" data-parent="#accordion" href="#collapseOne">
                                            Advanced Search Options<i id="asIcon" class="pull-right glyphicon glyphicon-menu-left"></i>    
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>One Handed or Two Handed</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsHanded" id="optionsHanded1" value="1" >One Handed
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsHanded" id="optionsHanded2" value="2">Two Handed
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Finished</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsFinished" id="optionsFinished" value="1">Yes
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionsFinished" id="optionsFinished" value="0">No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group tooltips">
                                                    <label  data-toggle="tooltip" data-placement="right" title="Multiple Select: Hold Command click multiple options." >Handshape</label>
                                                    <select multiple name="handshapes[]" class="form-control">
                                                        <?php
                                                        //need to have an object that will get the the information for the handshapes
                                                        //get the object then display properly 
                                                        $hs = getHandshapes($active);

                                                        foreach ($hs as $printHandshape) {
                                                            echo'<option value="' . $printHandshape->get_id() . '">' . $printHandshape->get_description() . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $attr = getAttributes($active);
                                        foreach ($attr as $printAttribute) {
                                            $nm = $printAttribute->get_aName();
                                            //makes the html for the attribute
                                            echo makeAttrIndexDiv($nm);
                                        }
                                        ?> 
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="button" onclick="doAdvanceSearch()" class="btn btn-default pull-right" >Search</button>
                                                <button type="reset" class="btn btn-default pull-right" style="margin-right: 1em;">Reset</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-lg-8 -->
                </div>
                <!-- /.row --> 
                <input type="hidden" id="sender" name="sender" value="">
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="well">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="search-table">
                            <thead>
                                <tr>
                                    <?php
                                    if ($secLevel >= 1) {
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
                                //call function to get all of the information for the table 
                                //build table with loop
                                $s = search();

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

<script src="../js/homeScreen.js" type="text/javascript"></script>
<script src="../js/searchCheck.js" type="text/javascript"></script>
<script>

    function editS(_gloss) {
        $("#signGloss").val(_gloss);
        $("form").submit();
    }

</script>
<?php include '../include/footer.inc.php'; ?>
