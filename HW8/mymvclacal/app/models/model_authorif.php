<?php

class Model_authorif extends Model
{


    public function check_login_pass($login, $password)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("SELECT id FROM users WHERE login = ? and password = ?");
//        $stmt->execute(array($login, $password));//exec with paaram
//        $myrow = $stmt->fetch();//create array
//        return $myrow['id'];
        $instance_user = $this::getInstanceUsers();
        return $instance_user->check_login_pass_eloquent($login, $password);
    }

    public function create_login_pass_salt_email($login, $password, $salt, $email, $user_ip)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("INSERT INTO users (login,password,salt,email) VALUES(?, ?, ?, ?)");
//        $stmt->execute(array($login, $password, $salt, $email));//exec with paaram
        $instance_user = $this::getInstanceUsers();
        $instance_user->create_login_pass_salt_email_eloquent($login, $password, $salt, $email, $user_ip);
    }

    public function check_login($login)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("SELECT id FROM users WHERE login = ? ");
//        $stmt->execute(array($login));//exec with paaram
//        $myrow = $stmt->fetch();//create array
//        return $myrow['id'];
        $instance_user = $this::getInstanceUsers();
        $ArrResult = $instance_user->check_login_eloquent($login);
        $Result = $ArrResult[0]['id'];
        return $Result;

    }

    public function get_salt($login)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("SELECT Salt FROM users WHERE login = ? ");
//        $stmt->execute(array($login));//exec with paaram
//        $myrow = $stmt->fetch();//create array
//        return $myrow['Salt'];
        $instance_user = $this::getInstanceUsers();
        $ArrResult = $instance_user->get_salt_eloquent($login);
        $Result = $ArrResult[0]['Salt'];
        return $Result;
    }
}



