<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/3/14
 * Time: 9:31 PM
 */

date_default_timezone_set('America/Los_Angeles');
$date = date('m-d-Y_h-i-a', time());
$sep = '_';
$dot = '.';
$n = "\n";

if (!empty($_POST)) {
    // Post is not empty()
    $category = $_POST['category'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    //file info
    if (!empty($_FILES)) {
        // Files are not empty
        // create upload directory
        $upload_dir = realpath(getcwd() . '/../') . '/uploads/';
        $info = pathinfo($_FILES['userfile']['name']);
        $ext = $info['extension']; // get the extension of the file
        $new_filename = 'photo' . $sep . $category . $sep . $date . $dot .$ext;

        //Upload the file
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_dir . $new_filename)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo '<pre>';
            echo "Possible file upload attack!\n";
            echo 'Here is some more debugging info:';
            print "</pre>";
            print_r($_FILES);
        }

    } else {
        echo "Files was empty";
    }

} else {
    echo "Post was empty";
}

?>