<?php
session_start();
$secLevel = $_SESSION['secLevel'];
if ($secLevel == 1) {
    header('Location: ./index.php');
}
?>
<?php include '../include/header.inc.php'; ?>
<?php include '../function/getUsers.php'; ?>
<?php include '../function/util.php'; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include '../include/navigation.inc.php'; ?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="well">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="user-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Security Level</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //call class to get all of the information for the table 
                                //build table with loop
                                $u = getUsers();

                                foreach ($u as $printUser) {
                                    $count = 1;

                                    //setting up the hover classes for the data table
                                    if ($count % 2 != 0) {
                                        echo '<tr class="odd">';
                                    } else {
                                        echo '<tr class="even">';
                                    }
                                    echo '<td><button onclick="editUser(' . $printUser->getId() . ')" type="button" class="btn btn-primary">Edit</button></td>';
                                    echo '<td>' . $printUser->getUsername() . '</td>';
                                    echo '<td>' . $printUser->getFirst_name() . '</td>';
                                    echo '<td>' . $printUser->getLast_name() . '</td>';
                                    echo '<td>' . $printUser->getEmail() . '</td>';
                                    echo '<td>' . $printUser->getSecurity_level() . '</td>';
                                    echo '<td>' . activeTextConvert($printUser->getActive()) . '</td>';
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

<!-- DataTables JavaScript -->
<?php include '../include/datatable_jquery.inc.php'; ?>


<script>

    function editUser(id) {
        var url = "../function/otherUserEdit.php?id=" + id;
        document.location.href = url;

    }
</script>
<?php include '../include/footer.inc.php'; ?>
