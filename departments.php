<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include 'menubar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include 'header.php';

                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- Content Row -->
<div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Management Department</h1>
                            </div>
                            <form class="user" method="POST">

    <div class="form-group">
        <input type="text" class="form-control form-control-user"
            placeholder="Department ID" name="dept_id" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control form-control-user"
            placeholder="Department Name" name="dept_name" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control form-control-user"
            placeholder="Description" name="dept_description" required>
    </div>

    <button type="submit" name="register_btn"
        class="btn btn-primary btn-user btn-block">
        Register Department
    </button>

</form>
         
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
                    <!-- Content Row -->

             

                        <!-- Area Chart -->

                                <!-- Card Header - Dropdown -->
                
                                <!-- Card Body -->
                                
                        <!-- Pie Chart -->
                        
                                <!-- Card Header - Dropdown -->
                                
                                <!-- Card Body -->
                                

                    <!-- Content Row -->
                    

                        <!-- Content Column -->
                        

                            <!-- Color System -->
                            

                            <!-- Approach -->
                            
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php
if(isset($_POST['register_btn'])){
    $dept_id = $_POST['dept_id'];
    $dept_name = $_POST['dept_name'];
    $dept_description = $_POST['dept_description'];
    

    $data = "INSERT into department_tbl (dept_id, dept_name, dept_description)values ('$dept_id','$dept_name',
        '$dept_description')";
    $getdata = mysqli_query($conn , $data);
     

    if ($getdata == true) {
        echo "<script language =javascript>;alert('Successfully Registered!');location.href = 'departmentlist.php';</script>";

    }
}?>
