<?php

//gets the name of the page and returns the Title for that page

function titleInformation($pageName) {

    switch ($pageName) {
        case 'attribute.php':
            echo 'Attribute';
            break;
        case 'attributes.php':
            echo 'Attributes';
            break;
        case 'handshape.php':
            echo 'Handshape';
            break;
        case 'handshapes.php':
            echo 'Handshape';
            break;
        case 'index.php':
            echo 'Main';
            break;
        case 'login.php':
            echo 'Login';
            break;
        case 'sign.php':
            echo 'Sign';
            break;
        case 'signList.php':
            echo 'Sign List';
            break;
        case 'user.php':
            echo 'User';
            break;
        case 'users.php':
            echo 'Users';
            break;
        default:
            break;
    }
}
