<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $burl ?>"><i class="bi bi-music-note"></i> Music Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $burl ?>product">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $burl ?>contact">contact</a>
                </li>
                <?php
                $user = isset($_SESSION['user']['username']);
                $role = isset($_SESSION['user']['role_id']);
                if ($role == 2 || $role == 1):
                ?>
                     <li class="nav-item">
                    <a class="nav-link" href="<?= $burl ?>admin/product">จัดการสินค้า</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                <?php
                if (isset($_SESSION['user'])) {
                    echo '                    <li class="nav-item">
                        <a class="nav-link" href="' . $burl . '">' . $_SESSION['user']['username'] . '</a>
                    </li>';
                    echo '                    <a href="' . $burl . 'logout"><button class="btn nav-item btn-danger">logout</button></a>';
                } else {
                    echo '                    <li class="nav-item">
                        <a class="nav-link" href="' . $burl . 'login">Login</a>
                    </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>