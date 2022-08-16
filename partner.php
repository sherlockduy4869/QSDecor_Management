<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/partnerClass.php';
?>
<?php
    // $collabClass = new collabClass();
    // $collabList = $collabClass->show_collab();

    // if(isset($_GET['delID']))
    // {
    //     $delID = $_GET['delID'];
    //     $delCollab = $collabClass->delete_collab($delID);
    // }  
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
                            // if($collabList)
                            // {   
                                // $ID = 0;
                                // while($result = $collabList->fetch_assoc())
                                // {
                                //     $ID++;
                        ?>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="role">
                                    <p>Partner Name</p>
                                </td>
                                <td class="active">
                                    <p>DEPUTY</p>
                                </td>
                                <td class="active">
                                    <p>PHONE</p>
                                </td>
                                <td class="role">
                                    <p>EMAIL</p>
                                </td>
                                <td class="active">
                                    <p>ADDRESS</p>
                                </td>
                                <td class="role">
                                    <p>NOTE</p>
                                </td>
                                <td class="edit">
                                    <a href="#">Edit</a>
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