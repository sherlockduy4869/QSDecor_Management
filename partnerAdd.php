<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/partnerClass.php';
?>

<?php
    $partnerClass = new partnerClass();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $partnerAdd = $partnerClass->insert_partner($_POST);
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
                <div class="title">Add New Partner</div>

                <form action="partnerAdd.php" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Partner Name</span>
                            <input type="text"required name="partner_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Deputy</span>
                            <input type="text"required name="deputy">
                        </div>
                        <div class="input-box">
                            <span class="details">Partner Phone</span>
                            <input type="text"required name="partner_phone">
                        </div>
                        <div class="input-box">
                            <span class="details">Address</span>
                            <input type="text"required name="address">
                        </div>
                        <div class="input-box">
                            <span class="details">Partner Email</span>
                            <input type="email" name="partner_email">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Note</span>
                            <input type="text" name="note">
                        </div>
                    </div>
                    <?php 
                        if(isset($partnerAdd))
                        {
                            echo $partnerAdd;
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