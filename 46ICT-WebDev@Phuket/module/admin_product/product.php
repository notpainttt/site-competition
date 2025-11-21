<?php
include "../../config/config.php";
include "../../template/header.php";
include "../../template/menu.php";

check_perm();

?>
<h1 class="text-center pt-4">จัดการระบบสินค้า</h1>
<center>
    <a href="<?= $burl . "admin/add/product" ?>"><button class="btn btn-outline-success">Add+</button></a>
</center>
<div class="container table-responsive py-5"> 
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">รุปภาพ</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">ราคา</th>
      <th scope="col">ควบคุม</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
$i = 1;
while($row = mysqli_fetch_assoc($result)):
?>

    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td><img src="<?= $row['img'] ?>" style="max-height: 100px" alt=""></td>
      <td><?= $row['name']  ?> </td>
      <td><?= $row['price']  ?> </td>
      <td>
        <a href="<?= $burl ?>admin/edit/product?id=<?= $row['id'] ?>"><button class="btn btn-outline-warning">Edit</button></a>
        <a href="<?= $burl ?>module/admin_product/delete.php?id=<?= $row['id'] ?>"><button class="btn btn-outline-danger">Delete</button></a>
    </td>
    </tr>
<?php endwhile;  ?>
  </tbody>
</table>
</div>
<div class="container m-4">
    <?php
    $sql =  "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)):
        // print_r($row);
    ?>
    
<?php endwhile; ?>
    </div>
<?php
include "../../template/footer.php";
?>