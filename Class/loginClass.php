<?php
    include $_SERVER['DOCUMENT_ROOT'].'/Lib/session.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
    Session::checkLogin();
?>

<?php

    class loginClass
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Check login
        public function login_check($user_name, $password){
            $user_name = $this->fm->validation($user_name);
            $password = $this->fm->validation($password);

            $user_name = mysqli_real_escape_string($this->db->link, $user_name);
            $password = mysqli_real_escape_string($this->db->link, $password);


            $query = "SELECT * FROM tbl_account WHERE USERNAME = '$user_name' AND PASSWORD = '$password' LIMIT 1";
            $result = $this->db->select($query);

            if($result != false)
            {
                $value = $result->fetch_assoc();
                Session::set('adminLogin',true);
                Session::set('adminID',$value['ACCOUNT_ID']);
                Session::set('adminUser',$value['USERNAME']);
                Session::set('adminName',$value['NAME']);
                header('Location:index.php');
            } 
            else
            {
                $alert = "Wrong User_Name or Password";
                return $alert;
            }
            
        }
    }
?>