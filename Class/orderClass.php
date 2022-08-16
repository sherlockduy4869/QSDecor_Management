<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class orderClass
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert new order
        public function insert_order($data){
            $product_quan_price = mysqli_real_escape_string($this->db->link, $data['product_quan_price']);
            $chanel = mysqli_real_escape_string($this->db->link, $data['chanel']);
            $collab_id = mysqli_real_escape_string($this->db->link, $data['collab']);
            $sell_price = mysqli_real_escape_string($this->db->link, $data['sell_price']);
            $cus_name = mysqli_real_escape_string($this->db->link, $data['cus_name']);
            $ship_fee = mysqli_real_escape_string($this->db->link, $data['shipping_fee']);
            $cus_phone = mysqli_real_escape_string($this->db->link, $data['cus_phone']);
            $deposit = mysqli_real_escape_string($this->db->link, $data['deposit']);
            $cus_address = mysqli_real_escape_string($this->db->link, $data['cus_address']);
            $others_fee = mysqli_real_escape_string($this->db->link, $data['others_fee']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);
            
            $sell_price =  str_replace(",","",$sell_price);
            $ship_fee = str_replace(",","",$ship_fee);
            $deposit =  str_replace(",","",$deposit);
            $others_fee = str_replace(",","",$others_fee);
            
            $bytes = random_bytes(6);
            $order_id = 'OD.'.bin2hex($bytes);
            $payment = $sell_price + $ship_fee - $deposit + $others_fee;

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $order_date = date("Y-m-d");

            $query = "INSERT INTO tbl_order(ORDER_ID,PRODUCT_QUAN_PRICE,SELL_CHANEL,COLLAB_ID,CUSTOMER_NAME,
            CUSTOMER_PHONE,CUSTOMER_ADDRESS,SELL_PRICE,SHIPPING_FEE,OTHERS_FEE,DEPOSIT,PAYMENT,NOTE,ORDER_DATE) 
                  VALUES('$order_id','$product_quan_price','$chanel','$collab_id','$cus_name','$cus_phone',
                  '$cus_address','$sell_price','$ship_fee','$others_fee','$deposit','$payment','$note','$order_date')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add order succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add order failed</span> <br>";
                return $alert;
            }
        }

        //Show all order
        public function show_order(){
            $query = "SELECT * FROM tbl_order";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete apartment selling
        public function delete_order($delID){
            $query = "DELETE FROM tbl_order WHERE ORDER_ID = '$delID'";
            $result = $this->db->delete($query);

            header('Location:index.php');
        }
    }
?>