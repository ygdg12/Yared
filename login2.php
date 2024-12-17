<?php
include("index1.php");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <link rel="stylesheet"  type="text/css" href="css56.css">
        <link rel="shortcut icon" href="images/fav-icon.svg">
        <script type="text/javascript"src="js4.js" defer></script>
    </head>
    <body>
    <div class="wrapper">
        <h1>Login</h1>
        <p id="errom"></p>
        <form  method="POST" id="form">
            <span id="name-error"></span>
            <div>
                <label for="emailinput">
                    <span>@</span>
                </label>
                <input type="email" name="email" id="emailinput" placeholder="Email">
            </div>
            <span class="err" id="error1"></span>
            <div>
                <label for="PSinput">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
                </label>
                <input type="password" name="password" id="PSinput" placeholder="Password">
            </div>
            <span class="err" id="error3"></span>
            <input  type="submit" name="submit" value="Login" class="Signup">
            <?php 
include("index1.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo '<p class="p1" style="color:red; text-align:left; font-size:15px; padding-top:20px;">
                Email or Password cannot be empty.
              </p>';
    } else {
        
        $sql = "SELECT * FROM users WHERE Email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            
            mysqli_stmt_bind_param($stmt, "s", $email);

            // Execute the query
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                // Fetch the user data
                $row = mysqli_fetch_assoc($result);

            
                $hashedPassword = $row['Passoword'] ?? ''; 

                // Verify the provided password against the hashed password
                if (password_verify($password, $hashedPassword)) {
                    
                    header("Location:chec.php");
                    exit();
                } else {
                    
                    echo '<p class="p1" style="color:red; text-align:left; font-size:15px; padding-top:20px;">
                            Incorrect Password
                          </p>';
                }
            } else {
                echo '<p class="p1" style="color:red; text-align:left; font-size:15px; padding-top:20px;">
                        Email not found
                      </p>';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>



        </form>
        <p>Don't Have an Account? <a href="login.php">Sign Up</a></p>
    </div>
    
    </body>
</html>

<?php 

?>