<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/collabClass.php';
?>
<?php
    $collabClass = new collabClass();
    $collabList = $collabClass->show_collab();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delCollab = $collabClass->delete_collab($delID);
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
                                <th>Bank Name</th>
                                <th>Bank Number</th>
                                <th>Customize</th>
                        </thead>
                        <?php
                            if($collabList)
                            {   
                                $ID = 0;
                                while($result = $collabList->fetch_assoc())
                                {
                                    $ID++;
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $ID; ?></td>
                                <td class="active">
                                    <p><?php echo $result['COLLAB_NAME'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['COLLAB_PHONE'];?></p>
                                </td>
                                <td class="active">
                                    <p><?php echo $result['COLLAB_ZALO'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['COLLAB_EMAIL'];?></p>
                                </td>
                                <td class="role">
                                    <p><?php echo $result['COLLAB_BANK_NAME'];?></p>
                                </td>
                                <td class="active">
                                    <p><?php echo $result['COLLAB_BANK_NUMBER'];?></p>
                                </td>
                                <td class="edit">
                                    <a href="collabEdit.php?editID=<?php echo $result['COLLAB_ID'];?>">Edit</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['COLLAB_ID'];?>">Delete</a>
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