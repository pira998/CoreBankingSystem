<?php
require APPROOT . '/views/includes/header.php';

?>

<div class="content">
    <div class="container-fluid">
        <center>
            <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#exampleModal">
                Create Loan Payment
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Loan Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post" action="/employee/LoanPayments/create">

                                <div class="card-body">

                                     <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Loan id..." name="loan_id" required>
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
                        <h4 class="card-title ">Deposits </h4>
                        <p class="card-category"> Info </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-info">
                                    <th>Loan paid entry Id</th>    
                                    <th>Loan id</th>
                                    <th>Paid amount</th>
                                   
                                    <th>Paid date</th>
                                    
                          
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data['loan_payments'] as $Deposit):
                                            
                                        ?>
                                             <td><?php echo $Deposit->loan_paid_entry_id; ?></td>
                                            <td><?php echo $Deposit->loan_id; ?></td>
                                            <td><?php echo $Deposit->paid_amount; ?></td>
                                            <td><?php echo $Deposit->paid_date; ?></td>
                                            
                                           
                                           
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