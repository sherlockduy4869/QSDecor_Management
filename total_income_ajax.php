<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/orderClass.php';
    $orderClass = new orderClass();
?>

<?php
    if(isset($_POST['month_choosing'])){
        $month_choosing = $_POST['month_choosing'];
        $year_choosing = $_POST['year_choosing'];
        $total_income = $orderClass->get_income_month($month_choosing,$year_choosing)->fetch_assoc()['TOTAL_INCOME'];

        if(!$total_income){
            $total_income = 0;
        }

        echo '<span class="num">'.number_format($total_income).'<sup>đ</sup></span>';
    }

    if(isset($_POST['time_month_choosing'])){
        $time_month_choosing = $_POST['time_month_choosing'];
        $time_year_choosing = $_POST['time_year_choosing'];
        $collab_id = $_POST['collab_id'];
        $collabSales = $orderClass->get_income_month_by_collab_id($collab_id,$time_month_choosing,$time_year_choosing)->fetch_assoc()['TOTAL_INCOME'];
        
        if(!$collabSales){
            $collabSales = 0;
        }
        echo number_format($collabSales).' VND';
    }
?>