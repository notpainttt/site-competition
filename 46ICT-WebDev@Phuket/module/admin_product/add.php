<?php
include "../../config/config.php";
include "../../template/header.php";
include "../../template/menu.php";
check_perm();
if(isset($_POST['submit'])){

  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $brand = isset($_POST['brand']) ? $_POST['brand'] : "";
  $color = isset($_POST['color']) ? $_POST['color'] : "";
  $price = isset($_POST['price']) ? $_POST['price'] : "";
  $link = isset($_POST['link']) ? $_POST['link'] : "";

  if(empty($name)){
      sweet("Error!","Please Enter name","error","login");
      exit;
  }
  if(empty($brand)){
      sweet("Error!","Please Enter brand","error","login");
      exit;
  }
  if(empty($color)){
      sweet("Error!","Please Enter brand","error","login");
      exit;
  }
  if(empty($price)){
      sweet("Error!","Please Enter brand","error","login");
      exit;
  }
  if(empty($link)){
      sweet("Error!","Please Enter brand","error","login");
      exit;
  }
  if (detectSQLInjection($name) || detectSQLInjection($brand) || detectSQLInjection($color) || detectSQLInjection($price)) {
      sweet("Error!","ฮั่นแน่!! จะทำไรอ่ะ รู้น้าาาา~~~~~~","error","admin/add/product");
      exit;
  }

  $sql = "INSERT INTO product (id,name, brand, color, img, price)
VALUES (null,'". $name ."', '". $brand ."', '". $color ."','". $link ."','". $price ."')";

$result = mysqli_query($conn, $sql);
if($result){
  sweet("Success!","Add Product Success","success","admin/product");
  }else{
    sweet("Error!","Add Product Fail","error","admin/add/product");
    }
}

?>
<h1 class="text-center pt-4">เพิ่มสินค้า</h1>
<div class="container section1">
  <form class="form" action="" method="POST">
    <div class="row">
      <div class="col-md-6 col-12">
        <label for="">ชื่อสินค้า</label>
        <input type="text" class="form-control" name="name" required id="" placeholder="Name">
      </div>
      <div class="col-md-6 col-12">
        <label for="">แบรนด์</label>
        <input type="text" class="form-control" name="brand" required id="" placeholder="brand">
      </div>
      <div class="col-md-6 col-12">
        <label for="">สี</label>
        <input type="text" class="form-control" name="color" required id="" placeholder="color">
      </div>
      <div class="col-md-6 col-12">
        <label for="">ราคา</label>
        <input type="number" class="form-control" name="price" required id="" placeholder="price">
      </div>
      <div class="col-md-12 col-12">
        <label for="">นำลิ้งรูปมา</label>
        <input type="url" class="form-control" name="link" required id="" placeholder="link">
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