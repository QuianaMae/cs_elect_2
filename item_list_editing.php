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
                                <h1 class="h4 text-gray-900 mb-4">Editing Information</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <?php 
                                         $item_id = $_GET['id'];
                                         $sql = "SELECT * FROM item_tbl WHERE item_id = $item_id";
                                         $getcon = mysqli_query($conn, $sql);
                                         $rows = mysqli_fetch_assoc($getcon);
                                         ?>
                                        <input type="text"  class="form-control form-control-user"name="textitem_id" value="<?php echo $rows['item_id']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="item Name" name="txtitem_name" value="<?php echo $rows['item_name']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="item Description" name="txtitem_description" value="<?php echo $rows['item_description']; ?>" required>
                                </div>

                                                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Quantity" name="txtquantity" value="<?php echo $rows['quantity']; ?>" required>
                                </div>

                                                               
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="txtdepartment"  required>
                                       <option  value =""disabled selected>Department</option>
                                       <option value="HUMAN RESOURCE">HUMAN RESOURCE</option >
                                       <option value="ADMINISTRATIVE">ADMINISTRATIVE</option >
                                       <option value="ACCOUNTING">ACCOUNTING</option >
                                       <option value="MARKETING">MARKETING</option >
                                       <option value="PURCHASING">PURCHASING</option >
                                       <option value="PRODUCT DEVELOPMENT">PRODUCT DEVELOPMENT</option >
                                       <option value="OPERATION/DELIVERY">OPERATION/DELIVERY</option >


                                   </select required>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Date Register" name="txtdate_register" value="<?php echo $rows['date_register']; ?>" required>
                                    </div>

                                </div>
                                <button name="register_btn" class="btn btn-primary btn-user btn-block">
                                    Register item
                                </a>
                            </form>
         
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
                
            </div>
            
        </div>
      

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
    $item_id = $_POST['textitem_id'];
    $item_name = $_POST['txtitem_name'];
    $item_description = $_POST['txtitem_description'];
    $item_quantity = $_POST['txtquantity'];
    $item_type = $_POST['txtitem_type'];
    $department = $_POST['txtdepartment'];
    $dateregister = $_POST['txtdate_register'];

    $data = "UPDATE item_tbl 
         SET item_id = '$item_id',
             item_name = '$item_name',
             item_description = '$item_description',
             quantity = '$item_quantity',
             item_type = '$item_type',
             dept_id = '$department',
             date_register = '$dateregister'
         WHERE item_id = '$item_id'";

$getdata = mysqli_query($conn, $data);
     

    if ($getdata == true) {
        echo "<script language =javascript>;alert('Successfully Changed!');location.href = 'item_list.php';</script>";

    }
}

?>