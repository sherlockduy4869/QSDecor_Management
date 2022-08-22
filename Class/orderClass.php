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

        /*--------------------ORDER AREA--------------------*/

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
            $payment = $sell_price + $ship_fee + $others_fee;
            $balance = $payment - $deposit;

            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $order_date = date("Y-m-d");

            $query = "INSERT INTO tbl_order(ORDER_ID,PRODUCT_QUAN_PRICE,SELL_CHANEL,COLLAB_ID,CUSTOMER_NAME,
            CUSTOMER_PHONE,CUSTOMER_ADDRESS,SELL_PRICE,SHIPPING_FEE,OTHERS_FEE,PAYMENT,DEPOSIT,BALANCE,NOTE,ORDER_DATE) 
                  VALUES('$order_id','$product_quan_price','$chanel','$collab_id','$cus_name','$cus_phone',
                  '$cus_address','$sell_price','$ship_fee','$others_fee','$payment','$deposit','$balance','$note','$order_date')";
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
            $query = "SELECT tbl_order.*, tbl_collaborator.COLLAB_NAME 
                    FROM tbl_order INNER JOIN tbl_collaborator
                    ON  tbl_order.COLLAB_ID = tbl_collaborator.COLLAB_ID
                    WHERE STATUS_ORDER = 'PENDING'";
            $result = $this->db->select($query);
            return $result;
        }

        //Edit order information
        public function edit_order($data, $order_id){
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
            
            $payment = $sell_price + $ship_fee + $others_fee;
            $balance = $payment - $deposit;

            $query = "UPDATE tbl_order SET
            PRODUCT_QUAN_PRICE = '$product_quan_price'
            ,SELL_CHANEL = '$chanel'
            ,COLLAB_ID = '$collab_id'
            ,CUSTOMER_NAME = '$cus_name'
            ,CUSTOMER_PHONE = '$cus_phone'
            ,CUSTOMER_ADDRESS = '$cus_address'
            ,SELL_PRICE = '$sell_price'
            ,SHIPPING_FEE = '$ship_fee'
            ,OTHERS_FEE = '$others_fee'
            ,PAYMENT = '$payment'
            ,DEPOSIT = '$deposit'
            ,BALANCE = '$balance'
            ,NOTE = '$note'
            WHERE ORDER_ID ='$order_id'";    

            $result = $this->db->update($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit order succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Edit order failed</span> <br>";
                return $alert;
            }
        }

        //Get order information by id
        public function get_order_by_id($order_id){
            $query = "SELECT tbl_order.*, tbl_collaborator.COLLAB_NAME 
                    FROM tbl_order INNER JOIN tbl_collaborator
                    ON  tbl_order.COLLAB_ID = tbl_collaborator.COLLAB_ID
                    WHERE ORDER_ID = '$order_id'";
            $result = $this->db->select($query);
            return $result;
        }

        //Markdone order
        public function markdone_order($markdoneID){
            $query = "UPDATE tbl_order SET
                    STATUS_ORDER = 'DONE'
                    WHERE ORDER_ID ='$markdoneID'";
            $result = $this->db->update($query);
            header('Location:index.php');
        }

        //Delete apartment selling
        public function delete_order($delID){
            $query = "DELETE FROM tbl_order WHERE ORDER_ID = '$delID'";
            $result = $this->db->delete($query);

            header('Location:index.php');
        }


        /*--------------------SALE AREA--------------------*/

        //Show all sales
        public function show_sales(){
            $query = "SELECT tbl_order.*, tbl_collaborator.COLLAB_NAME 
                    FROM tbl_order INNER JOIN tbl_collaborator
                    ON  tbl_order.COLLAB_ID = tbl_collaborator.COLLAB_ID
                    WHERE STATUS_ORDER = 'DONE'";
            $result = $this->db->select($query);
            return $result;
        }

        //Get total income in specific month
        public function get_income_month($month_choosing, $year_choosing){
            $query = "SELECT SUM(tbl_order.BALANCE) AS TOTAL_INCOME FROM tbl_order WHERE MONTH(ORDER_DATE) = '$month_choosing' AND YEAR(ORDER_DATE) = '$year_choosing' AND STATUS_ORDER = 'DONE'";
            $result = $this->db->select($query);
            return $result;
        }

        //Get total income in specific month by collab id
        public function get_income_month_by_collab_id($collab_id,$month_choosing, $year_choosing){
            $query = "SELECT SUM(tbl_order.BALANCE) AS TOTAL_INCOME FROM tbl_order WHERE COLLAB_ID = '$collab_id' AND MONTH(ORDER_DATE) = '$month_choosing' AND YEAR(ORDER_DATE) = '$year_choosing' AND STATUS_ORDER = 'DONE'";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>