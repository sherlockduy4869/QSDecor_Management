<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class partnerClass
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert new partner
        public function insert_partner($data){
            $partner_name = mysqli_real_escape_string($this->db->link, $data['partner_name']);
            $deputy = mysqli_real_escape_string($this->db->link, $data['deputy']);
            $partner_phone = mysqli_real_escape_string($this->db->link, $data['partner_phone']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $partner_email = mysqli_real_escape_string($this->db->link, $data['partner_email']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);
            
            $bytes = random_bytes(6);
            $partner_id = 'COL.'.bin2hex($bytes);

            $query = "INSERT INTO tbl_partner(PARTNER_ID,PARTNER_NAME,DEPUTY,PHONE,EMAIL,ADDRESS,NOTE) 
                  VALUES('$partner_id','$partner_name','$deputy','$partner_phone','$partner_email','$address','$note')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add new partner succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add new partner failed</span> <br>";
                return $alert;
            }
        }

        //Edit new collab
        public function edit_collab($data,$collab_id){
            $collab_name = mysqli_real_escape_string($this->db->link, $data['collab_name']);
            $collab_phone = mysqli_real_escape_string($this->db->link, $data['collab_phone']);
            $collab_zalo = mysqli_real_escape_string($this->db->link, $data['collab_zalo']);
            $collab_email = mysqli_real_escape_string($this->db->link, $data['collab_email']);
            $bank_name = mysqli_real_escape_string($this->db->link, $data['bank_name']);
            $bank_number = mysqli_real_escape_string($this->db->link, $data['bank_number']);

            $query = "UPDATE tbl_collaborator SET
                    COLLAB_NAME = '$collab_name'
                    ,COLLAB_PHONE = '$collab_phone'
                    ,COLLAB_ZALO = '$collab_zalo'
                    ,COLLAB_EMAIL = '$collab_email'
                    ,COLLAB_BANK_NAME = '$bank_name'
                    ,COLLAB_BANK_NUMBER = '$bank_number'
                    WHERE COLLAB_ID ='$collab_id'";
            $result = $this->db->update($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit collaborator infor succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Edit collaborator inforfailed</span> <br>";
                return $alert;
            }
        }

        //Show all partner
        public function show_partner(){
            $query = "SELECT * FROM tbl_partner";
            $result = $this->db->select($query);
            return $result;
        }

        //Get collab infor by id
        public function get_collab_info_by_id($collab_id){
            $query = "SELECT * FROM tbl_collaborator WHERE COLLAB_ID = '$collab_id'";
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