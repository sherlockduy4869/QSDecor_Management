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

    if(isset($_GET['markdoneID']))
    {
        $markdoneID = $_GET['markdoneID'];
        $markdoneOrder = $orderClass->markdone_order($markdoneID);
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
                    <i class="fa-solid fa-bell"></i>
                    <span class="text">ORDER LIST</span>
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
                                <th>TOTAL AMOUNT</th>
                                <th>SHIPPING FEE</th>
                                <th>OTHERS FEE</th>
                                <th>PAYMENT</th>
                                <th>DEPOSIT</th>
                                <th>BALANCE</th>
                                <th>NOTE</th>
                                <th>ORDER DATE</th>
                                <th>CUSTOMIZE</th>
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
                                    <p><?php echo $result['NOTE'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $order_date;?></p>
                                </td>
                                <td class="edit">
                                <a style="color: #41f1b6;" href="orderEdit.php?editID=<?php echo $result['ORDER_ID'];?>">Edit</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['ORDER_ID']; ?>">DELETE</a><br>
                                <a onclick="return confirm('Do you want to markdone ?')" href="?markdoneID=<?php echo $result['ORDER_ID'];?>">Markdone</a>
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