<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/userClass.php';
?>
<?php
    $userClass = new userClass();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delUser = $userClass->delete_user($delID);
    }

    $user_list = $userClass->show_all_user();
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
                    <i class="fas fa-user-check"></i>
                    <span class="text">USER INFORMATION</span>
                </div>
            </div>

            <div class="activity">
                <div class="board">
                    <table id="tbl_cart" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Customize</th>
                        </thead>
                        <?php
                            if($user_list)
                            {   
                                $ID = 0;
                                while($result = $user_list->fetch_assoc())
                                {
                                    $ID++;
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $ID; ?></td>
                                <td class="active">
                                    <p><?php echo $result['NAME'];?></p>
                                </td>
                                <td class="role">
                                    <p>
                                    <?php
                                        if($result['LEVEL'] == 0){
                                            echo "Admin";
                                        }
                                        else{
                                            echo "Employee";
                                        }
                                    ?>
                                    </p>
                                </td>
                                <td class="edit">
                                    <a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['ACCOUNT_ID'];?>">Delete</a>
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