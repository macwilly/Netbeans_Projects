<?php
switch($_GET['error']){
    case 'notcsv':
        echo '<h4>You did not submit a CSV File. Please try again with a CSV File.</h4>';
        break;
    default :
        break;
}

