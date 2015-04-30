<?php

namespace Common\Authentication;

use PDO;
use PDOException;


class SQLiteDB implements IAuthentication {
    //private $dbh;

    public function __construct()
    {
        try
        {
            $this->conn = new PDO('sqlite:../../Data/Project3DB');

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

    /*public function getUsers() {
        return $this->users;
    }
    public function insert($sql){
        return $this->sqliteDb->exec($sql);
    }
    public function query($sql){
        $ret = $this->sqliteDb->query($sql);
        $result = $ret->fetchArray(SQLITE3_ASSOC);
        return $result;
    }*/

    public function authenticate($username, $password)
    {

        $stmt = $this->conn->query('SELECT username FROM Users WHERE username = '.$this->conn->quote($username).
                    ' AND password = '.$this->conn->quote($password));
            //$stmt->execute();

            $stmtReturn = $stmt->fetchAll();
            echo $stmtReturn;
            if(count($stmtReturn) > 0)
            {
                var_dump($stmtReturn);
                return true;
            }


        return false;
    }

    public function getUserProfile($username)
    {
        $data = $this->conn->query('SELECT username, firstname, lastname, email, regdate, twitter
                                    FROM Users
                                    WHERE username ='.$this->conn->quote($username));

        foreach($data->fetchAll() as $i)
        {
            $profile = array('username' => $i[0],
                             'firstname'=> $i[1],
                             'lastname' => $i[2],
                             'email' => $i[3],
                             'regdate' => $i[4],
                             'twitter' => $i[5]);
        }

        return $profile;
    }

    
}