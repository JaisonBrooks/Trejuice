<?php require_once '../inc/authenticate.php';

/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 8:35 PM
 */
$pageTitle = "Home";
require_once '../inc/database.php';
include("../inc/arrays.php");
include "../inc/header.php";
include "../inc/uielements.php";?>


<div class="jumbotron home-container" style="text-align: center;">
    <img src="../img/trejuice-logo-white-dropshadow.png" class="heading-logo" />
</div>


<?php
//if ($authenticated) {
//    echo "its true";
//} else {
//    echo "its not true";
//} ?>

<!--<div style="background-color: rgba(75,75,75,0.45); margin-top: 124px; margin-left: 16px; border-radius: 8px;">-->
<!--    <h1 class="text-header" style="text-shadow: 2px 2px 2px #000; text-align: center;">Trejuice</h1>-->
<!--</div>-->


 <!-- include "../inc/footer.php"; -->
<?php include '../inc/js_scripts.php';