<?php

class Model_all_user extends Model
{

    public function get_UsersSortByAge()
    {
        $DB = $this::getInstance();
        $stmt = $DB->query("SELECT Name, Birth_Year, CASE  WHEN Birth_Year >  YEAR(CURDATE())-18
                   THEN 'совершеннолетний' 
                   ELSE 'несовершеннолетний'  
                   END as adult 
                FROM users");
        $myrow = $stmt->fetchall();//create array
        return $myrow;

    }


}