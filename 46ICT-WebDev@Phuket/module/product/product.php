<?php
include "../../config/config.php";
include "../../template/header.php";
include "../../template/menu.php";

check_login();

?>
<br>
<br>
<br>
<center>
    <h1>Product</h1>
</center>
<div class="container m-4">
<div class="row">
    <?php
    $sql =  "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)):
        // print_r($row);
    ?>
    <div class="col-md-3 col-md-6 m-3 card border-0 rounded-0 shadow" style="width: 18rem;">
        <img src="<?= $row['img'] ?>" class="card-img-top rounded-0" alt="...">
        <div class="card-body mt-3 mb-3">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title"><?= $row['name'] ?></h4>
                    <p class="card-text">
                        <p>สี :  <?= $row['color'] ?></p>
                        <p>แบรนด์ :  <?= $row['brand'] ?></p>
                        <p>มีจำนวน :  5</p>
                        
                    </p>
                </div>
                <div class="col-2">
                    <i class="bi bi-bookmark-plus fs-2"></i>
                </div>
            </div>
        </div>
        <div class="row align-items-center text-center g-0">
            <div class="col-4">
                <h5><?= $row['price'] ?> บาท</h5>
            </div>
            <div class="col-8">
                <a href="#" class="btn btn-dark w-100 p-3 rounded-0 text-warning">ซื้อสินค้า</a>
            </div>
        </div>
    </div>
<?php endwhile; ?>
    </div>
<?php
include "../../template/footer.php";
?>