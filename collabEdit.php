<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/collabClass.php';
?>

<?php
    $collabClass = new collabClass();
    
    if(isset($_GET['editID']))
    {
        $collab_id = $_GET['editID'];
        $collabInfo = $collabClass->get_collab_info_by_id($collab_id)->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $collabEdit = $collabClass->edit_collab($_POST,$collab_id);
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
                            <input value="<?php echo $collabInfo['COLLAB_NAME'] ?>" type="text"required name="collab_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Partner Phone</span>
                            <input value="<?php echo $collabInfo['COLLAB_PHONE'] ?>" type="text"required name="collab_phone">
                        </div>
                        <div class="input-box">
                            <span class="details">Bank Name</span>
                            <input value="<?php echo $collabInfo['COLLAB_BANK_NAME'] ?>" type="text"required name="bank_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Partner Zalo</span>
                            <input value="<?php echo $collabInfo['COLLAB_ZALO'] ?>" type="text"required name="collab_zalo">
                        </div>
                        <div class="input-box">
                            <span class="details">Bank Number</span>
                            <input value="<?php echo $collabInfo['COLLAB_BANK_NUMBER'] ?>" type="number"required name="bank_number">
                        </div>
                        <div class="input-box">
                            <span class="details">Partner Email</span>
                            <input value="<?php echo $collabInfo['COLLAB_EMAIL'] ?>" type="email"required name="collab_email">
                        </div>
                    </div>
                    <?php 
                    if(isset($collabEdit))
                    {
                        echo $collabEdit;
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