<?php

namespace Common\Authentication;
use PDO;

class SQLiteRegister
{
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
    
    
    public function registerNewUser()
    {
        $data=$this->conn->query('SELECT username FROM Users WHERE userName= '.$this->conn->quote($this->username));
        
        $result=$data->fetchAll();
        
        if(count($result)!==0)
        {
            //false
            return 0;
        }
        $this->conn->query('INSERT INTO Test (username, password) VALUES ('
                .$this->conn->quote($this->username).','
                    .$this->conn->quote($this->password).')');
        
        $data=$this->conn->query('SELECT username FROM Test WHERE username= '.$this->conn->quote($this->username));

        $result=$data->fetchAll();
        
        if (count($result)!==1)
        {
            
            return 0;
        }
        return 1;
        
    }

}