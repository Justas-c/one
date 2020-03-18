<?php
namespace App\Models;
use PDO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UserM extends \App\Core\Model
{
    //Validation errors
    public $val_errors = [];

    public function register($data)
    {
        $this->validate($data);
        if (empty($this->val_errors)) {
            $db = static::getDb();
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $token = new \App\Token();
            $hashed_token = $token->getHash();
            $this->activation_token = $token->getValue();

            $sql = 'INSERT INTO users (name, email, password, activation_hash) VALUES (:name, :email, :password, :activation_hash)';
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':activation_hash', $hashed_token, PDO::PARAM_STR);

            return $stmt->execute();
        } else {
            // Validation failed
            return false;
        }
    }

    public function validate($data)
    {
        // name
        if ($data['name'] == '') {
            $this->val_errors['Name_err'] = 'Name is required';
        }

        // email
        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $this->val_errors['email_err'] = 'Invalid email';
        }
        if (self::findByEmail($data['email']) == true) {
            $this->val_errors['email_err'] = 'This email is already taken';
        }

        // password
        if ($data['password'] != $data['confirmPassword']) {
            $this->val_errors['password_err'] = 'Passwords doesn\'t match';
        }
        if (strlen($data['password']) < 1) {
            $this->val_errors['password_err'] = 'Password needs to be at least 6 chars long';
            //$this->val_errors['password_err'] = empty($this->val_errors['password_err']) ? 'Password needs to be at least 6 chars long' : $this->val_errors['password_err'] .= 'Password needs to be at least 6 chars long';
        }
        if (preg_match('/[a-z]+\d+/' , $data['password']) == 0) {
            $this->val_errors['password_err'] = 'Password needs to start with the letters and contain at least one digit';
        }
    }
    public function adminValidate($data)
    {
        // firstname
        if ($data['adminFirstName'] == '') {
            $this->val_errors['Name_err'] = 'Firstname is required';
        }

        // lastname
        if ($data['adminLastName'] == '') {
            $this->val_errors['Name_err'] = 'Lastname is required';
        }

        // telephone
        // Reiketu rimtesnio reg_exp
        if (!preg_match('/[\d]+/' , trim($data['adminTel']))){
            $this->val_errors['Tel_err'] = 'Incorrect telephone number';
        }

        // password
        if ($data['password'] != $data['confirmPassword']) {
            $this->val_errors['password_err'] = 'Passwords doesn\'t match';
        }
    }

    public static function findByEmail($email, $admin = 0)
    {
        $db = static::getDb();
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        return $stmt->fetch();
        //return $stmt->fetch() !== false;
    }

    public static function authenticate($email, $password)
    {
        $user = self::findByEmail($email);
        if ($user && $user->is_active) {
            if (password_verify($password, $user->password)) {
                return $user;
            } else {
                \App\Flash::addMessage('Incorrect password', \App\FLASH::WARNING);
            }
        } elseif ($user && !$user->is_active){
            \App\Flash::addMessage('Your account has not been verified. Please check your email to verify your account', \App\FLASH::WARNING);
        }
        // failed to authenticate
        //\App\Flash::addMessage('failed to authenticate', \App\FLASH::WARNING);
        return false;
    }

    public static function findUserById($id)
    {
        $db = static::getDb();
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();
        return $stmt->fetch();
    }

    public function rememberLogin()
    {
        $token = new \App\Token();
        $hashed_token = $token->getHash();
        $this->remember_token = $token->getValue();

        $this->expiry_date = time() + 60 * 60 * 24 * 30; // days from now

        $db = static::getDb();
        $sql = 'INSERT INTO remembered_logins (token_hash, user_id, expires_at)
                VALUES (:token_hash, :user_id, :expires_at)';
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $this->user->id, PDO::PARAM_INT);
        $stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $this->expiry_date), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function sendActivationEmail($email)
    {
        $url = URLROOT . 'User/UserC/activateAccount/' . $this->activation_token;

        $text = 'Account activation<br>
                 Thank you for signing up. Please click the following link to activate your account: <br>
                 <a href="' . $url . '">Activate account</a>';
        $html = '<h1>Account activation</h1><p>Thank you for signing up. Please <a href="'. $url .'"> click the following link to activate your account: </p>';

        $mail = new \App\Mail;
        $mail->sendMail($email, 'Account activation', $text, $html);
    }

    // Activate Registration Account
    public static function activateRegAccount($token_value)
    {
        $token = new \App\Token($token_value);
        $hashed_token = $token->getHash();

        $db = static::getDb();
        $sql = 'UPDATE users SET is_active = 1, activation_hash = null WHERE activation_hash = :hashed_token';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':hashed_token', $hashed_token, PDO::PARAM_STR);

        $stmt->execute();
    }

//________________________________Admin section_______________________________//
public static function authenticateAdmin($email, $password)
{
    $db   = static::getDb();
    $sql  = 'SELECT * FROM admins WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_OBJ);



    if ($admin && $admin->is_active) {
        if (password_verify($password, $admin->password)) {
            return $admin;
        } else {
            \App\Flash::addMessage('incorrect password', \App\FLASH::WARNING);
        }
    } else {
        \App\Flash::addMessage('incorrect email or account inactive', \App\FLASH::WARNING);
    }

    // default
    return false;
}


    public function adminRegister($data)
    {
        $this->adminValidate($data);
        if (empty($this->val_errors)) {
            $db = static::getDb();
            $sql = 'INSERT INTO admins (firstname, lastname, email,password, telephone) VALUES (:firstname, :lastname, :email, :password, :telephone)';

            $stmt = $db->prepare($sql);
            $stmt->bindValue(':firstname', $data['adminFirstName'], PDO::PARAM_STR);
            $stmt->bindValue(':lastname', $data['adminLastName'], PDO::PARAM_STR);
            $stmt->bindValue(':telephone', $data['adminTel'], PDO::PARAM_INT);
            $stmt->bindValue(':email', $data['adminFirstName'] . $data['adminLastName'] . '@one.lt', PDO::PARAM_STR);
            $stmt->bindValue(':password', password_hash($data['password'], PASSWORD_DEFAULT));

            return $stmt->execute();
        } else {
            //validation failed
            return false;
        }
    }

    public static function findAdminById($id)
    {
        $db = static::getDb();
        $sql = 'SELECT * FROM admins WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();
        return $stmt->fetch();
    }

}// end of class
