<?php
include_once "./backendlayouts/header.php";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Welcome To Our Dashboard <?= ucwords($_SESSION['auth']['fname']) ?></h1>

                </div>
                <!-- /.container-fluid -->

                <?php
include_once "./backendlayouts/footer.php";
?>