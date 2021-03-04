<?php
require APPROOT . '/views/includes/header.php';

?>


<div class="content">
    <div class="container-fluid">
   
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">loanRequests </h4>
                        <p class="card-category"> Info </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead class=" text-info">
                                    <th>loanRequest ID</th> 
                                    <th>Loan Id</th>
                                    <th>Status</th>
                                    <th>Approve</th>
                                    <th>Cancel</th>
                                    
                                   

                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data['loanRequests'] as $loanRequest):
                                    
                                        ?>
                                            <td><?php echo $loanRequest->loan_request_id; ?></td>
                                            <td><?php echo $loanRequest->loan_id; ?></td>
                                            <td><?php echo $loanRequest->status; ?></td>
                                            <td><a href="/employee/loanRequests/approve/<?php echo $loanRequest->loan_request_id; ?>"><button class="btn btn-success">Approve</button></a>
                                            <td><a href="/employee/loanRequests/cancel/<?php echo $loanRequest->loan_request_id; ?>"><button class="btn btn-danger">Cancel</button></a>

                                            

                                           
                                           
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