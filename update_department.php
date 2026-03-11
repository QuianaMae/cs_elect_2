<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connection.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    die("No department ID provided.");
}

$dept_id = intval($_GET['id']); // ensure it's an integer

// Fetch department info
$result = $conn->query("SELECT * FROM department_tbl WHERE dept_id = $dept_id");

if (!$result) {
    die("Error fetching department: " . $conn->error);
}

if ($result->num_rows == 0) {
    die("Department not found.");
}

$department = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dept_name = $conn->real_escape_string($_POST['dept_name']);
    $dept_description = $conn->real_escape_string($_POST['dept_description']);

    $update = $conn->query("UPDATE department_tbl 
                            SET dept_name='$dept_name', dept_description='$dept_description'
                            WHERE dept_id=$dept_id");

    if ($update) {
        // Automatic redirect to department list after update
        echo "<script>
                alert('Department updated successfully!');
                window.location.href='dept_list.php';
              </script>";
        exit();
    } else {
        die("Update failed: " . $conn->error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Department</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h3>Update Department</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Department Name</label>
                    <input type="text" name="dept_name" class="form-control" 
                           value="<?php echo htmlspecialchars($department['dept_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="dept_description" class="form-control" rows="3" required><?php 
                        echo htmlspecialchars($department['dept_description']); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="dept_list.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>