<?php
include "../../config/config.php";
include "../../template/header.php";
check_perm();
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (detectSQLInjection($id)) {
    sweet("Error!","ฮั่นแน่!! จะทำไรอ่ะ รู้น้าาาา~~~~~~","error","admin/product");
    exit;
}
$sql_del = "DELETE FROM product WHERE id='".$id."'";
$result = mysqli_query($conn, $sql_del);
if(isset($result) ||  $result != null ){
    sweet("Success","ลบข้อมูลเรียบร้อย","success","admin/product");
    exit;
}else{
    sweet("Error","ไม่สามารถลบข้อมูลได้","error","admin/product");
    exit;
}

?>
