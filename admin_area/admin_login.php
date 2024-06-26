<?php
@session_start();
include('../includes/connect.php');
//include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
</head>
<body>
<div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Login</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/adminreg.jpg" alt="Admin registration"
                 class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Username</label>
                    <input type="text" id="admin_name" name="admin_name"
                           placeholder="Enter your username" required="required"
                           class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password"
                           placeholder="Enter your password" required="required"
                           class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0"
                           name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1 ">Do you already have an account?<a href="admin_registration.php"
                                                                                           class="link-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php 
global $con;
if(isset($_POST['admin_login'])){
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($row_count > 0 && password_verify($admin_password, $row_data['admin_password'])){
        $_SESSION['admin_name'] = $admin_name;
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>
