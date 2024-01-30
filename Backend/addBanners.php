<?php
include_once "./backendlayouts/header.php";
?>
<section>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header bg-primary text-white"> Banner info</div>
                                <div class="card-body bg-secondary">

                                   <form enctype="multipart/form-data" action="../controller/bannerUser.php" method="POST">
                                   <div class="row">
                                        <div class="col-lg-6">
                                            <label class="d-block" for="profileInput">
                                                <img style="max-width: 100%;" class="profileImage" src="https://www.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg">
                                            </label>

                                                <input accept=".jpg, .png, .jpeg" name="feautured_img" class="d-none" type="file" id="profileInput">
                                                <span class="text-danger">
                                                <?= $_SESSION['errors']['profileImage'] ?? '' ?>
                                                </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="heading" placeholder="Enter Banner Heading" type="text" class="my-2 form-control">
                                            <span class="text-danger"><?= $_SESSION['errors']['heading_error'] ?? '' ?></span>

                                           <textarea name="details" placeholder="Enter Banner Details.." class="my-2 form-control"></textarea>

                                            <input name="btn_title" placeholder="Enter Banner Button Title" type="text" class="my-2 form-control">
                                            <span class="text-danger"><?= $_SESSION['errors']['btn_title_error'] ?? '' ?></span>

                                            <input name="btn_link" placeholder="Enter Banner Button Link" type="text" class="my-2 form-control">
                                            <span class="text-danger"><?= $_SESSION['errors']['btn_link_error'] ?? '' ?></span>

                                            <input name="video_url" placeholder="Enter Banner Video URL" type="text" class="my-2 form-control">
                                            <button type="submit" class="btn btn-primary">Update Banner</button>
                                    </div>
                                    </div>
                                   </form>

                                </div>
                            </div>
                        </div>
        </div>
    </div>
</section>

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
     
 
    }

    profileInput.addEventListener('change', updatePreviewImage)
</script>