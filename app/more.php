<?php require_once '../inc/authenticate.php';
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 10:23 PM
 */
$pageTitle = "More";
include "../inc/arrays.php";
include "../inc/header.php";
include "../inc/uielements.php";

if (isset($_GET)) {
    if (isset($_GET["type"])) {
        global $TYPE; $TYPE = $_GET["type"];
        echo get_starting_card_dark_html();
        echo get_starting_card_dark_body_html();?>
        <h1><?php echo $TYPE; ?></h1>
        <form action="../inc/upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="text" name="friendly_name" id="friendly_name" />
            <input type="text" name="description" id="description" />
            <input type="submit" value="Upload Image" name="submit">
        </form>
        <?php
        echo get_a_crap_ton_of_whitespace();
        echo get_ending_card_body_html();
        echo get_ending_card_html();
    }
}

include "../inc/footer.php";