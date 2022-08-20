<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class userClass
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert new user
        public function insert_new_user($data){
            $full_name = mysqli_real_escape_string($this->db->link, $data['full_name']);
            $user_name = mysqli_real_escape_string($this->db->link, $data['user_name']);
            $password = md5(mysqli_real_escape_string($this->db->link, $data['password']));
            $level = mysqli_real_escape_string($this->db->link, $data['level']);

            $query = "INSERT INTO tbl_account(NAME,USERNAME,PASSWORD,LEVEL) 
                  VALUES('$full_name','$user_name','$password','$level')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add new user succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add new user failed</span> <br>";
                return $alert;
            }
        }

        //Show all user
        public function show_all_user(){
            $query = "SELECT * FROM tbl_account";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete user
        public function delete_user($delID){
            $query = "DELETE FROM tbl_account WHERE ACCOUNT_ID = '$delID'";
            $result = $this->db->delete($query);

            header('Location:user.php');
        }
        
    }
?>