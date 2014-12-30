<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/29/14
 * Time: 9:57 AM
 */
global $CONNECTION;

if ( isset( $CONNECTION ) )
    return;
$CONNECTION = getConnection();

if ($CONNECTION->connect_error) {
    echo $CONNECTION->connect_error;
    exit();
}

function getConnection() {
    $CONNECTION = new mysqli("localhost", "root", "root", "trejuice", 8889);
    return $CONNECTION;
}