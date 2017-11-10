<?php

if($secLevel >=1){
    include '../include/signViewUsers.inc.php';                 
}else{
    include '../include/signViewGuest.inc.php';
}

