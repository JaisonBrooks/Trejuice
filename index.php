<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 8:35 PM
 */
$pageTitle = "Home";

include("inc/arrays.php");
include "inc/header.php";
include "inc/uielements.php";

echo get_starting_card_dark_html();
echo get_starting_card_dark_body_html();
echo "<h1>" ."Hello"."</h1>";
echo get_a_crap_ton_of_whitespace();
echo get_ending_card_body_html();
echo get_ending_card_html();

include "inc/footer.php";