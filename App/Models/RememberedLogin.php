<?php
namespace App\Models;

class RememberedLogin extends \App\Core\Model
{

    public static function findByToken($token)
    {
        $token = new \App\Token($token);
        $token_hash = $token->getHash();

        $db = static::getDb();
        $sql = 'SELECT * FROM remembered_logins WHERE token_hash = :token_hash';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':token_hash', $token_hash, \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUser()
    {
        return UserM::findUserById($this->user_id);
    }

    public function hasExpired()
    {
        return strtotime($this->expires_at) < time();
    }

    public function deleteLoginCookieDb()
    {
        $db = static::getDb();
        $sql = 'DELETE FROM remembered_logins WHERE token_hash = :token_hash';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':token_hash', $this->token_hash, \PDO::PARAM_STR);

        $stmt->execute();
    }

}//end of class
