<?php
require APPROOT . '/views/includes/customer_header.php';

?>
<div class="content">
    <div class="container-fluid">
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
                                    <th>Name</th>    
                                    <th>Id</th>
                                    <th>Phone Number</th>
                                   
                                    <th>Edit</th>
                                    
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                    <tr>
                                      <?php foreach($data['customers'] as $customer): ?>
                                             <td id="username"><?php echo "to be added"; ?></td>
                                            <td><?php echo "to be added"; ?></td>
                                        
                                           
                                         
                                            <td><?php echo "to be added"; ?></td>
                                           
                                            <td><a href="/employee/customers/update/<?php echo "to be added"; ?>"><button class="btn btn-info">Edit</button></a>
                                            </td>

                                           
                                            <td><a href="/employee/customers/delete/<?php echo "to be added" ?>"><button class="btn btn-danger">Delete</button></a>
                                            </td>
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