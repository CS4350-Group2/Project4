<?php


namespace Common\Authentication;



class Registration
{

    protected $username;
    protected $password;
    protected $db;
    protected $users;
    protected $twitter;
    protected $firstName;
    protected $lastName;
    protected $email;

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

    public function addUser($username = '', $password = '', $twitter='', $email, $firstName, $lastName)
    {

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
   
        foreach($this->users as $u){
            if($u['username']===$username){
                return false;

            }
        }
        $regDate = time();

        $sql = "INSERT INTO users (username, password, twitter, fname, lname, regdate, email) VALUES ('".$this->username."', '".$this->password."', '".$this->twitter."', '".$this->firstName."', '".$this->lastName."', '$regDate', '".$this->email."');";

        $result = $this->db->insert($sql);

        return $result;


    }
}