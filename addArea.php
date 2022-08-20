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
                    <span class="text">ADDING AREA</span>
                </div>

                <div class="boxes">
                    <div class="box box1 clickable">
                        <i class="fa-solid fa-circle-plus"></i>
                        <span class="number"><a class="add_area" href="orderAdd.php">ADD ORDER</a></span>
                    </div>

                    <div class="box box2 clickable">
                        <i class="fa-solid fa-circle-plus"></i>
                        <span class="number"><a class="add_area" href="collabAdd.php">ADD PARTNER</a></span>
                    </div>

                    <div class="box box3 clickable">
                        <i class="fa-solid fa-circle-plus"></i>
                        <span class="number"><a class="add_area" href="userAdd.php">ADD USER</a></span>
                    </div>
                </div>
            </div>
<?php 
    include_once "Include/footer.php";
?>