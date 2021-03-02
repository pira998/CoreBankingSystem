<?php
require APPROOT . '/views/includes/header.php';

?>

<div class="content">
    <div class="container-fluid">
    <center>
            <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#exampleModal">
                Create FixedDeposit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create FixedDeposit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post" action="/employee/FixedDeposits/create">

                                <div class="card-body">

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Account number..." name="account_number" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Saving account number..." name="saving_account_number" required>
                                        </div>
                                    </div>
                                     <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">phone</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Amount..." name="amount" required>
                                        </div>
                                    </div>
                                  

                                    
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">room</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Plan Id..." name="plan_id" required>
                                        </div>
                                    </div>
  
                                   
                                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-info" name="create" value="create"></input>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </center>
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
require APPROOT . '/views/includes/footer.php';
?>