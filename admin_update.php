<?php
@include 'index1.php';

$message = [];

// Handle the form submission
if (isset($_POST['update_project'])) {
    $id = $_POST['project_id']; // Retrieve ID from user input
    $project_name = $_POST['project_name'];
    $project_description = $_POST['project_description'];

    // Validate form fields
    if (empty($id) || empty($project_name) || empty($project_description)) {
        $message[] = 'Please fill out all fields!';
    } else {
        // Check if the project exists
        $check_query = "SELECT * FROM products WHERE id='$id'";
        $check_result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            // Update the database
            $update_data = "UPDATE products SET name='$project_name', description='$project_description' WHERE id='$id'";
            $upload = mysqli_query($conn, $update_data);

            if ($upload) {
                $message[] = 'Project updated successfully!';
                header('Location: admin.php'); // Redirect on success
                exit();
            } else {
                $message[] = 'Failed to update the project. Please try again.';
            }
        } else {
            $message[] = 'No project found with the given ID.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css43.css">
   <title>Update Project</title>
</head>
<body>
<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<span class="message">' . htmlspecialchars($msg) . '</span>';
    }
}
?>

<div class="container">
    <div class="product-form centered">
        <form action="" method="post">
            <h3 class="title">Update the Project</h3>
            <input type="number" class="box" name="project_id" min="0" placeholder="Enter Project ID">
            <input type="text" class="box" name="project_name" placeholder="Enter the project name">
            <textarea class="box" name="project_description" placeholder="Enter the project description" rows="5"></textarea>
            <input type="submit" value="Update Project" name="update_project" class="btn">
            <a href="admin.php" class="btn">Go Back</a>
        </form>
    </div>
</div>
</body>
</html>
