<?php 
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/orderClass.php';
    $orderClass = new orderClass();
?>

<?php
    if(isset($_POST['month_choosing'])){
        $month_choosing = $_POST['month_choosing'];
        $year_choosing = $_POST['year_choosing'];
        $total_income = $orderClass->get_income_month($month_choosing,$year_choosing)->fetch_assoc()['TOTAL_INCOME'];
        echo '<span class="num">'.number_format($total_income).'<sup>đ</sup></span>';
    }
?>