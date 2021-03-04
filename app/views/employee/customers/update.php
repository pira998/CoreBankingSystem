<?php
require APPROOT . '/views/includes/header.php';
$customer= $data['info'];
$isIndividualCustomer = $data['isIndividualCustomer'];
// $customer_id = $data['customer_id']
?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit  <?php echo $isIndividualCustomer ? 'Individual Customer':'Organization Customer'; ?> Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" action="/employee/customers/update/<?php echo $customer->customer_id; ?> ">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Id (disabled)</label>
                                        <input type="text" class="form-control" name="customer_id" value="<?php echo $customer->customer_id; ?> " disabled>
                                    </div>
                                </div>
                                <?php if($isIndividualCustomer){ ?>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">NIC(disabled)</label>
                                        <input type="text" class="form-control" name="nic" value="<?php echo $customer->nic; ?> " disabled>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Customer name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $customer->name; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="<?php echo $customer->phone_number; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $customer->address; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Date of Birth</label>
                                        <input type="text" class="form-control" name="dob" value="<?php echo $customer->dob; ?>">
                                    </div>
                                </div>
                            </div>

                            
                            <input type="submit" class="btn btn-primary pull-right" name="Update" value="Update"></input>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="/public/assets/img/faces/marc.jpeg" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">customer Name</h6>
                        <h4 class="card-title"><?php echo $customer->name ?></h4>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require APPROOT . '/views/includes/footer.php';
?>

