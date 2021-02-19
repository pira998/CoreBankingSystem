<?php
require APPROOT . '/views/includes/header.php';

?>

<div class="content">
    <div class="container-fluid">
    <center>
            <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#exampleModal">
                Create Saving Account
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Saving Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post" action="/employee/SavingAccounts/create">

                                <div class="card-body">

                                    
                                   
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Customer Id..." name="customer_id" required>
                                        </div>
                                    </div>
                                     <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">phone</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Amount..." name="balance" required>
                                        </div>
                                    </div>
                                  

                                    
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">room</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Branch Id..." name="branch_id" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">room</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Interest Type Id" name="saving_interest_id" required>
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
                        <h4 class="card-title ">Saving Account </h4>
                        <p class="card-category"> Info </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-info">
                                    <th>Account No</th>    
                                    <th>amount</th>
                                    <th>Open date</th>
                                   
                                    <th>Branch id</th>
                                    
                                    <th>Withdraws</th>
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data['saving_accounts'] as $savingAccount):
                                             $number = $savingAccount->account_number;
                                            $length = 10;
                                            $accountNumber = substr(str_repeat(0, $length).$number, - $length);
                                        ?>
                                             <td><?php echo $accountNumber; ?></td>
                                            <td><?php echo $savingAccount->balance; ?></td>
                                            <td><?php echo $savingAccount->open_date; ?></td>
                                            <td><?php echo $savingAccount->branch_id; ?></td>
                                            <td><?php echo $savingAccount->withdraw_count; ?></td>
                                           
                                           
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