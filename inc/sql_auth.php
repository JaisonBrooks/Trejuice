<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/29/14
 * Time: 10:03 AM
 */

class sql_auth {
    public function get_auth_sql_str() {
        $SQL = "";
        return $SQL . "SELECT `session_id`, `user_id` FROM `sessions` WHERE `session_key` = ? AND `session_address` = ? AND `session_useragent` = ? AND `session_expires` > NOW();";
    }
    public function get_update_session_sql_str() {
        $SQL = "";
        return $SQL . "UPDATE `sessions` SET `session_expires` = DATE_ADD(NOW(),INTERVAL 1 HOUR) WHERE `session_id` = ?";
    }
    public function get_user_general_info() {
        $SQL = "";
        return $SQL . "SELECT `user_fullname`, `user_email` FROM `users` WHERE `user_id` = ?";
    }
    public function get_user_auth_sql_str() {
        $SQL = "";
        return $SQL . "SELECT `user_id`,`user_email`,`user_fullname` FROM `users` WHERE `user_email` = ? AND `user_password` = PASSWORD(?) ";
    }
    public function get_sessions_push_sql_str() {
        $SQL = "";
        return $SQL . "INSERT INTO `sessions` ( `user_id`, `session_key`, `session_address`, `session_useragent`, `session_expires`) VALUES ( ?, ?, ?, ?, DATE_ADD(NOW(),INTERVAL 1 HOUR) );";
    }
    public function get_user_email_exist_sql_str() {
        $SQL = "";
        return $SQL  . "SELECT `user_email` FROM `users` WHERE `user_email` = ?";
    }
    public function get_user_password_reset_sql_str($pEMAIL, $pNEWPASSWORD) {
        $SQL = "";
        return $SQL . "UPDATE users SET `user_password` = PASSWORD('{$pNEWPASSWORD}') WHERE `user_email` = '{$pEMAIL}'";
    }
}