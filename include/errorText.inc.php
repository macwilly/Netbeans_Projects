<?php
switch($_GET['error']){
    case 'duplicateGloss':
        echo '<h3>The following sign glosses are already in the database. Please remove them from your XML File and upload again.</h3>';
        break;
    case 'load':
        echo '<h3>There was an error loading the submitted XML file.</h3>';
        break;
    case 'notxml':
        echo '<h4>You did not submit a XML File. Please try again with a XML File.</h4>';
        break;
    default :
        break;
}

