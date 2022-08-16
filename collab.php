<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
?>
<?php

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
                    <span class="text">COLLABORATORS</span>
                </div>
            </div>

            <div class="activity">
                <div class="board">
                    <table id="tbl_cart" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Zalo</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Working Date</th>
                                <th>Bank Name</th>
                                <th>Bank Number</th>
                                <th>Customize</th>
                        </thead>
                        <?php
                            // if($orderList)
                            // {   
                            //     $ID = 0;
                            //     while($result = $orderList->fetch_assoc())
                            //     {
                            //         $ID++;
                            //         $order_date = date("d-m-Y", strtotime($result['ORDER_DATE']));
                        ?>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="active">
                                    <p>Name</p>
                                </td>
                                <td class="role">
                                    <p>Phone</p>
                                </td>
                                <td class="active">
                                    <p>Zalo</p>
                                </td>
                                <td class="role">
                                    <p>Email</p>
                                </td>
                                <td class="role">
                                    <p>Address</p>
                                </td>
                                <td class="role">
                                    <p>Working Date</p>
                                </td>
                                <td class="role">
                                    <p>Bank Name</p>
                                </td>
                                <td class="active">
                                    <p>Bank Number</p>
                                </td>
                                <td class="edit">
                                    <a href="#">Edit</a>|<a href="#">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            //     }
                            // }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>