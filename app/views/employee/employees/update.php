<?php
require APPROOT . '/views/includes/header.php';
$employee= $data['info'];

?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Edit  Employee Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post" action="/employee/employees/update/<?php echo $employee->employee_id; ?> ">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Id (disabled)</label>
                                        <input type="text" class="form-control" name="employee_id" value="<?php echo $employee->employee_id; ?> " disabled>
                                    </div>
                                </div>
                              
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">NIC(disabled)</label>
                                        <input type="text" class="form-control" name="nic" value="<?php echo $employee->nic; ?> " disabled>
                                    </div>
                                </div>
            
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">employee name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $employee->name; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="<?php echo $employee->phone_number; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $employee->address; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Joined Date</label>
                                        <input type="text" class="form-control" name="dob" value="<?php echo $employee->joined_date; ?>" required>
                                    </div>
                                </div>
                            </div>

                            
                            <input type="submit" class="btn btn-info pull-right" name="Update" value="Update"></input>
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
                        <h6 class="card-category text-gray">employee Name</h6>
                        <h4 class="card-title"><?php echo $employee->name ?></h4>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
require APPROOT . '/views/includes/footer.php';
?>

