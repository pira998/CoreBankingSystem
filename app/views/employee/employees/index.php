<?php
require APPROOT . '/views/includes/header.php';
?>
<div class="content">
    <div class="container-fluid">
        <center>
            <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#exampleModal">
                Add Employee
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post" action="/employee/employees/create">

                                <div class="card-body">

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="User Name..." name="username" required>
                                        </div>
                                    </div>

                                      <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Password..." name="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">perm_identity</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="employee Name..." name="name" required>
                                        </div>
                                    </div>
                                     <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">phone</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Phone number..." name="phone_number" required>
                                        </div>
                                    </div>
                                  

                                    
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">room</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Address..." name="address" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">pets</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nic..." name="nic">
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
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Search Employee" id="Search_employee" name="Search_employee" onkeyup="myFunction(0,'Search_employee')">
                  </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">employee </h4>
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
                                      <?php foreach($data['employees'] as $employee):
                                        if($employee->role_id==='2'){

                                        ?>
                                            
                                             <td id="username"><?php echo $employee->name; ?></td>
                                            <td><?php echo $employee->employee_id; ?></td>
                                        
                                           
                                         
                                            <td><?php echo $employee->phone_number; ?></td>
                                           
                                            <td><a href="/employee/employees/update/<?php echo (int)$employee->employee_id; ?>"><button class="btn btn-info">Edit</button></a>
                                            </td>

                                           
                                            <td><a href="/employee/employees/delete/<?php echo (int)$employee->employee_id ?>"><button class="btn btn-danger">Delete</button></a>
                                            </td>
                                    </tr>
                                        <?php 
                                    } endforeach; ?>


                                   


                                   

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


          <script>
        function myFunction(number,myInput) {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(myInput);
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[number];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

<?php 
require APPROOT . '/views/includes/footer.php';