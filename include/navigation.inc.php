<?php
session_start();
if ($_SESSION['secLevel'] > 0) {
    $navSearch = 'doSearch()';
} else {
    $navSearch = '#';
}
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">AASLDB</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li>
            <?php
            try {
                $un = $_SESSION["userName"];
            } catch (Exception $e) {
                $un = "";
            }
            if ($un == "") {
                echo "Guest ";
            } else {
                $secLevel = $_SESSION["secLevel"];
                echo $_SESSION["firstName"] . " " . $_SESSION["lastName"] . " ";
            }
            ?>|
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <?php
                if ($un == "") {
                    echo '<li>';
                    echo '<a  href="./login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a>';
                    echo '</li>';
                } else {
                    echo '<li>';
                    echo '<a  href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>';
                    echo '</li>';

                    echo '<li class="divider"></li>';

                    echo '<li>';
                    echo '<a  href="../classes/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>';
                    echo '</li>';
                }
                ?>

            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <form name="navSearch">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" onclick="<?php echo $navSearch ?>" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </form>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="./index.php"><i class="glyphicon glyphicon-home fa-fw"></i> Home</a>
                </li>
                <?php
                if ($un == "") {
                    //include '../include/signNavGuest.inc.php';
                    include '../include/userNavGuest.inc.php';
                } else {
                    include '../include/signNavUser.inc.php';
                    include '../include/handshapeNavUser.inc.php';
                    include '../include/userNavUser.inc.php';
                    if ($secLevel == 3) {
                        
                    }
                }
                ?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>