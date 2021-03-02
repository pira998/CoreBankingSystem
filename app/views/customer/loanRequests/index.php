<?php
require APPROOT . '/views/includes/customer_header.php';

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
                                  
                                   

                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data['loanRequests'] as $loanRequest):
                                    
                                        ?>
                                            <td><?php echo $loanRequest->loan_request_id; ?></td>
                                            <td><?php echo $loanRequest->loan_id; ?></td>
                                            <td><?php echo $loanRequest->status; ?></td>
                                          
                                           
                                           
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
