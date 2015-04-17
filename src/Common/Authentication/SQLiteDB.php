<?php

namespace Common\Authentication;

use PDO;
use PDOException;


class SQLiteDB implements IAuthentication {
    private $dbh;

    public function __construct()
    {
        try
        {
            $this->dbh = new PDO('sqlite:../Data/Project3DB');

            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
            echo 'ERROR: ' .$e->getMessage();
        }
    }

    /**
     * Function authenticate
     *
     * @param string $username
     * @param string $password
     * @return mixed
     *
     * @access public
     */
    public function authenticate($username, $password)
    {

            $stmt = $this->dbh->query('SELECT username FROM Users WHERE username = '.$this->dbh->quote($username).
                    ' AND password = '.$this->dbh->quote($password));
            //$stmt->execute();

            $stmtReturn = $stmt->fetchAll();
            echo $stmtReturn;
            if(count($stmtReturn) < 0)
            {
                var_dump($stmtReturn);
                return true;
            }


        return false;
    }

    public function register($user, $pass)
    {
        $this->responsecode = 401;
        $query ="insert into users(username,password)values(".$user.",".$pass.")";
    }
}