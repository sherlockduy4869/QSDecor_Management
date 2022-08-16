<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/orderClass.php';
?>
<?php
    $orderClass = new orderClass();
    $orderList = $orderClass->show_order();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delOrder = $orderClass->delete_order($delID);
    }  
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
                    <i class="uil uil-tachometer-fast"></i>
                    <span class="text">ORDER</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total</span>
                        <span class="number">10000</span>
                    </div>

                    <div class="box box2">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total</span>
                        <span class="number">10000</span>
                    </div>

                    <div class="box box3">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total</span>
                        <span class="number">10000</span>
                    </div>

                    <div class="box box3">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total</span>
                        <span class="number">10000</span>
                    </div>
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
                                <th>SELL PRICE</th>
                                <th>SHIPPING FEE</th>
                                <th>OTHERS FEE</th>
                                <th>DEPOSIT</th>
                                <th>PAYMENT</th>
                                <th>NOTE</th>
                                <th>ORDER DATE</th>
                                <th>MARKDONE</th>
                            </tr>
                        </thead>
                        <?php
                            if($orderList)
                            {   
                                $ID = 0;
                                while($result = $orderList->fetch_assoc())
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
                                    <p><?php echo $result['COLLAB_ID'];?>-<?php echo $result['SELL_CHANEL'];?></p>
                                </td>
                                <td class="people">
                                    <div class="people-de">
                                        <h6><?php echo $result['CUSTOMER_NAME'];?></h6>
                                        <p><?php echo $result['CUSTOMER_PHONE'];?> - <?php echo $result['CUSTOMER_ADDRESS'];?></p>
                                    </div>
                                </td>
                                <td class="active">
                                    <p><?php echo number_format($result['SELL_PRICE']);?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo number_format($result['SHIPPING_FEE']);?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo number_format($result['OTHERS_FEE']);?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo number_format($result['DEPOSIT']);?></p>
                                </td>
                                <td class="active">
                                    <p><?php echo number_format($result['PAYMENT']);?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['NOTE'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $order_date;?></p>
                                </td>
                                <td class="edit">
                                    <a href="#">EDIT</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['ORDER_ID']; ?>">DELETE</a>
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