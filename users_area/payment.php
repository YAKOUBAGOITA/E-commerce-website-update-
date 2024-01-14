<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, 
       initial-scale=1.0"><title>Payment Page</title>
       
        
                <!-- bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
 rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                <!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />    
     <style>
img{
       width:70%;
       margin:auto;
       display:block;
}
.logo{
       width: 7%;
       weight: 7%;
}
</style>
<link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="container-fluid p-0">
        <!-- first child-->
        <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="../images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
     aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-0 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
       </li>  
      </ul>
      <form class="d-flex p-0" action="../search_product.php" method="get">
        <input class="form-control me-0 p-0" type="search" placeholder="Search"
         aria-label="Search" name="search_data">
       <!-- <button class="btn btn-outline-light" type="submit">Search</button>
         -->
         <input type="submit" value="Search" class="btn btn-outline-light"
         name="search_data_product">

    </form>
    </div>
  </div>
</nav>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
       <ul class="navbar-nav me-auto">  
            <?php
        if(!isset($_SESSION['username'])){
   echo"<li class='nav-item'>   
   <a class='nav-link' href='#'>Welcome Guest</a>
 </li>";
 }else{
   echo"<li class='nav-item'>   
   <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
 </li>";}          
      if(!isset($_SESSION['username'])){
  echo"<li class='nav-item'>   
  <a class='nav-link' href='../users_area/user_login.php'>Login</a>  
</li>";
}else{
  echo"<li class='nav-item'>   
  <a class='nav-link' href='../users_area/logout.php'>Logout</a>  
</li>";} 
?>
       </ul>
</nav>

<!-- third child -->
<div class="bg-light">
       <h3 class="text-center">Hidden Store</h3>
       <p class="text-center">Communications is at the heart of 
        e-commerce  and community</p>
</div>
       <!-- php code to access user id-->
       <?php
       $user_ip=getIPAddress();
       $get_user="Select*from `user_table` 
       where user_ip='$user_ip'";
       $result=mysqli_query($con,$get_user);
       $run_query=mysqli_fetch_array($result);
       $user_id=$run_query['user_id'];

       ?>
       <div class="container">
          <h2 class="text-center text-info">Payment options</h2>
          <div class="row d-flex justify-content-center 
          align-items-center my-5">
              <div class="col-md-6">
                <a href="https://www.paypal.com", target="_bank">
                <img src="../images/upi.jpg" alt=""></a>
             </div>
             <div class="col-md-6">
               <a href="order.php?user_id=<?php echo $user_id; ?>">Pay offline</a>
             </div>
          </div>   
       </div>
        <!-- include footer -->
<?php 
  include("../includes/footer.php");
 ?> 
   <!-- bootstrap js link-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>
</html>