<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/partnerClass.php';
?>

<?php
    $partnerClass = new partnerClass();

    if(isset($_GET['editID']))
    {
        $partnerID = $_GET['editID'];
        $partnerInfo = $partnerClass->get_partner_info_by_id($partnerID)->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $partnerEdit = $partnerClass->edit_partner($_POST,$partnerID);
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
                <div class="title">Edit Partner Information</div>

                <form action="" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Partner Name</span>
                            <input value="<?php echo $partnerInfo['PARTNER_NAME'] ?>" type="text"required name="partner_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Deputy</span>
                            <input value="<?php echo $partnerInfo['DEPUTY'] ?>" type="text"required name="deputy">
                        </div>
                        <div class="input-box">
                            <span class="details">Partner Phone</span>
                            <input value="<?php echo $partnerInfo['PHONE'] ?>" type="text"required name="partner_phone">
                        </div>
                        <div class="input-box">
                            <span class="details">Address</span>
                            <input value="<?php echo $partnerInfo['ADDRESS'] ?>" type="text"required name="address">
                        </div>
                        <div class="input-box">
                            <span class="details">Partner Email</span>
                            <input value="<?php echo $partnerInfo['EMAIL'] ?>" type="email" name="partner_email">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Note</span>
                            <input value="<?php echo $partnerInfo['NOTE'] ?>" type="text" name="note">
                        </div>
                    </div>
                    <?php 
                        if(isset($partnerEdit))
                        {
                            echo $partnerEdit;
                        }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="EDITING">
                    </div>
                </form>
                
            </div>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>