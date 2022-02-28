<?php 
    require_once 'user_DB.php';
    session_start();

    $mysqli = mysqli_connect($servername, $username, $password, $DB);
    if (mysqli_connect_errno()) {
        echo "Failed to connect: ",mysqli_connect_error();
    }/* else {
        echo "Connected succesfully";
    }*/

    function preformQuery($sql) {
        global $mysqli;
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            return $result;
        } else {
            echo "Something went wrong.";
        }
    }

?>