<?php
    $localhost = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'transaction';
    $conn = new mysqli($localhost, $db_user, $db_password, $db_name) or die ('Error in connecting');
?>