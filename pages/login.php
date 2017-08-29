<?php include '../include/header.inc.php'; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>
    
    <?php
        //Checking for error information
        
        if(is_null($_GET["error"])){
            echo '<h1>There is an error</h1>';
        }else{
            echo '<h1>Hello</h1>';
        }
    ?>
    
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row hidden" >
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        Error
                    </div>
                    <div class="panel-body">
                        <p>There was an error with your login. Please try again.</p>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="loginForm" onsubmit="return doLogin()" method="POST" action="index.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" id="username" type="input" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" required>
                                </div>
                                <!--                                        <div class="checkbox">
                                                                            <label>
                                                                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                                                            </label>
                                                                        </div>-->
                                <!-- Change this to a button or input when using this as a form -->

                                <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                                <a href="index.php" class="btn btn-lg btn-success btn-block">Cancel </a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<?php include '../include/bottom_jquery.inc.php'; ?>
<script src="../js/loginFormChecking.js" type="text/javascript"></script>
<?php include '../include/footer.inc.php'; ?>