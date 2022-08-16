<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class collabClass
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert new collab
        public function insert_collab($data){
            $collab_name = mysqli_real_escape_string($this->db->link, $data['collab_name']);
            $collab_phone = mysqli_real_escape_string($this->db->link, $data['collab_phone']);
            $collab_zalo = mysqli_real_escape_string($this->db->link, $data['collab_zalo']);
            $collab_email = mysqli_real_escape_string($this->db->link, $data['collab_email']);
            $bank_name = mysqli_real_escape_string($this->db->link, $data['bank_name']);
            $bank_number = mysqli_real_escape_string($this->db->link, $data['bank_number']);
            
            $bytes = random_bytes(6);
            $collab_id = 'COL.'.bin2hex($bytes);

            $query = "INSERT INTO tbl_collaborator(COLLAB_ID,COLLAB_NAME,COLLAB_PHONE,COLLAB_ZALO,COLLAB_EMAIL,COLLAB_BANK_NAME,COLLAB_BANK_NUMBER) 
                  VALUES('$collab_id','$collab_name','$collab_phone','$collab_zalo','$collab_email','$bank_name','$bank_number')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add new collaborator succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add new collaborator failed</span> <br>";
                return $alert;
            }
        }

        //Show all collab
        public function show_collab(){
            $query = "SELECT * FROM tbl_collaborator";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete collab
        public function delete_collab($delID){
            $query = "DELETE FROM tbl_collaborator WHERE COLLAB_ID = '$delID'";
            $result = $this->db->delete($query);

            header('Location:collab.php');
        }
    }
?>