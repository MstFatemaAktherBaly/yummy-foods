<?php

include_once "../Backend/backendlayouts/header.php";
include "../database/env.php";

$fetchdata = "SELECT * FROM banners";
$result = mysqli_query($conn, $fetchdata);
$collectData = mysqli_fetch_all($result,1);

print_r($collectData);

?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 card">
                <div class="card-header">
                    <h5>All banner List</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped">
                      <tr>
                        <td>SL.</td>
                        <td>Heading</td>
                        <td>Details</td>
                        <td>Button_tittle</td>
                        <td>Button_url</td>
                        <td>Video_url</td>
                        <td>Featured_image</td>
                        <td>Status</td>
                        <td>Action</td>
                      </tr>

                      <?php
                      foreach($collectData as $key => $data){
                     ?>
                       <tr>
                        <td><?= ++$key ?></td>
                        <td><?=  $data['heading'] ?></td>
                        <td><?=  $data['details'] ?></td>
                        <td><?=  $data['button_tittle'] ?></td>
                        <td><?=  $data['button_url'] ?></td>
                        <td><?=  $data['video_url'] ?></td>
                        <td><?=  $data['feautured_img'] ?></td>
                       </tr>
                      <?php
                      }
                      ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

include_once "../Backend/backendlayouts/footer.php";

?>