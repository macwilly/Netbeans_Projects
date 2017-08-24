<?php include '../include/header.inc.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Please Sign In</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="loginForm" method="POST" action="index.php">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Username" name="username" id="username" type="email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                        </div>
<!--                                        <div class="checkbox">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                            </label>
                                        </div>-->
                                        <!-- Change this to a button or input when using this as a form -->
                                        <a href="#" onclick="doLogin()" class="btn btn-lg btn-success btn-block">Login</a>
                                        <a href="index.php" class="btn btn-lg btn-success btn-block">Cancel </a>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>
<script src="../js/loginFormChecking.js" type="text/javascript"></script>
<?php include '../include/footer.inc.php'; ?>