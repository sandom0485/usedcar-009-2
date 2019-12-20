<?php 
    session_start();
    include("connect.php");
    $pid = $_POST['hdnProductID'];
    $brand = $_POST['txtbrand'];
    $model = $_POST['txtmodel'];
    $modelyear = $_POST['txtmodelyear'];
    $color = $_POST['txtcolor'];
    $license = $_POST['txtlicense'];
    $province = $_POST['txtprovince'];
    $price = $_POST['txtprice'];
    $sql = "UPDATE car SET brand='$brand',model='$model',modelyear='$modelyear',color='$color',license='$license',province='$province',price='$price' WHERE id =$pid";
    //echo $sql;
    $result=$conn->query($sql);
        if(!$result){
            echo "Error : ".$conn->error;
           
        }
        else{
            header("Location: index.php");
        }
?>