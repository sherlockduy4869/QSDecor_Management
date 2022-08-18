<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/orderClass.php';
?>
<?php
    $orderClass = new orderClass();
    $salesList = $orderClass->show_sales();

?>
    <!--DASHBOARD AREA-->
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <span>WELCOME TO <span style="color: red;">QSDECOR</span> MANAGEMENT</span>
            <img src="/Resource/img/profile-1.jpg" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa-solid fa-chart-bar"></i>
                    <span class="text">SALES LIST</span>
                </div>
                <div class="date">
                    <input type="date">
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="fa-solid fa-money-bill"></i>
                        <span class="text">Total</span>
                        <span class="number num">10</span>
                    </div>
                </div>
            <div class="activity">
                <div class="board">
                    <table id="tbl_cart" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ORDER INFO</th>
                                <th>IN CHARGE</th>
                                <th>CUSTOMER INFO</th>
                                <th>TOTAL PRICE</th>
                                <th>SHIPPING FEE</th>
                                <th>OTHERS FEE</th>
                                <th>PAYMENT</th>
                                <th>DEPOSIT</th>
                                <th>BALANCE</th>
                                <th>ORDER DATE</th>
                            </tr>
                        </thead>
                        <?php
                            if($salesList)
                            {   
                                $ID = 0;
                                while($result = $salesList->fetch_assoc())
                                {
                                    $ID++;
                                    $order_date = date("d-m-Y", strtotime($result['ORDER_DATE']));
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $ID; ?></td>
                                <td class="role">
                                    <p><?php echo $result['PRODUCT_QUAN_PRICE'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['COLLAB_NAME'];?>-<?php echo $result['SELL_CHANEL'];?></p>
                                </td>
                                <td class="people">
                                    <div class="people-de">
                                        <p><?php echo $result['CUSTOMER_NAME'];?></p>
                                        <p><?php echo $result['CUSTOMER_PHONE'];?> - <?php echo $result['CUSTOMER_ADDRESS'];?></p>
                                    </div>
                                </td>
                                <td class="active">
                                    <p><?php echo number_format($result['SELL_PRICE']);?><sup>đ</sup></p>
                                </td>
                                <td class="role">
                                    <p><?php echo number_format($result['SHIPPING_FEE']);?><sup>đ</sup></p>
                                </td>
                                <td class="role">
                                    <p><?php echo number_format($result['OTHERS_FEE']);?><sup>đ</sup></p>
                                </td>
                                <td class="active">
                                    <p><?php echo number_format($result['PAYMENT']);?><sup>đ</sup></p>
                                </td>
                                <td class="role">
                                    <p><?php echo number_format($result['DEPOSIT']);?><sup>đ</sup></p>
                                </td>
                                <td class="active">
                                    <p><?php echo number_format($result['BALANCE']);?><sup>đ</sup></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $order_date;?></p>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                                }
                            }
                        ?>
                    </table>
                </div>
                
            </div>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>