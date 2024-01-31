<?php include 'layouts/session.php';?>
<?php include 'layouts/main.php';?>
<?php include 'includes/dbconnect.php'; ?>
<?php
$sql2 = $conn->query("SELECT * FROM `p_customer` ORDER BY id DESC");
$row2 = mysqli_fetch_assoc($sql2);
?>

<head>
    <title>Home | Users</title>
    <?php include 'layouts/title-meta.php';?>
    <!-- Datatables css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <?php include 'layouts/head-css.php';?>


</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- <?php include 'layouts/menu.php';?> -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">

                                        <li class="breadcrumb-item active"></li>
                                    </ol>
                                </div>
                                <h3 class="page-title">Credit Management System</h3>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Customers </h4>

                                    <h4 class="header-title text-end"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signup-modal"> Create new customer</button></h4>
                                    <br>

                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Current Due</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                          $n = 0;
                          $sql = $conn->query("SELECT * FROM `p_customer` ORDER BY id DESC");
                          while($row = mysqli_fetch_assoc($sql)){
                            $modalId = "edit-customer-modal-" . $row['id'];
                        ?>
                                        <tr>
                                            <td><?php echo ++$n; ?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td><?php echo $row['due'];?></td>
                                            <td><a ><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>"> <i class="bi bi-pencil-square"></i>Edit</button></a> <a href="action/add_customer.php?delete=<?php echo ($row['id']);?>"><button class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button></a></td>
                                        </tr>


                                        <!-- Edit customer modal -->
                    <div id="<?php echo $modalId; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                

                                <div class="modal-body">
                                    <div class="auth-brand text-center mt-2 mb-4 position-relative top-0">
                                        
                                        <h3>Update customer</h3>
                                    </div>

                                    <form class="ps-3 pe-3" action="action/add_customer.php" method="post">

                                        <div class="mb-3" hidden>
                                            <label for="username" class="form-label">Full Name</label>
                                            <input class="form-control" type="text" id="" required="" placeholder="Example" name="id" value="<?php echo $row['id'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Full Name</label>
                                            <input class="form-control" type="text" id="" required="" placeholder="Example" name="name" value="<?php echo $row['name'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email Address</label>
                                            <input class="form-control" type="email" id="" required="" placeholder="example@gmail.com" name="email" value="<?php echo $row['email'];?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Phone Number</label>
                                            <input class="form-control" type="number" id="" required="" placeholder="0700000000" name="phone" value="<?php echo $row['phone'];?>">
                                        </div>
                                        

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Physicall Address</label>
                                            <input class="form-control" type="text" required="" id="" placeholder="Ruiru" name="address" value="<?php echo $row['address'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Credit Limit</label>
                                            <input class="form-control" type="number" required="" id="" placeholder="0"  name="credit_limit" value="<?php echo $row['credit_limit'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Current due</label>
                                            <input class="form-control" type="number" required="" id="" placeholder="0"  name="due" value="<?php echo $row['due'];?>">
                                        </div>

                                        

                                        <div class="mb-3 text-end">
                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success" type="submit" name="update">Update customer</button>
                                        </div>

                                    </form>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                                        <?php } ?>
                                        
                                    </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include 'layouts/footer.php';?>

        </div>

                    <!-- add customer modal -->
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                
                                <div class="modal-body">
                                    <div class="auth-brand text-center mt-2 mb-4 position-relative top-0">
                                        <!-- <a href="index.html" class="logo-dark">
                                            <span><img src="assets/images/logo-dark.png" alt="dark logo" height="22"></span>
                                        </a>
                                        <a href="index.html" class="logo-light">
                                            <span><img src="assets/images/logo.png" alt="logo" height="22"></span>
                                        </a> -->
                                        <h3>Create customer</h3>
                                    </div>

                                    <form class="ps-3 pe-3" action="action/add_customer.php" method="post">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Full Name</label>
                                            <input class="form-control" type="text" id="" required="" placeholder="Example" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email Address</label>
                                            <input class="form-control" type="email" id="" required="" placeholder="example@gmail.com" name="email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Phone Number</label>
                                            <input class="form-control" type="number" id="" required="" placeholder="0700000000" name="phone">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Physicall Address</label>
                                            <input class="form-control" type="text" required="" id="" placeholder="Ruiru" name="address">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Credit Limit</label>
                                            <input class="form-control" type="number" required="" id="" placeholder="0" value="100000" name="credit_limit">
                                        </div>

                                        

                                        <div class="mb-3 text-end">
                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success" type="submit" name="submit">Save Customer</button>
                                        </div>

                                    </form>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div>

                    

    </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>

    </div>
    <!-- END wrapper -->


    <?php include 'layouts/right-sidebar.php';?>

    <?php include 'layouts/footer-scripts.php';?>

    <!-- Datatables js -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>