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
            $partner_id = 'PN.'.bin2hex($bytes);

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
        public function edit_partner($data,$partnerID){
            $partner_name = mysqli_real_escape_string($this->db->link, $data['partner_name']);
            $deputy = mysqli_real_escape_string($this->db->link, $data['deputy']);
            $partner_phone = mysqli_real_escape_string($this->db->link, $data['partner_phone']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $partner_email = mysqli_real_escape_string($this->db->link, $data['partner_email']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);

            $query = "UPDATE tbl_partner SET
                    PARTNER_NAME = '$partner_name'
                    ,DEPUTY = '$deputy'
                    ,PHONE = '$partner_phone'
                    ,EMAIL = '$address'
                    ,ADDRESS = '$partner_email'
                    ,NOTE = '$note'
                    WHERE PARTNER_ID ='$partnerID'";
            $result = $this->db->update($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit partner infor succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Edit partner inforfailed</span> <br>";
                return $alert;
            }
        }

        //Show all partner
        public function show_partner(){
            $query = "SELECT * FROM tbl_partner";
            $result = $this->db->select($query);
            return $result;
        }

        //Get partner infor by id
        public function get_partner_info_by_id($collab_id){
            $query = "SELECT * FROM tbl_partner WHERE PARTNER_ID = '$collab_id'";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete partner
        public function delete_partner($delID){
            $query = "DELETE FROM tbl_partner WHERE PARTNER_ID = '$delID'";
            $result = $this->db->delete($query);

            header('Location:partner.php');
        }
    }
?>