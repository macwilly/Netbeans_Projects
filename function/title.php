<?php

//gets the name of the page and returns the Title for that page

function titleInformation($pageName) {
    if ($pageName == "index.php") {
        echo 'Main';
    } elseif ($pageName == 'login.php') {
        echo 'Login';
    }
}
