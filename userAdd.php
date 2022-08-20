<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/userClass.php';
?>

<?php
   $userClass = new userClass();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $userAdd = $userClass->insert_new_user($_POST);
    }
?>

<!--DASHBOARD AREA-->
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <span>WELCOME TO <span style="color: red;">QSDECOR</span> MANAGEMENT</span>
            <img src="/Resource/img/profile-1.jpg" alt="">
        </div>

        <div class="boddyy">
            <div class="container">
                <div class="title">Add New User</div>

                <form action="userAdd.php" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text"required name="full_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Level</span>
                            <select name="level" class="select2_tag">
                                <option value="0">Admin</option>
                                <option value="1">Employee</option>
                            </select>
                        </div> 
                        <div class="input-box">
                            <span class="details">User Name</span>
                            <input type="text"required name="user_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password"required name="password">
                        </div>
                    </div>
                    <?php 
                        if(isset($userAdd))
                        {
                            echo $userAdd;
                        }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="ADDING">
                    </div>
                </form>
                
            </div>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>