<?php
session_start();

$databaseHost = 'localhost';
$databaseName = '10118025_akademik';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} 

function base_url($url = null){
    $base_url = "http://localhost/uas";
    if ($url != null) {
        return $base_url."/".$url;
    }else{  
        return $base_url;
    }
}
?>