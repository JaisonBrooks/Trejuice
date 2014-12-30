<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/30/14
 * Time: 3:01 PM
 */

$target_path = "/home/userunknown/www/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']).
        " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}

echo "Current directory " . getcwd();