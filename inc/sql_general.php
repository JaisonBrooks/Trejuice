<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/5/14
 * Time: 11:05 AM
 */

class sql {
    public function get_user_info() {
        $SQL = "";
        return $SQL . "SELECT `user_login`, `user_fullname`, `user_email`, `user_registered` FROM `users` WHERE `user_id` = ?";
    }
    public function get_validate_pass_sql_str() {
        $SQL = "";
        return $SQL . "SELECT `user_password` FROM `users` WHERE `user_id` = ? ";
    }
    public function get_update_pass_sql_str($PASS,$USERID) {
        $SQL = "";
        return $SQL . "UPDATE `users` SET `user_password` = PASSWORD('{$PASS}') WHERE `user_id` = '{$USERID}'";
    }
} 