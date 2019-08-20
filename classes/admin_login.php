<?php

session_start();
require 'db_connect.php';

class Slogin {

    public function __construct() {
        $db_connect = new Db_Connect();
    }

    public function admin_login_check($data) {
        $email_address = $data['email_address'];
        $password = md5($data['password']);
        $query = "SELECT * FROM tbl_slogin WHERE email='$email_address' and password='$password'";
        if (mysql_query($query)) {
            $resource_id = mysql_query($query);
            $login_info = mysql_fetch_assoc($resource_id);
            if ($login_info) {
                $_SESSION['login_id'] = $login_info['login_id'];
                $_SESSION['user_name'] = $login_info['user_name'];
                $_SESSION['type'] = $login_info['type'];
                if ($login_info['type'] == 'A' || $login_info['type'] == 'a') {
                    header('Location: dashboard.php');
                }
            } else {
                $message = 'Please use valid information!!';
                return $message;
            }
        } else {
            die('Query Problem' . mysql_error());
        }
    }
    
}

?>
