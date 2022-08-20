<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/orderClass.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/collabClass.php';
?>

<?php
    $orderClass = new orderClass();
    $collabClass = new collabClass();

    $collabList = $collabClass->show_collab();

    if(isset($_GET['editID']))
    {
        $order_id = $_GET['editID'];
        $order_by_id = $orderClass->get_order_by_id($order_id)->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $orderEdit = $orderClass->edit_order($_POST, $order_id);
    }
?>

<!--DASHBOARD AREA-->
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <span>WELCOME TO <span style="color: red;">QSDECOR</span> MANAGEMENT</span>
            <img src="/Resource/img/profile-1.jpg" alt="">
        </div>

        <div class="boddyy">
            <div class="container">
                <div class="title">Add New Order</div>

                <form action="" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">[Product/Quantity/Price]</span>
                            <input value="<?php echo $order_by_id['PRODUCT_QUAN_PRICE']; ?>" type="text"required name="product_quan_price">
                        </div>
                        <div class="input-box">
                            <span class="details">Sales Chanel</span>
                            <select name="chanel" id="chanel_list">
                                <option <?php if($order_by_id['SELL_CHANEL'] == "Facebook") {echo "SELECTED";} ?> value="Facebook">Facebook</option>
                                <option <?php if($order_by_id['SELL_CHANEL'] == "Cho Tot") {echo "SELECTED";} ?> value="Cho Tot">Cho Tot</option>
                                <option <?php if($order_by_id['SELL_CHANEL'] == "Zalo") {echo "SELECTED";} ?> value="Zalo">Zalo</option>
                                <option <?php if($order_by_id['SELL_CHANEL'] == "Shoppee") {echo "SELECTED";} ?> value="Shoppee">Shoppee</option>
                                <option <?php if($order_by_id['SELL_CHANEL'] == "Gioi Thieu") {echo "SELECTED";} ?> value="Gioi Thieu">Gioi Thieu</option>
                                <option <?php if($order_by_id['SELL_CHANEL'] == "Others") {echo "SELECTED";} ?> value="Others">Others</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Partner</span>
                            <select name="collab" id="collab_list">
                                <?php
                                    if($collabList)
                                    {   
                                        $ID = 0;
                                        while($result = $collabList->fetch_assoc())
                                        {
                                    
                                ?>
                                    <option <?php if($order_by_id['COLLAB_ID'] == $result['COLLAB_ID']) {echo "SELECTED";} ?> value="<?php echo $result['COLLAB_ID']; ?>"><?php echo $result['COLLAB_NAME']; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Total Amount</span>
                            <input value="<?php echo $order_by_id['SELL_PRICE']; ?>" class="sell_price" name="sell_price" type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input value="<?php echo $order_by_id['CUSTOMER_NAME']; ?>" type="text" name="cus_name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Shipping Fee</span>
                            <input value="<?php echo $order_by_id['SHIPPING_FEE']; ?>" class="shipping_fee" name="shipping_fee" type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input value="<?php echo $order_by_id['CUSTOMER_PHONE']; ?>" type="text" name="cus_phone" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Others Fee</span>
                            <input value="<?php echo $order_by_id['OTHERS_FEE']; ?>" class="other_fee" name="others_fee" type="text"required>
                        </div>  
                        <div class="input-box">
                            <span class="details">Customer Address</span>
                            <input value="<?php echo $order_by_id['CUSTOMER_ADDRESS']; ?>" type="text" name="cus_address" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Deposit</span>
                            <input value="<?php echo $order_by_id['DEPOSIT']; ?>" class="deposit" name="deposit" type="text"required>
                        </div>
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"><?php echo $order_by_id['NOTE']; ?></textarea>
                    </div>
                    <?php 
                    if(isset($orderEdit))
                    {
                        echo $orderEdit;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="EDITING">
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="index.php">BACK TO ORDER LIST</a></button>
                    </div>
                </form>
                
            </div>
        </div>
    </section>

<script>
    new Cleave('.sell_price', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });

    new Cleave('.shipping_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });

    new Cleave('.deposit', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });

    new Cleave('.other_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
</script>

<?php 
    include_once "Include/footer.php";
?>