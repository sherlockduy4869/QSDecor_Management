<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/partnerClass.php';
?>
<?php
    $partnerClass = new partnerClass();
    $partnerList = $partnerClass->show_partner();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delPartnet = $partnerClass->delete_partner($delID);
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
                    <span class="text">PARTNERS</span>
                </div>
            </div>

            <div class="activity">
                <div class="board">
                    <table id="tbl_cart" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>NAME</th>
                                <th>DEPUTY</th>
                                <th>PHONE</th>
                                <th>EMAIL</th>
                                <th>ADDRESS</th>
                                <th>NOTE</th>
                                <th>Customize</th>
                        </thead>
                        <?php
                            if($partnerList)
                            {   
                                $ID = 0;
                                while($result = $partnerList->fetch_assoc())
                                {
                                    $ID++;
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $ID; ?></td>
                                <td class="active">
                                    <p><?php echo $result['PARTNER_NAME'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['DEPUTY'];?></p>
                                </td>
                                <td class="active">
                                    <p><?php echo $result['PHONE'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['EMAIL'];?></p>
                                </td>
                                <td class="active">
                                    <p><?php echo $result['ADDRESS'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['NOTE'];?></p>
                                </td>
                                <td class="edit">
                                    <a href="partnerEdit.php?editID=<?php echo $result['PARTNER_ID'];?>">Edit</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['PARTNER_ID']; ?>">Delete</a>
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