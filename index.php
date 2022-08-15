<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
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
                    <span class="text">Dashboard</span>
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
                                <th>ID</th>
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
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td class="people">
                                    <div class="people-de">
                                        <h6>Product Name</h6>
                                        <p>Sell Chanel</p>
                                    </div>
                                </td>
                                <td class="role">
                                    <p>Collaborator Name</p>
                                </td>
                                <td class="people">
                                    <div class="people-de">
                                        <h6>Cus Name</h6>
                                        <p>Cus Phone - Cus Address</p>
                                    </div>
                                </td>
                                <td class="active">
                                    <p>Sell Price</p>
                                </td>
                                <td class="role">
                                    <p>Ship Fee</p>
                                </td>
                                <td class="role">
                                    <p>Other Fee</p>
                                </td>
                                <td class="role">
                                    <p>Deposit</p>
                                </td>
                                <td class="active">
                                    <p>Payment</p>
                                </td>
                                <td class="role">
                                    <p>Note</p>
                                </td>
                                <td class="active">
                                    <p>Order Date</p>
                                </td>
                                <td class="edit">
                                    <a href="#">MARKDONE</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>