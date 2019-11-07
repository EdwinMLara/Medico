<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct() {
        $argv = func_get_args();

        switch (func_num_args()) {
            case 0:
                self::__construct1();
                break;
        
            case 2:
                self::__construct2($argv[0],$argv[1]);
                break;
        }
    }

    function __construct1(){
        if (isset($_GET["logout"])) {
            $this->doLogout();
            header("location: ../logout.php");
        }
    }

    function __construct2($user,$password){
        $this->dologinWithPostData($user,$password);

    }


    /**
     * log in with post data
     */
    private function dologinWithPostData($user,$password)
    {
        // check login form contents
        if (empty($user)) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($password)) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($user) && !empty($password)){

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($user);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT * FROM usuarios WHERE (username = '".$user."' or email = '".$user."') and is_active = 1";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    echo "<script>alert('$result_of_login_check->num_rows');</script>";
                    if (password_verify($password,$result_row->password)){
                        echo "<script>alert('$result_row->user_password_hash');</script>";
                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_id'] = $result_row->id;
						$_SESSION['user_name'] = $result_row->username;
                        $_SESSION['user_email'] = $result_row->email;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_unset();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Has sido desconectado.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
