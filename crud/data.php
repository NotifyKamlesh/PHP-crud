<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="./data.css">
</head>
<body>
    <div class="main">
        <div class="user">
             <button class="btn"><a href="user.php">Add User</a></button>
        </div>
        <div class="tbl">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Password</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <?php
                    $sql = "Select * from `crud`";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];
                            $password = $row['password'];
                            echo '
                                <tr>
                                    <th>'.$id.'</th>
                                    <td>'.$name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$mobile.'</td>
                                    <td>'.$password.'</td>
                                    <td>
                                        <button><a href="update.php?updateid='.$id.'">Update</a></button>
                                        <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
                                    </td>
                                </tr>';
                            
                        }
                    }

                ?>
            </table>
        </div>

    </div>
</body>
</html> 