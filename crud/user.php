<!-- <?php
    include 'connect.php';
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $password =$_POST['password'];
    }

    $sql = "insert into `crud` (name,email,mobile,password)
    values('$name','$email','$mobile','$password')";
    $result = mysqli_query($con, $sql);
    if($result){
        echo "Data inserted successfully";
    }
?> -->
<?php
    include 'connect.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        
        // Assuming the password is stored securely hashed, otherwise additional measures are needed.
        // For example, you should use password_hash() when storing passwords and password_verify() when checking them.

        $sql = "INSERT INTO `crud` (name, email, mobile, password) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($con, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $mobile, $password);
            mysqli_stmt_execute($stmt);
            
            $affected_rows = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            
            if($affected_rows == 1){
                // echo "Data inserted successfully";
                header("Location:data.php");
            } else {
                echo "Error inserting data";
            }
        } else {
            echo "Error in prepared statement";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1 class="hdr">PHP CRUD OPERATION</h1>
   <div class="container">
    <div class="form">
     <form action="" method="post">
        <table class="tb">
            <tr>
                <td>
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Enter Your Name" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Email</label>
                    <input type="email" required name="email" placeholder="Enter Your Email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Mobile</label>
                    <input type="text" name="mobile" placeholder="Enter Your Mobile No" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <button id="btn" type="submit" name="submit">Submit</button>
                </td>
            </tr>
        </table>
     </form>
    </div>
   </div>
</body>
</html>