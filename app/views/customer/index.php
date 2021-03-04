<?php
require APPROOT . '/views/includes/customer_header.php';
?>


<div style="margin:80px 10px">
    <div class="row" >
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">Available Balance</p>
                <h3 class="card-title"><?php echo $data['accountBalance']->balance; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">Total Loan Amount</p>
                <h3 class="card-title"><?php echo $data['totalLoan']->customer_id; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
     <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">No of Loans</p>
                <h3 class="card-title"><?php echo 'value TBD' ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">Fixed Deposits</p>
                <h3 class="card-title"><?php echo 'value TBD' ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
    </div>
    
    <div class="row" >
    
     <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">No of Saving Account</p>
                <h3 class="card-title"><?php echo 'value TBD' ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">book</i>
                </div>
                <p class="card-category">No of Checking Accounts</p>
                <h3 class="card-title"><?php echo 'value TBD' ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                </div>
            </div>
        </div>
    </div> -->
    </div>
    
   
    </div>
</div>




<?php
require APPROOT . '/views/includes/customer_footer.php';
?>