<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?> </title>

    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <style>
       .profile_img{
    width:90%;
    margin:auto;
    display:block;
    height: 100%;
    object-fit: contain;
}
.edit_image{
  width: 100px;
  height: 100px;
  object-fit: contain;
}
.table {
            background-color:blue ; /* Light grey background for the table */
        }
        .table tbody tr {
            background-color:orange ; /* White background for table rows */
        }
    </style>
</head>

<body>
    <!-- navbar -->
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
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping">

          </i><sup><?php cart_item(); ?></sup></a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price() ;?> /-</a>
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

<!-- calling cart function -->
<?php cart(); ?>

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

<!-- fourth child -->
<div class="row">
       <div class="col-md-2 p-0">
         <ul class="navbar-nav bg-secondary text-center">
           <li class="nav-item bg-info">
              <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
            </li> 
              <?php
              if(isset($_SESSION['username'])){ 
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                $user_image = "SELECT * FROM `user_table` WHERE username='$username'";
                $result_image = mysqli_query($con, $user_image);
                $row_image = mysqli_fetch_array($result_image);
                $user_image = isset($row_image['user_image']) ? $row_image['user_image'] : 'default_image.jpg';
                
                echo "<li class='nav-item'>
                         <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
                      </li>";
              }else{
                echo "<li class='nav-item'>
                <img src='./user_images/login1.jpg' class='profile_img my-4' alt=''>
             </li>";
              }      
              ?>
              
            <li class="nav-item">
               <a class="nav-link text-light" href="profile.php"><h4>Pending orders</h4></a>
            </li> 
            <li class="nav-item">
              <a class="nav-link text-light" href="profile.php?edit_account"><h4>Edit Account</h4></a>
            </li> 
            <li class="nav-item">
              <a class="nav-link text-light" href="profile.php?my_orders"><h4>My orders</h4></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="profile.php?delete_account"><h4>Delete account</h4></a>
            </li> 
            <li class="nav-item">
              <a class="nav-link text-light" href="logout.php"><h4>Logout</h4></a>
            </li>      
         </ul>
       </div>

       <div class="col-md-10">
      <?php get_user_order_details();
      if(isset($_GET['edit_account'])){
        include('edit_account.php');
      }
        if(isset($_GET['my_orders'])){
         include('user_orders.php');
      }
       ?>
       </div>
</div>



    <!-- last child -->
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