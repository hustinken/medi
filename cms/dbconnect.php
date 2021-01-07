<?php

/**
 * User: Oyenuga Hussein Kehinde
 * screen class project begins
 * Date: 26-01-2019
 */
class DBConn
{
    var $uname,$pword,$host,$conn,$db,$conn2;

    //constructor
    function __construct(){ $this->connectDB(); }

    //this handles connection to the database
    function connectDB(){

        $this->uname='root';
        $this->pword='';
        $this->host='localhost';
        $this->db='medi';

        $this->conn=mysqli_connect($this->host,$this->uname,$this->pword);
        if($this->conn){
            $this->conn2=mysqli_select_db($this->conn,$this->db);
            //echo "This is connected to the DB";
        }
        else { echo mysqli_error(); echo "Oops! couldnt connect to the database."; }
    }
}


?>