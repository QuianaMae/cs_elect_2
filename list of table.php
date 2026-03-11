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


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <div class="container">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Item Id</th>
                                            <th>Item Name</th>
                                            <th>Item Description</th>
                                            <th>Quantity</th>
                                            <th>Item Type</th>
                                            <th>Department</th>
                                            <th>Date Register</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
 <?php
$count = 0;
 $sql_query = "SELECT * FROM item_tbl";
 $getcon = mysqli_query($conn , $sql_query);
        while ($rows = mysqli_fetch_assoc($getcon)) {
 $count++;
        ?>
                                        <tr>
                                            <td><?php echo $rows['item_id']; ?></td>
                                            <td><?php echo $rows['item_name']; ?></td>
                                            <td><?php echo $rows['item_description']; ?></td>
                                            <td><?php echo $rows['quantity']; ?></td>
                                            <td><?php echo $rows['item_type']; ?></td>
                                            <td><?php echo $rows['department']; ?></td>
                                            <td><?php echo $rows['date_register']; ?></td>
                                            <td>
                                            <a href="item_list_Editing.php?id=<?= $rows['item_id']; ?>"onclick="return confirm('Do you want to Edit this item?');">Edit</a>  
                                            <a href="item_list.php?delete_id=<?= $rows['item_id']; ?>"onclick="return confirm('Do you want to Delete this item?');">Delete
                                            </a>  
                                        </td>
                                        
                                        </tr>
                                        <?php
                                    }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>
                </div>

            </div>
        </div>
    </div>
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

     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
<?php
if(isset($_GET['delete_id'])){
$item_id = $_GET['delete_id'];
$delete_data = "DELETE FROM item_tbl WHERE item_id = $item_id";
$deleted_data = mysqli_query($conn, $delete_data);

if ($deleted_data == true) {
    echo "<script language =javascript>;alert('Successfully Deleted!');location.href = 'item_list.php';</script>";


}
}
?>

