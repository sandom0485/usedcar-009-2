<?php 
    session_start();
    include("connect.php");
    echo ini_get("upload_max_filesize")."<br>";
    $allowedType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filepic"]["type"]);
    $size=$_FILES["filepic"]["size"]/1024/1024;
    //image/png filetype=["image","png"]
    if(!in_array($fileType[1],$allowedType)){
        //เมื่ออัปโหลดไฟล์ที่ไม่ตรงกับ type ใน aloowType
        echo "Non-Image file is not allowed. <br>";
    }
    else if($size>1.00){
        echo "File size exceeds the maximum treshold. <br>";
    }
    else{
        $brand = $_POST['txtbrand'];
        $model = $_POST['txtmodel'];
        $modelyear = $_POST['txtmodelyear'];
        $color = $_POST['txtcolor'];
        $license = $_POST['txtlicense'];
        $province = $_POST['txtprovince'];
        $price = $_POST['txtprice'];
        $postby = $_SESSION['id'];
        $filename = $_FILES['filepic']['name'];
        move_uploaded_file($_FILES["filepic"]["tmp_name"],"img/".$_FILES["filepic"]["name"]);
        $sqlInsert = "INSERT INTO car (brand,model,modelYear,color,license,province,price,carpic)VALUES('$brand','$model','$modelyear','$color','$license','$province','$price','$filename')";
        $result=$conn->query($sqlInsert);
        if($result){
           echo "<script language='javascript'>alert('Insert Product Complete');</script>"; 
           header("Location: index.php?menu=show");
        }
        else{
            echo "Error during insert: ".$conn->error;
        }
        //echo $sqlInsert;
    }
    
?>