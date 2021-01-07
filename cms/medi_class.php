<?php

//include db
include_once('dbconnect.php');

class medi_class{

    var $dba,$check,$update,$fetch;

    function __construct(){
        $this->dba=new DBConn();
    }

    function _check_cred_exist($uname, $pword){
        $this->check = mysqli_query($this->dba->conn,"SELECT * FROM med_users_tab WHERE uname='$uname' AND pword='$pword'");
        $this->check=(mysqli_num_rows($this->check) > 0)? 0 : 1;   //0 - exists, 1 - not exists
        return  $this->check;
    }

    function _update_content($section_id, $body){
        $this->update = mysqli_query($this->dba->conn, "UPDATE med_content_tab SET section_content='$body' WHERE section_id='$section_id'");
    }

    function _fetch_content($section_id){
        $this->fetch = mysqli_fetch_array(mysqli_query($this->dba->conn, "SELECT section_content FROM med_content_tab WHERE section_id='$section_id'"));
        return $this->fetch[0];
    }

}
?>