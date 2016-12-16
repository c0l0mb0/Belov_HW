<?php



use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'colombo_bd',
    'username' => 'colombo',
    'password' => '132',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

class Photos extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

    public function get_FileList_eloquent($id)
    {
        return Photos::select('photo_name')->where('id_user', '=', $id)->get();
    }

    public function create_ueser_photo_eloquent($photo_name, $id)
    {
        Photos::insert(['photo_name' => $photo_name, 'id_user' => $id]);
    }

}

class Users extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

    public function get_UsersSortByAge_eloquent()
    {
        return Users::select('Name', 'Birth_Year')->where('Birth_Year', '>', 0)->orderBy('Birth_Year', 'desc')->get();
    }

    public function get_NameBirthAbUs_eloquent($id)
    {
        return Users::select('Name', 'Birth_Year', 'About_user')->where('id', '=', $id)->get();
    }

    public function udate_name_birth_about_eloquent($name, $birth_year, $about, $id)
    {
        Users::where('id', $id)->update(['Name' => $name, 'Birth_Year' => $birth_year, 'About_user' => $about]);

    }


    public function check_login_pass_eloquent($login, $password)
    {
        return Users::select('id')->where([['login', $login], ['password', $password]])->get();
    }

    public function create_login_pass_salt_email_eloquent($login, $password, $salt, $email, $user_ip)
    {
        Users::insert(['login' => $login, 'password' => $password, 'Salt' => $salt, 'email' => $email, 'user_ip' => $user_ip]);
    }

    public function check_login_eloquent($login)
    {
        return Users::select('id')->where('login', $login)->get();
    }

    public function get_salt_eloquent($login)
    {
        return Users::select('Salt')->where('login', $login)->get();
    }
}