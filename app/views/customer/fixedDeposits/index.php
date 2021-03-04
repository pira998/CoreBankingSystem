<?php
require APPROOT . '/views/includes/customer_header.php';

?>

<div class="content">
    <div class="container-fluid">
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Fixed Deposits </h4>
                        <p class="card-category"> Info </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-info">
                                    <th>Fixed Deposit Id</th>    
                                    <th>Account Number</th>
                                    <th>Saving Account Number</th>
                                    <th>Open date</th>
                                   
                                    <th>Plan id</th>
                                    
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data['fixed_deposits'] as $FixedDeposit):
                                            
                                        ?>
                                             <td><?php echo $FixedDeposit->fixed_deposit_id; ?></td>
                                            <td><?php echo $FixedDeposit->account_number; ?></td>
                                            <td><?php echo $FixedDeposit->saving_account_number; ?></td>
                                            <td><?php echo $FixedDeposit->open_date; ?></td>
                                            <td><?php echo $FixedDeposit->plan_id; ?></td>
                                            <td><?php echo $FixedDeposit->amount; ?></td>
                                           
                                           
                                    </tr>
                                        <?php endforeach; ?>


                                   


                                   

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>







            <?php
            require APPROOT . '/views/includes/customer_footer.php';
            ?>