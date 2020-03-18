<?php
namespace App;

class Auth
{

    public static function login($userModel, $remember_me)
    {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $userModel->user->id ?? $userModel->id;

        if ($remember_me) {
            if ($userModel->rememberLogin()) {
                setcookie('remember_me', $userModel->remember_token, $userModel->expiry_date, '/');
            }
        }
    }

    public static function logout()
    {
    //Copied from php manual - session_destroy();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }

            // Finally, destroy the session.
            session_destroy();
            self::deleteLoginCookie();
    }

    public static function rememberRequestedPage()
    {
        $_SESSION['return_to'] = str_replace('/one/', '', $_SERVER['REQUEST_URI']);
    }

    public static function getReturnToPage()
    {
        return $_SESSION['return_to'] ?? '';
    }

    // Get the current logged-in user, from the session or the remember me cookie
    public static function getUser()
    {
        //die('bliat');
        if (isset($_SESSION['user_id'])) {
            return \App\Models\UserM::findUserById($_SESSION['user_id']);
        } elseif(isset($_SESSION['admin_id'])) {
            return \App\Models\UserM::findAdminById($_SESSION['admin_id']);
        } else {
            return static::loginFromRememberMeCookie();
        }
    }

    protected static function loginFromRememberMeCookie()
    {
        $cookie = $_COOKIE['remember_me'] ?? false;
        if ($cookie) {

            $remembered_login = \App\Models\RememberedLogin::findByToken($cookie);
            if ($remembered_login && ! $remembered_login->hasExpired()) {
                $user = $remembered_login->getUser();
                static::login($user, false);
                return $user;
            }
        }
    }

    protected static function deleteLoginCookie()
    {
        $cookie = $_COOKIE['remember_me'] ?? false;
        if ($cookie) {
            $remembered_login = \App\Models\RememberedLogin::findByToken($cookie);
            if($remembered_login) {
                $remembered_login->deleteLoginCookieDb();
            }
        setcookie('remember_me', '', time() - 3600); // set to expire in the past
        }
    }
//--------------------------------Admin---------------------------------------//
    public static function adminLogin($adminModel)
    {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $adminModel->admin->id;
    }

}//end of class
