<?php 
    include_once "Include/header.php";
    include_once "Include/sidebar.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/collabClass.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/orderClass.php';
?>
<?php
    $collabClass = new collabClass();
    $orderClass = new orderClass();
    if(isset($_GET['saleID']))
    {
        $collab_id = $_GET['saleID'];
        $current_month = date("m");
        $current_year = date("Y");

        $collabInfo = $collabClass->get_collab_info_by_id($collab_id)->fetch_assoc();
        $collabSales = $orderClass->get_income_month_by_collab_id($collab_id,$current_month,$current_year)->fetch_assoc()['TOTAL_INCOME'];
        if(!$collabSales){
            $collabSales = 0;
        }
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
            <div class="container collab_sale_area">
                <div class="title">Details Partner Sales</div>

                <form>
                    <div class="user-details">
                        <div class="input-box collab_sale">
                            <span class="details">Partner Name</span>
                            <input value="<?php echo $collabInfo['COLLAB_NAME']; ?>" type="text">
                        </div>
                        <div class="input-box collab_sale">
                            <span class="details">Moonth</span>
                            <input class="time_choosing" type="date" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="input-box collab_sale">
                            <span class="details">Sales</span>
                            <input class="collab_sale_value" value="<?php echo number_format($collabSales).' VND'; ?>" type="text">
                        </div>
                        <div class="input-box collab_sale get_saleID">
                            <span class="details">Partner ID</span>
                            <input class="collab_id" value="<?php echo $collab_id; ?>" type="hidden">
                        </div>
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a style="text-decoration: none;" href="collab.php">BACK TO PARTNER LIST</a></button>
                    </div>
                </form>
                
            </div>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>