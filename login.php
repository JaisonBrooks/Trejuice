<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 10:55 PM
 */

echo " You made it the login page";
$pageTitle = "Login";
include "inc/arrays.php";
include "inc/header.php";
include "inc/uielements.php";

if (isset($_GET)) {
    if (isset($_GET["tag"])) {
        $TAG = $_GET["tag"];
        echo get_starting_card_dark_html();
        echo get_starting_card_dark_body_html();
        echo "<h1>" .$TAG."</h1>";
        echo get_ending_card_body_html();
        echo get_ending_card_html();
    }
}



include "inc/footer.php";