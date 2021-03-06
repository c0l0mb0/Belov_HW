<?php
use Intervention\Image\ImageManagerStatic as Image;

class Controller_about_user extends Controller
{
    function __construct()
    {
        $this->model = new Model_about_user();
        $this->view = new View();

    }

    public function action_index()
    {
        if (isset($_SESSION['user_id'])) {
            $ID = $_SESSION['user_id'];
            $ArrInfo = $this->model->get_NameBirthAbUs($ID);
            $ArrFileList = $this->model->get_FileList($ID);

            $this->view->generate('about_user_view.twig', array('title' => 'Домашнее задание 7', 'content' => 'О себе',
                'name' => $ArrInfo[0]['Name'], 'Birth_Year' => $ArrInfo[0]['Birth_Year'], 'About_user' => $ArrInfo[0]['About_user'], 'FileList' => $ArrFileList));
        } else {
            $this->view->generate('about_user_error_view.twig', array('title' => 'У вас нет прав на просмотр данной страницы'));

        }

    }

    public function action_save_user_inf()

    {
        if (isset($_SESSION['user_id'])) {
            $ID = $_SESSION['user_id'];
            if (isset($_POST['SaveUserInfo'])) {
                if (isset($_POST['Name'])) {
                    $name = $_POST['Name'];
                    $name = htmlspecialchars(strip_tags(trim($name)), ENT_QUOTES, 'UTF-8');
                }
                if (isset($_POST['age'])) {
                    $age = (int)$_POST['age'];
                }
                if (isset($_POST['About_user'])) {
                    $About_user = $_POST['About_user'];
                    $About_user = htmlspecialchars(strip_tags(trim($About_user)), ENT_QUOTES, 'UTF-8');
                }
                $err = array();
                if (strlen($name) < 5) {
                    $err[] = 'имя должно быть не менее 5 символов';
                }
                if (strlen($About_user) < 50) {
                    $err[] = 'описание должно быть не менее 50 символов';
                }
                if ((date("Y")-$age) >100 or (date("Y")-$age) <10 ) {
                    $err[] = 'Возраст должно быть не больше 100, не меньше 10';
                }
                if (count($err) > 0) {
                    $ArrInfo = $this->model->get_NameBirthAbUs($ID);
                    $ArrFileList = $this->model->get_FileList($ID);
                    $this->view->generate('about_user_view.twig', array('title' => 'Домашнее задание 7', 'content' => 'О себе',
                        'name' => $ArrInfo[0]['Name'], 'Birth_Year' => $ArrInfo[0]['Birth_Year'], 'About_user' => $ArrInfo[0]['About_user'], 'errors' => $err, 'FileList' => $ArrFileList));
                } else {
                    $this->model->udate_name_birth_about($name, $age, $About_user, $ID);
                    header('Location:http://mymvclacal/about_user/');
                }
            }



            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PhotoLoad'])) {
                $path = 'photos/';
                // array of acceptable file types
                $types = array('image/gif', 'image/png', 'image/jpeg');
                // max file size
                $size = 1024000;

                // handling

                if (!is_null($_FILES['picture']['type'])) {
                    if (in_array($_FILES['picture']['type'], $types)) {
                        if ($_FILES['picture']['size'] < $size) {
                            $filname = htmlspecialchars(strip_tags(trim($_FILES['picture']['name'])), ENT_QUOTES, 'UTF-8');
                            $ArrAllFiles = scandir('photos/');
                            if (!in_array($filname, $ArrAllFiles)) {
                                if (!@copy($_FILES['picture']['tmp_name'], $path . $filname)) {
                                    $this->show_status('Ошибка при загрузке файла', $ID);
                                } else {
                                    $this->model->create_ueser_photo($filname, $ID);
                                    // import the Intervention Image Manager Class


                                    $img = Image::make('photos/'.$filname);
                                    // resize image instance
                                    $img->resize(480, 480);
                                    // save image in desired format
                                    $img->save('photos/'.$filname);


                                    $this->show_status('загрузка прошла удачно', $ID);
                                }
                            } else {
                                $this->show_status('Файл не загружен, т.к. он уже существует', $ID);
                            }

                        } else {
                            $this->show_status('Файл слишком большого размера', $ID);
                        }
                    } else {

                        $this->show_status('Запрещенный тип файла', $ID);
                    }
                } else {
                    $this->show_status('файл отсутствует', $ID);
                }

            }

        } else {
            $this->view->generate('about_user_error_view.twig', array('title' => 'У вас нет прав на просмотр данной страницы'));
        }

    }

    public function show_status($status, $id)
    {
        $ArrInfo = $this->model->get_NameBirthAbUs($id);
        $ArrFileList = $this->model->get_FileList($id);
        $this->view->generate('about_user_view.twig', array('title' => 'Домашнее задание 7', 'content' => 'О себе',
            'name' => $ArrInfo[0]['Name'], 'Birth_Year' => $ArrInfo[0]['Birth_Year'], 'About_user' => $ArrInfo[0]['About_user'], 'status' => $status, 'FileList' => $ArrFileList));
    }


}
