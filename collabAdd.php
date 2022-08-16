<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/collabClass.php';
?>

<?php
    
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
                <div class="title">Add New Collaborator</div>

                <form action="collabAdd.php" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Collab Name</span>
                            <input type="text"required name="collab_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Collab Phone</span>
                            <input type="text"required name="collab_phone">
                        </div>
                        <div class="input-box">
                            <span class="details">Collab Zalo</span>
                            <input type="text"required name="collab_zalo">
                        </div>
                        <div class="input-box">
                            <span class="details">Collab Email</span>
                            <input type="email"required name="collab_email">
                        </div>
                        <div class="input-box">
                            <span class="details">Bank Name</span>
                            <input type="text"required name="bank_name">
                        </div>
                        <div class="input-box">
                            <span class="details">Bank Number</span>
                            <input type="number"required name="bank_number">
                        </div>
                    </div>
                    <?php 
                    if(isset($orderAdd))
                    {
                        echo $orderAdd;
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