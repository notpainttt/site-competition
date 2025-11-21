<?php
include "../../config/config.php";
include "../../template/header.php";
include "../../template/menu.php";
check_perm();
$id = isset($_GET['id']) ? $_GET['id'] : "";
if(detectSQLInjection($id)){
    sweet("Error!","ฮั่นแน่!! จะทำไรอ่ะ รู้น้าาาา~~~~~~","error","admin/product");
    exit;
}
$view_sql = "SELECT * FROM product WHERE id='". $id ."'";
$view_result = mysqli_query($conn, $view_sql);
$dat_result = mysqli_fetch_assoc($view_result);
if (empty($dat_result)) {
    sweet("Error!","ไม่มีข้อมูล","error","admin/product");
    exit;
}
// print_r($dat_result);
if(empty($id)){
    sweet("Error!","Please Enter name","error","admin/product");
    exit;
}

if(isset($_POST['submit'])){
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $brand = isset($_POST['brand']) ? $_POST['brand'] : "";
  $color = isset($_POST['color']) ? $_POST['color'] : "";
  $price = isset($_POST['price']) ? $_POST['price'] : "";
  $link = isset($_POST['link']) ? $_POST['link'] : "";

  if(empty($name)){
      sweet("Error!","Please Enter name","error","admin/edit/product");
      exit;
  }
  if(empty($brand)){
      sweet("Error!","Please Enter brand","error","admin/edit/product");
      exit;
  }
  if(empty($color)){
      sweet("Error!","Please Enter brand","error","admin/edit/product");
      exit;
  }
  if(empty($price)){
      sweet("Error!","Please Enter brand","error","admin/edit/product");
      exit;
  }
  if(empty($link)){
      sweet("Error!","Please Enter brand","error","admin/edit/product");
      exit;
  }
  if (detectSQLInjection($name) || detectSQLInjection($brand) || detectSQLInjection($color) || detectSQLInjection($price)) {
      sweet("Error!","ฮั่นแน่!! จะทำไรอ่ะ รู้น้าาาา~~~~~~","error","admin/product");
      exit;
  }

$sql = "UPDATE product SET name='". $name ."',brand='". $brand ."',color='". $color ."',img='". $link ."',price='". $price ."' WHERE id='". $id ."'";
$result = mysqli_query($conn, $sql);
if($result = null){
    sweet("Error!","ไม่สามารถแก้ไขข้อมูลได้","error","admin/product");
    exit;
}else{
    sweet("Success!","แก้ไขข้อมูลสำเร็จ","success","admin/product");
    exit;
}

}

?>
<h1 class="text-center pt-4">แก้ไขสินค้า</h1>
<div class="container section1">
  <form class="form" action="" method="POST">
    <div class="row">
      <div class="col-md-6 col-12">
        <label for="">ชื่อสินค้า</label>
        <input type="text" class="form-control" value="<?= $dat_result['name'] ?>" name="name" required id="" placeholder="Name">
      </div>
      <div class="col-md-6 col-12">
        <label for="">แบรนด์</label>
        <input type="text" class="form-control" value="<?= $dat_result['brand'] ?>" name="brand" required id="" placeholder="brand">
      </div>
      <div class="col-md-6 col-12">
        <label for="">สี</label>
        <input type="text" class="form-control" value="<?= $dat_result['color'] ?>" name="color" required id="" placeholder="color">
      </div>
      <div class="col-md-6 col-12">
        <label for="">ราคา</label>
        <input type="number" class="form-control" value="<?= $dat_result['price'] ?>" name="price" required id="" placeholder="price">
      </div>
      <div class="col-md-12 col-12">
        <label for="">นำลิ้งรูปมา</label>
        <input type="url" class="form-control" value="<?= $dat_result['img'] ?>" name="link" required id="" placeholder="link">
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="col-md-12 col-12 d-grid gap-2">
        <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
      </div>
    </div>
  </form>
</div>
<br>
<br>
<br>
<br>
<br>
<?php
include "../../template/footer.php";
?>