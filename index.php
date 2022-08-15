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
                                <th>STT</th>
                                <th>ORDER INFO</th>
                                <th>COLLAB INFO</th>
                                <th>CUSTOMER INFO</th>
                                <th>SELL PRICE</th>
                                <th>SHIPPING FEE</th>
                                <th>OTHERS FEE</th>
                                <th>DEPOSIT</th>
                                <th>PAYMENT</th>
                                <th>NOTE</th>
                                <th>ORDER DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="people">
                                    <div class="people-de">
                                        <h6>John Doe</h6>
                                        <p>john@gmail.com</p>
                                    </div>
                                </td>
                                <td class="people-des">
                                    <h6>Software Developer</h6>
                                    <p>Web dev</p>
                                </td>
                                <td class="active">
                                    <p>Active</p>
                                </td>
                                <td class="role">
                                    <p>Owner</p>
                                </td>
                                <td class="edit">
                                    <a href="#">Edit</a>
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