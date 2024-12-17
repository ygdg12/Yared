<?php include("index1.php");

if (isset($_POST['add-product'])) {
    // Retrieve form data
    $project_name = $_POST['product'];
    $project_description = $_POST['description'];

    // Check for empty fields
    if (empty($project_name) || empty($project_description)) {
        $message[] = 'Please fill all the fields';
    } else {
        // Insert into database
        $insert = "INSERT INTO products(name, description) VALUES('$project_name', '$project_description')";
        $upload = mysqli_query($conn, $insert);

        if ($upload) {
            $message[] = 'New project added successfully';
        } else {
            $message[] = 'Could not add the project';
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header('location:admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Admin</title>
    <link rel="stylesheet" href="css1.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php 
// Display messages if any
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<span class="message">' . $msg . '</span>';
    }
}
?>

<div class="container">
    <div class="product-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3>Add a new project</h3>
            <input type="text" placeholder="Enter a project name" name="product" class="box">
            <textarea placeholder="Enter project description" name="description" class="box" rows="4"></textarea>
            <input type="submit" class="btn" name="add-product" value="Add a project">
        </form>
    </div>
    <?php 
    $select = mysqli_query($conn, "SELECT * FROM products"); 
    ?>
    <div class="product-display">
        <div class="product-display-table">
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Project Name</td>
                        <td>Project Description</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <?php 
                while ($row = mysqli_fetch_assoc($select)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"><i class="fas fa-edit"></i> Edit</a>
                        <a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn">Delete</a>
                    </td>
                </tr>
                <?php }; ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>
