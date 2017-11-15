<?php include '../include/header.inc.php'; ?>
<?php include '../function/getHandshape.php'; ?>
<?php include '../function/getAttribute.php'; ?>
<?php include '../function/util.php';?>

<?php $active = TRUE; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search</h1>
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
                                                <label  data-toggle="tooltip" data-placement="right" title="Multiple Select: Hold Command click multiple options." >Hand Shape</label>
                                                <select multiple name="handshapes[]" class="form-control">
                                                    <?php
                                                    //need to have an object that will get the the information for the handshapes
                                                    //get the object then display properly 
                                                    $hs = getHandshapes($active);

                                                    foreach ($hs as $printHandshape) {
                                                        echo'<option value="' . $printHandshape->get_id() . '">'. $printHandshape->get_description() .'</option>';
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $attr = getAttributes($active);
                                            foreach ($attr as $printAttribute){
                                                $nm =  $printAttribute->get_aName();
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
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include '../include/bottom_jquery.inc.php'; ?>
    <script src="../js/homeScreen.js" type="text/javascript"></script>
    <script src="../js/searchCheck.js" type="text/javascript"></script>
    <script>
        // tooltip demo
        $('.tooltips').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });
    </script>
    <?php include '../include/footer.inc.php'; ?>
