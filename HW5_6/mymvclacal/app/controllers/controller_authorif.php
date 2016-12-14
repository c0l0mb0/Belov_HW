<?php

class Controller_authorif extends Controller
{
    function __construct()
    {
        $this->model = new Model_authorif();
        $this->view = new View();
    }

    function generateSalt()
    {
        $salt = '';
        $length = rand(5, 10); // длина соли (от 5 до 10 сомволов)
        for ($i = 0; $i < $length; $i++) {
            $salt .= chr(rand(33, 126)); // символ из ASCII-table
        }
        return $salt;
    }

    public function action_index()
    {
        $this->view->generate('authorif_view.twig',
            array(
                'title' => 'Добро пожаловать',
                'content' => "Введите свои данные или зарегистрируйтесь"
            ));

    }


    public function action_check_pass()
    {
        //  button enter pressed
        $err = array();
        if (isset($_POST['Enter'])) {

            if (isset($_POST['login']) && empty($_POST['login'])) {
                $err[] = 'поле логин не может быть пустым';
            }
            if (isset($_POST['password']) && empty($_POST['password'])) {
                $err[] = 'поле пароль не может быть пустым';
            }
            if (count($err) > 0) {
                $this->view->generate('authorif_view.twig',
                    array(
                        'title' => 'Добро пожаловать',
                        'content' => "Введите свои данные или зарегистрируйтесь",
                        'errors' => $err
                    ));
            } else {
                if (isset($_POST['login'])) {
                    $login = $_POST['login'];
                    $login = stripslashes($login);
                    $login = strip_tags($login);
                    $login = trim($login);
                    $salt = $this->model->get_salt($login);
                }
                if (isset($_POST['login'])) {
                    $password = $_POST['password'];
                    $password = stripslashes($password);
                    $password = strip_tags($password);
                    $password1 = trim($password);

                }

                if (!empty ($salt)) {
                    $password = MD5($password1 . $salt, false);
                    $id = $this->model->check_login_pass($login, $password);
                }

                if (!empty($id)) {
                    $_SESSION['user_id'] = $id;

                    $this->view->generate('authorif_view.twig',
                        array(
                            'title' => 'Добро пожаловать',
                            'content' => "Введите свои данные или зарегистрируйтесь",
                            'result' => 'Вход выполнен'
                        ));
                } else {
                    $err[0] = 'Введены неверные данные';
                    $this->view->generate('authorif_view.twig',
                        array(
                            'title' => 'Добро пожаловать',
                            'content' => "Введите свои данные или зарегистрируйтесь",
                            'errors' => $err
                        ));
                }

            }
        }
        if (isset($_POST['Registration'])) {

            if (isset($_POST['login']) && empty($_POST['login'])) {
                $err[] = 'поле логин не может быть пустым';
            }
            if (isset($_POST['password']) && empty($_POST['password'])) {
                $err[] = 'поле пароль не может быть пустым';
            }
            if (isset($_POST['password']) && empty($_POST['password'])) {
                $err[] = 'поле почта не может быть пустым';
            }
            $recapcthca =  $this->check_recaptcha();
            if ($recapcthca <> 'verified') {
                $err[] = $recapcthca;
            }
            if (count($err) > 0) {
                $this->view->generate('authorif_view.twig',
                    array(
                        'title' => 'Добро пожаловать',
                        'content' => "Введите свои данные или зарегистрируйтесь",
                        'errors' => $err
                    ));
            }
            else {
                if (isset($_POST['login'])) {
                    $login = $_POST['login'];
                    $login = stripslashes($login);
                    $login = strip_tags($login);
                    $login = trim($login);
                }
                if (isset($_POST['login'])) {
                    $password = $_POST['password'];
                    $password = stripslashes($password);
                    $password = strip_tags($password);
                    $password = trim($password);
                }
                if (isset($_POST['mail'])) {
                    $mail = $_POST['mail'];
                    $mail = stripslashes($mail);
                    $mail = strip_tags($mail);
                    $mail = trim($mail);
                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $id = $this->model->check_login($login);
                        if (empty($id)) {
                            $salt = $this->generateSalt();
                            $password = MD5($password . $salt, false);

                            $this->model->create_login_pass_salt_email($login, $password, $salt, $mail);
                            $sendResult = $this->authorif_send_letter($mail, $login);
                            if ($sendResult = true ) {
                                $this->view->generate('authorif_view.twig',
                                    array(
                                        'title' => 'Добро пожаловать',
                                        'content' => "Введите свои данные или зарегистрируйтесь",
                                        'result' => 'Вы добавлены! Вам отправлено письмо!'
                                    ));
                            }else {
                                $this->view->generate('authorif_view.twig',
                                    array(
                                        'title' => 'Добро пожаловать',
                                        'content' => "Введите свои данные или зарегистрируйтесь",
                                        'result' => 'Вы добавлены! Не получилось отправить письмо!'
                                    ));
                            }

                        } else {
                            $err[0] = 'Данный логин занят';
                            $this->view->generate('authorif_view.twig',
                                array(
                                    'title' => 'Добро пожаловать',
                                    'content' => "Введите свои данные или зарегистрируйтесь",
                                    'errors' => $err
                                ));
                        }
                    } else {
                        $this->view->generate('authorif_view.twig',
                            array(
                                'title' => 'Добро пожаловать',
                                'content' => "Введите свои данные или зарегистрируйтесь",
                                'errors' => 'Не верный формат почты'
                            ));
                    }
                }

            }
        }
        // just send a letter
        if (isset($_POST['SendMeLetter'])) {

            require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.yandex.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'c0l0b01@yandex.ru';                 // SMTP username
            $mail->Password = '123456788';                           // SMTP password
            $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            $mail->setFrom('c0l0b01@yandex.ru', 'Cyborg');
            $mail->addAddress('bis80@bk.ru', 'Ivan Belov');     // Add a recipient


            $mail->addAttachment('/photos/186954.jpg');         // Add attachments
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'very important message';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'Привет';

            if (!$mail->send()) {
                $err[0] = 'ошибка при отправлении письма';
                $this->view->generate('authorif_view.twig',
                    array(
                        'title' => 'Добро пожаловать',
                        'content' => "Введите свои данные или зарегистрируйтесь",
                        'errors' => $err
                    ));
            } else {
                $this->view->generate('authorif_view.twig',
                    array(
                        'title' => 'Добро пожаловать',
                        'content' => "Введите свои данные или зарегистрируйтесь",
                        'result' => 'Письмо отправлено!'
                    ));
            }

        }
    }

    public function authorif_send_letter($adress, $login)
    {

        require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.yandex.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'c0l0b01@yandex.ru';                 // SMTP username
        $mail->Password = '123456788';                           // SMTP password
        $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('c0l0b01@yandex.ru', 'Cyborg');
        $mail->addAddress('bis80@bk.ru', 'Ivan Belov');     // Add a recipient


        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Massage from site';
        $mail->Body = ' Поздравляем, ' . $login . ' вы успешно зарегились';


        if (!$mail->send()) {
            return $result=true;
        } else {
            return $result=false;
        }

    }
    public function check_recaptcha() {
        $secret= "6LdHxw4UAAAAAI33SWvUverKAefeyJi93O7eyqlY";
        $remoteIp =  $_SERVER['REMOTE_ADDR'];
        $gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];

        require_once "vendor/google/recaptcha/src/autoload.php";
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
        if ($resp->isSuccess()) {
            return $response = 'verified';
        } else {
            return $response = 'вы не прошл проверку, возможно вы киборг';
        }
    }

}

