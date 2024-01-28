<?php

include_once "./backendlayouts/header.php";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profile Page</h1>

                    <div class="wrapper mt-5">

                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header bg-primary text-white"> Profile info</div>
                                <div class="card-body bg-secondary">

                                   <form enctype="multipart/form-data" action="../controller/profileUpdate.php" method="POST">
                                   <div class="row">
                                        <div class="col-lg-6">
                                            <label class="d-block" for="profileInput">
                                                <img style="max-width: 100%;" class="profileImage" src="<?= getProfileImage() ?>">
                                            </label>

                                                <input name="profileImage" class="d-none" type="file" id="profileInput">
                                                <span class="text-danger">
                                                <?= $_SESSION['errors']['profileImage'] ?? '' ?>
                                                </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="fname" value="<?= $_SESSION['auth']['fname'] ?>" placeholder="First Name" type="text" class="my-2 form-control">
                                            <span class="text-danger">
                                                <?= $_SESSION['errors']['name'] ?? ''?>
                                                </span>
                                            <input name="lname" value="<?= $_SESSION['auth']['lname'] ?>" placeholder="Last Name" type="text" class="my-2 form-control">
                                            <input name="email" value="<?= $_SESSION['auth']['email'] ?>" placeholder="Email Address" type="text" class="my-2 form-control">
                                            <span class="text-danger">
                                                <?= $_SESSION['errors']['email'] ?? ''?>
                                                </span>
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                    </div>
                                   </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header bg-primary text-white">Password Update</div>
                                <div class="card-body bg-secondary">
                                    <form action="../controller/passwordUpdate.php" method="POST">
                                     <input value="<?= $_SESSION['old_data']['oldPass'] ?? '' ?>" name="oldPass" placeholder="Old Password" type="text" class="form-control my-2">
                                     <span class="text-danger"><?= $_SESSION['errors']['oldPass'] ?? '' ?></span>

                                     <input value="<?= $_SESSION['old_data']['newPass'] ?? '' ?>" name="newPass" placeholder="New Password" type="text" class="form-control my-2">
                                     <span class="text-danger"><?= $_SESSION['errors']['newPass'] ?? '' ?></span>

                                     <input value="<?= $_SESSION['old_data']['confirmPsk'] ?? '' ?>" name="confirmPsk" placeholder="Confirm Password" type="text" class="form-control my-2">
                                     <span class="text-danger"><?= $_SESSION['errors']['confirmPsk'] ?? '' ?></span>

                                     <button type="submit" class="btn btn-primary">Update Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

<?php
include_once "./backendlayouts/footer.php";
unset($_SESSION['errors']);
?>


<script>
    let profileInput = document.querySelector("#profileInput")
    let profileImage = document.querySelector('.profileImage')

    function updatePreviewImage(event) {
     let url = URL.createObjectURL(event.target.files[0])
     profileImage.src = url;
     console.log(url)
 
    }

    profileInput.addEventListener('change', updatePreviewImage)
</script>