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

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $orderAdd = $orderClass->insert_order($_POST);
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

                <form action="orderAdd.php" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">[Product/Quantity/Price]</span>
                            <input type="text"required name="product_quan_price">
                        </div>
                        <div class="input-box">
                            <span class="details">Sell Chanel</span>
                            <input list="chanel_list" name="chanel" required>
                            <datalist id="chanel_list">
                                <option value="Facebook">Facebook</option>
                                <option value="Cho Tot">Cho Tot</option>
                                <option value="Zalo">Zalo</option>
                                <option value="Shoppee">Shoppee</option>
                                <option value="Gioi Thieu">Gioi Thieu</option>
                                <option value="Others">Others</option>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Collaborator</span>
                            <input list="collab_list" name="collab" required>
                            <datalist id="collab_list">
                                <?php
                                    if($collabList)
                                    {   
                                        $ID = 0;
                                        while($result = $collabList->fetch_assoc())
                                        {
                                    
                                ?>
                                    <option value="<?php echo $result['COLLAB_ID']; ?>"><?php echo $result['COLLAB_NAME']; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Total Sell Price</span>
                            <input class="sell_price" name="sell_price" type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input type="text" name="cus_name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Shipping Fee</span>
                            <input class="shipping_fee" name="shipping_fee" type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input type="text" name="cus_phone" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Deposit</span>
                            <input class="deposit" name="deposit" type="text"required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Address</span>
                            <input type="text" name="cus_address" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Others Fee</span>
                            <input class="other_fee" name="others_fee" type="text"required>
                        </div>   
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"></textarea>
                    </div>
                    <?php 
                    if(isset($orderAdd))
                    {
                        echo $orderAdd;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="ADDING">
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