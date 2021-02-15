<?php
require APPROOT . '/views/includes/header.php';

?>


<div style="margin:80px 10px">
   
   
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                </div>
                <p class="card-category">Customers</p>
                <h3 class="card-title"><?php echo $data['customerCount'] ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>



            <?php
            require APPROOT . '/views/includes/footer.php';
            ?>