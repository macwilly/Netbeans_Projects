<?php include '../include/header.inc.php'; ?>

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
        <form role="form">
            <div class="row">
                <div class="col-lg-8">    
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control input-lg" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-lg" type="button">
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
<?php include '../include/footer.inc.php'; ?>
