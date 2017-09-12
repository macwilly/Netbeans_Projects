<?php
$pg = basename($_SERVER['PHP_SELF']);
$tableId = "";

switch($pg){
    case "users.php":
        $tableId = "user-table";
        break;
}

?>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Stript used to run the data table -->

<script>
    $(document).ready(function () {
        $('#<?php echo $tableId; ?>').DataTable({
            responsive: true
        });
    });
</script>