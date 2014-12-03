<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 11/11/14
 * Time: 9:24 AM
 */

function get_starting_container_html() {
    $HTML = "";
    $HTML = $HTML . '<div class="container">';
    $HTML = $HTML . '<div class="well">';
    return $HTML;
}
function get_starting_card_html() {
    $HTML = "";
    $HTML = $HTML . '<div class="container" style="margin-bottom:20px;"><div class="card">';
    return $HTML;
}
function get_starting_card_dark_html() {
    $HTML = "";
    $HTML = $HTML . '<div class="container" style="margin-bottom:20px;"><div class="card-dark">';
    return $HTML;
}
function get_ending_card_html() {
    $HTML = "";
    $HTML = $HTML . '</div></div>';
    return $HTML;
}

function get_ending_container_html() {
    $HTML = "";
    $HTML = $HTML . '</div></div></div>';
    return $HTML;
}
function get_starting_card_body_html() {
    $HTML = "";
    $HTML = $HTML . '<div class="card-outside"><div class="card-body">';
    return $HTML;
}
function get_ending_card_body_html() {
    $HTML = "";
    $HTML = $HTML . '</div></div>';
    return $HTML;
}
function get_starting_card_dark_body_html() {
    $HTML = "";
    $HTML = $HTML . '<div class="card-outside-dark"><div class="card-body">';
    return $HTML;
}
function get_starting_card_body_not_active_html() {
    $HTML = "";
    $HTML = $HTML . '<div class="card-outside-not-active"><div class="card-body">';
    return $HTML;
}
function get_starting_card_body_colored_not_active_html() {
    $HTML = "";
    $HTML = $HTML . '<div class="card-outside-colored-not-active"><div class="card-body">';
    return $HTML;
}

function get_error_html($error, $stacktrace) {
    $HTML = "";
    $HTML = $HTML . get_starting_container_html();
    $HTML = $HTML . '<h2>'. $error  .'</h2>';
    $HTML = $HTML . '<div class="alert alert-warning">' . '<p>' . $stacktrace . '</p>' . '</div>';
    $HTML = $HTML . '<a class="btn btn-warning btn-lrg" href="index.php">Go Home</a>';
    $HTML = $HTML . get_ending_container_html();
    return $HTML;
}

function get_error_page($error, $stacktrace) {
    $HTML = "";
    $HTML = $HTML . (include_once('header.php'));
    $HTML = $HTML . get_error_html($error, $stacktrace);
    $HTML = $HTML . (include_once('footer.php'));
    return $HTML;
}
function get_starting_container() {
    $HTML = "";
    $HTML = $HTML . '<div class="container">';
    return $HTML;
}
function get_ending_container() {
    $HTML = "";
    $HTML = $HTML . '</div>';
    return $HTML;
}
function get_a_crap_ton_of_whitespace() {
    $HTML = "<pre>\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n</pre>";
    return $HTML;
}