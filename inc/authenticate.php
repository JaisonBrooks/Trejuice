<?php session_start();
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/29/14
 * Time: 10:40 AM
 */

/** INCLUDES */
require_once 'database.php';
include 'sql_auth.php';

/** VARIABLES */
global $authenticated; $authenticated = false;
global $logged_user_id;
global $logged_user_email;
global $logged_user_name;
$session_key = session_id();
$sql = new sql_auth();

/** Get Session information */
//"SELECT `session_id`, `user_id` FROM `sessions` WHERE `session_key` = ? AND `session_address` = ? AND `session_useragent` = ? AND `session_expires` > NOW();"
$query = $CONNECTION->prepare($sql->get_auth_sql_str());
$query->bind_param("sss", $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
$query->execute();
$query->bind_result($session_id, $logged_user_id);
$query->fetch();
$query->close();

if(empty($session_id)) {
    $authenticated = false;
    //header('Location: ../app/login.php');
} else {
    $authenticated = true;

    /** Update Session */
    //"UPDATE `sessions` SET `session_expires` = DATE_ADD(NOW(),INTERVAL 1 HOUR) WHERE `session_id` = ?;"
    $query = $CONNECTION->prepare($sql->get_update_session_sql_str());
    $query->bind_param("i", $session_id);
    $query->execute();
    $query->close();

    /** Get UserInfo */
    $query = $CONNECTION->prepare($sql->get_user_general_info());
    $query->bind_param("s", $logged_user_id);
    $query->execute();
    $query->bind_result($logged_user_name,$logged_user_email);
    $query->fetch();
    $query->close();
}

?>
