<?php
switch($_GET['error']){
    case 'dataError':
        echo '<h4>None of the signs were entered into the database. The following sign(s) had errors in the handedness or finished values. Please enter an acceptable value for those.</h4>';
        break;
    case 'duplicateGloss':
        echo '<h4>None of the signs were entered into the database. The following sign(s) gloss are already in the database. Please remove them from your XML File and upload again.</h4>';
        break;
    case 'load':
        echo '<h3>There was an error loading the submitted XML file.</h3>';
        break;
    case 'notxml':
        echo '<h3>You did not submit a XML File. Please try again with a XML File.</h3>';
        break;
    case 'xmlDuplicate':
        echo '<h4>None of the signs were entered into the database. The following sign(s) were duplicated in your XML file. Make sure there is only one instance of each sign.';
        break;
    default :
        break;
}

