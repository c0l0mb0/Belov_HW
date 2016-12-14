<?php

class Model_authorif extends Model
{


    public function check_login_pass($login, $password)
    {
        $DB = $this::getInstance();
        $stmt = $DB->prepare("SELECT id FROM users WHERE login = ? and password = ?");
        $stmt->execute(array($login, $password));//exec with paaram
        $myrow = $stmt->fetch();//create array
        return $myrow['id'];
    }

    public function create_login_pass_salt_email($login, $password, $salt, $email)
    {
        $DB = $this::getInstance();
        $stmt = $DB->prepare("INSERT INTO users (login,password,salt,email) VALUES(?, ?, ?, ?)");
        $stmt->execute(array($login, $password, $salt, $email));//exec with paaram
    }

    public function check_login($login)
    {
        $DB = $this::getInstance();
        $stmt = $DB->prepare("SELECT id FROM users WHERE login = ? ");
        $stmt->execute(array($login));//exec with paaram
        $myrow = $stmt->fetch();//create array
        return $myrow['id'];
    }

    public function get_salt($login)
    {
        $DB = $this::getInstance();
        $stmt = $DB->prepare("SELECT Salt FROM users WHERE login = ? ");
        $stmt->execute(array($login));//exec with paaram
        $myrow = $stmt->fetch();//create array
        return $myrow['Salt'];
    }
}



