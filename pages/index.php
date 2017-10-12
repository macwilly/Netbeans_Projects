<?php include '../include/header.inc.php'; ?>
<?php include '../function/getHandShape.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <form role="form" name="mainSearch" method="POST" action="">
            <div class="row">
                <div class="col-lg-8">    
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control input-lg" placeholder="Search...">
                        <span class="input-group-btn">
                            <button id="mainSearch-submit" class="btn btn-default btn-lg" type="button">
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
                                                        <input type="radio" name="optionsHanded" id="optionsHanded1" value="1" checked>One Handed
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsHanded" id="optionsHanded2" value="2">Two Handed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group tooltips">
                                                <label  data-toggle="tooltip" data-placement="right" title="Multiple Select: Hold Command click multiple options." >Hand Shape</label>
                                                <select multiple class="form-control">
                                                    <?php
                                                    //need to have an object that will get the the information for the handshapes
                                                    //get the object then display properly 
                                                    $hs = getHandshapes();

                                                    foreach ($hs as $printHandshape) {
                                                        echo'<option value="' . $printHandshape->get_id() . '">'. $printHandshape->get_description() .'</option>';
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="background-color: #31b131">
                                            <div class="col-lg-5 col-lg-offset-7 col-md-7">
                                                <button type="button" class="btn btn-default">Search</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-lg-8 -->
                </div>
                <!-- /.row --> 
            </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include '../include/bottom_jquery.inc.php'; ?>
    <script src="../js/homeScreen.js" type="text/javascript"></script>
    <script>
        // tooltip demo
        $('.tooltips').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });
    </script>
    <?php include '../include/footer.inc.php'; ?>
