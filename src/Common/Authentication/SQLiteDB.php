<?php

namespace Common\Authentication;

use PDO;
use PDOException;

        username= $this->userDetails['username'];
        twitter= $this->userDetails['twitter'];
        email= $this->userDetails['email'];
        firstName= $this->userDetails['fname'];
        lastName= $this->userDetails['lname'];
        regDate = $this->userDetails['regdate'];

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

    public function register($username = '', $password = '', $twitter='', $email, $firstName, $lastName)
    {

        $db = new PDO("sqlite:../Data/Project3DB");
         

        if ($username !== '') {
            $this->username = $username;
        }
        if ($password !== '') {
            $this->password = $password;
        }
        if ($twitter !== '') {
            $this->twitter = $twitter;
        }
        if ($firstName !== '') {
            $this->firstName = $firstName;
        }
        if ($lastName !== '') {
            $this->lastName = $lastName;
        }
        if ($email !== '') {
            $this->email = $email;
        }
        //Check if user already exists
        foreach($this->users as $u){
            if($u['username']===$username){
                return false;
            }
        }
        $regDate = time();
        $sql = "INSERT INTO Users (username, password, twitter, fname, lname, regdate, email) VALUES ('".$this->username."', '".$this->password."', '".$this->twitter."', '".$this->firstName."', '".$this->lastName."', '$regDate', '".$this->email."');";
        $result = $this->db->insert($sql);
        return $result;
    }
}