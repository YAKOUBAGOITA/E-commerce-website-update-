<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>User-registration</title>
          <!-- bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
       <div class="container-fluid my-3">
             <h2 class="text-center">New User Registration</h2> 
             <div class="row d-flex align-items-center justify-content-center">
              <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
       <!-- username field -->
       <div class="form-outline mb-4">
              <label for="user_name" class="form-label">Username</label>
              <input type="text" id="user_name" class="form-control" 
              placeholder="Enter your username" autocomplete="off"  
              required="required"  name="user_name"/> 
       </div>
       <!-- email field -->
       <div class="form-outline mb-4">
              <label for="user_email" class="form-label">Email</label>
              <input type="email" id="user_email" class="form-control" 
              placeholder="Enter your email" autocomplete="off" 
               required="required" name="user_email"/> 
       </div>
        <!-- image field -->
       <div class="form-outline mb-4">
              <label for="user_image" class="form-label">User image</label>
              <input type="file" id="user_image" class="form-control"
               required="required" name="user_image"/>
       </div>
        <!-- password field -->
      <div class="form-outline mb-4">
             <label for="user_password" class="form-label">Password</label>
             <input type="password" id="user_password" class="form-control" 
             placeholder="Enter your password" autocomplete="off" 
             required="required" name="user_password"/> 
      </div>
        <!--Confirm password field -->
       <div class="form-outline mb-4">
              <label for="user_password" class="form-label">Confirm Password</label>
              <input type="password" id="conf_user_password" class="form-control" 
              placeholder="Confirm password" autocomplete="off" 
              required="required" name="conf_user_password"/> 
       </div>
             <!-- address field -->
      <div class="form-outline mb-4">
             <label for="user_address" class="form-label">Address</label>
             <input type="text" id="user_address" class="form-control" 
             placeholder="Enter your address" autocomplete="off"  
             required="required"  name="user_address"/> 
      </div>
            <!-- contact field -->
      <div class="form-outline mb-4">
             <label for="user_contact" class="form-label">Contact</label>
             <input type="text" id="user_contact" class="form-control" 
             placeholder="Enter your contact" autocomplete="off"  
             required="required"  name="user_contact"/> 
      </div>
      <div class="mt-4 pt-2">
       <input type="submit" value="Register" class="bg-info py-2 px-3
       border-0" name="user_register">
       <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? 
       <a href="user_login.php" class="text-danger">  Login</a></p>
      </div>
</form>
              </div>
             </div>
       </div>
       
</body>
</html>