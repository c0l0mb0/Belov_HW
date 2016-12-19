<?php

class Model_about_user extends Model
{

    public function get_NameBirthAbUs($id)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("SELECT Name, Birth_Year, About_user FROM users WHERE id = ? ");
//        $stmt->execute(array($id));//exec with paaram
//        $myrow = $stmt->fetch();//create array
//        return $myrow;
        $instance_user = $this::getInstanceUsers();
        return $instance_user->get_NameBirthAbUs_eloquent($id);

    }

    public function udate_name_birth_about($name, $birth_year, $about, $id)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("UPDATE users SET Name = ?, Birth_Year = ?, About_user = ? WHERE id = ?");
//        $stmt->execute(array($name, $birth_year, $about, $id));//exec with paaram
        $instance_user = $this::getInstanceUsers();
        $instance_user->udate_name_birth_about_eloquent($name, $birth_year, $about, $id);
    }

    public function create_ueser_photo($photo_name, $id)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("INSERT INTO Photos (photo_name, id_user) VALUES (?,?)");
//        $stmt->execute(array($photo_name, $id));//exec with paaram
        $instance_photos = $this::getInstancePhotos();
        $instance_photos->create_ueser_photo_eloquent($photo_name, $id);
    }

    public function get_FileList($id)
    {
//        $DB = $this::getInstance();
//        $stmt = $DB->prepare("SELECT photo_name FROM Photos WHERE id_user = ? ");
//        $stmt->execute(array($id));//exec with paaram
//        $myrow = $stmt->fetchall();//create array
//        //flatted array
//        $ArrResult = array();
//        foreach($myrow as $i) {
//            $ArrResult[] = $i[0];
//        }
//
//        return $ArrResult;
//
        $instance_photos = $this::getInstancePhotos();
        $fileList =$instance_photos->get_FileList_eloquent($id);
        //flatted array
        $ArrFileListFlat = array();
        foreach ($fileList as $i) {
            $ArrFileListFlat[] = $i['photo_name'];
        }
        return $ArrFileListFlat;

    }
}