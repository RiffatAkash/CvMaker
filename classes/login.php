<?php

session_start();
//require 'db_connect.php';

class Login {

    public function __construct() {
        $db_connect = new Db_Connect();
    }

    
    public function login_check($data)
    {
//        echo '<pre>';
//        print_r($data);
        $email_address=$data['email'];
        $password=$data['password'];


        $query="SELECT * FROM tbl_login  WHERE email='$email_address'  AND password='$password'  ";
        if(mysql_query($query))
        {
            if(mysql_query($query))
            {
                $resouece_id=  mysql_query($query);
                $result=  mysql_fetch_assoc($resouece_id);
                if($result)
                {
                    $_SESSION['login_id']=$result['login_id'];
                    $_SESSION['name']=$result['name'];
                    header('Location:dmain.php');
                }
                else{
                    $message1="Please Enter Valid email And Password";
                    return $message1;
                }
            }
        }
        else
        {
            die('Query Problem'.mysql_error());
        }

    }


}

?>
