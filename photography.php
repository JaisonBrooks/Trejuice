<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 10:23 PM
 */
$pageTitle = "Photography";
include "inc/arrays.php";
include "inc/header.php";
include "inc/uielements.php";

if (isset($_GET)) {
    if (isset($_GET["type"])) {
        global $TYPE; $TYPE = $_GET["type"];
        echo get_starting_card_dark_html();
        echo get_starting_card_dark_body_html();
        echo "<h1>" .$TYPE."</h1>";
        echo get_a_crap_ton_of_whitespace();
        echo get_ending_card_body_html();
        echo get_ending_card_html();
    }
}



include "inc/footer.php";