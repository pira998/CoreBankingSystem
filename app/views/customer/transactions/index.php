<?php
require APPROOT . '/views/includes/customer_header.php';

?>
<div class="content">
    <div class="container-fluid">
    <center>
            <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#exampleModal">
                Create transaction
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create transaction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post" action="/customer/transactions/create">

                                <div class="card-body">

                                     <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="From: Account Number..." name="from_account_number" required>
                                        </div>
                                    </div>
                                     <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">phone</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="From: Saving Account Number..." name="from_saving_account_number" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="To: Account Number..." name="to_account_number" required>
                                        </div>
                                    </div>
                                     <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">phone</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="To: Saving Account Number..." name="to_saving_account_number" required>
                                        </div>
                                    </div>
                                  

                                    
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">room</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Amount..." name="amount" required>
                                        </div>
                                    </div>
                                
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">room</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Description..." name="description">
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
                        <h4 class="card-title ">Customer </h4>
                        <p class="card-category"> Info </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-info">
                                    <th>Transaction ID</th>    
                                    <th>From Acc</th>
                                    <th>From Sav Acc</th>
                                    <th>To Acc</th>
                                    <th>To Sav Acc</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Transaction date</th>


                                   
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data['transactions'] as $transaction): ?>
                                             <td id="username"><?php echo $transaction->online_trans_id; ?></td>
                                            <td><?php echo $transaction-> from_account_number ?></td>
                                            <td><?php echo $transaction-> from_saving_account_number ?></td>
                                            <td><?php echo $transaction-> to_account_number ?></td>
                                            <td><?php echo $transaction-> to_saving_account_number ?></td>
                                            <td><?php echo $transaction-> amount ?></td>
                                            <td><?php echo $transaction-> description ?></td>
                                            <td><?php echo $transaction-> transaction_date ?></td>

                                           
                                         
                                           
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
