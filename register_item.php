<?php
include 'connection.php';


// Handle form submission
if(isset($_POST['register_btn'])){
    $item_id = $_POST['textitem_id'];
    $item_name = $_POST['txtitem_name'];
    $item_description = $_POST['txtitem_description'];
    $item_quantity = $_POST['txtquantity'];
    $item_type = $_POST['txtitem_type'];
    $department_id = $_POST['txtdepartment']; // now storing dept_id
    $dateregister = $_POST['txtdate_register'];

    $stmt = $conn->prepare("INSERT INTO item_tbl (item_id, item_name, item_description, quantity, item_type, dept_id, date_register) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $item_id, $item_name, $item_description, $item_quantity, $item_type, $department_id, $dateregister);
    
    if($stmt->execute()){
        echo "<script>alert('Successfully Registered!'); window.location='item_list.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registration failed: ". $stmt->error ."');</script>";
    }
    $stmt->close();
}
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

<body id="page-top">
    

<div id="wrapper">
    

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register an ITEM!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Item ID" name="textitem_id" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Item Name" name="txtitem_name" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   placeholder="Item Description" name="txtitem_description" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                   placeholder="Quantity" name="txtquantity" required>
                                        </div>

                                        <div class="form-group">
                                           <select name="txtitem_type" class="form-control" required>
                                               <option value="" disabled selected>Item Type</option>
                                               <option value="RAW MATERIALS">RAW MATERIALS</option>
                                               <option value="Work in progress (WIP)">Work in progress (WIP)</option>
                                               <option value="Finished Goods">Finished Goods</option>
                                               <option value="Packing Materials">Packing Materials</option>
                                               <option value="MRO Supplies">MRO Supplies</option>
                                           </select>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <!-- Dynamic Department Dropdown -->
                                                <select name="txtdepartment" class="form-control" required>
                                                    <option value="" disabled selected>Department</option>
                                                    <?php
                                                    $dept_query = $conn->query("SELECT dept_id, dept_name FROM department_tbl ORDER BY dept_name ASC");
                                                    if ($dept_query && $dept_query->num_rows > 0) {
                                                        while ($dept = $dept_query->fetch_assoc()) {
                                                            echo "<option value='" . $dept['dept_id'] . "'>" . $dept['dept_name'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option disabled>No departments available</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control form-control-user"
                                                       name="txtdate_register" required>
                                            </div>
                                        </div>

                                        <button name="register_btn" class="btn btn-primary btn-user btn-block">
                                            Register Item
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
    </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

</body>
</html>