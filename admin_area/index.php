<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Admin Dashboard</title>

       <!-- bootstrap css link -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
 rel="stylesheet" 
 integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
 crossorigin="anonymous">

<!-- css link -->
<link rel="stylesheet" href="../style.css">

      
      <!-- font awesome link-->
      <link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
crossorigin="anonymous" referrerpolicy="no-referrer" /> 

</head>
<body>
       
<!-- navbar -->
<div class="container-fluid p-0">
       <!-- first child -->
       <nav class="navbar navbar-expand-lg navbar-light bg-info">
              <div class="container-fluid">
                    <img src="../images/logo.jpg" alt="" class="logo"> 
                    <nav class="navbar-expand-lg">
                       <ul class="navbar-nav">
                          
                          <a href="index.php?admin_registration" class="nav-link bg-info">Admin-Registration</a>
                          <?php
        if(!isset($_SESSION['admin_name'])){
   echo"<li class='nav-item'>   
   <a class='nav-link' href='#'>Welcome Guest</a>
 </li>";
 }else{
   echo"<li class='nav-item'>   
   <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>  
 </li>";}
            if(!isset($_SESSION['admin_name'])){
  echo"<li class='nav-item'>   
  <a class='nav-link' href='../admin_area/admin_login.php'>Login</a>  
</li>";
}else{
  echo"<li class='nav-item'>   
  <a class='nav-link' href='../admin_area/admin_logout.php'>Logout</a>  
</li>";}
?>
                          
                         <!-- <a href="index.php?admin_login" class="nav-link bg-info">Login</a>
                          <a href="" class="nav-link">Welcome Guest</a> -->
                          
                        </ul>
                    </nav>
              </div>
       </nav>

       <!-- second child -->
       <div class="bg-light">
              <h3 class="text-center p-0">Manage Details</h3>
       </div>
       
        <!-- third child -->
        <div class="row">
              <div class="col-md-12 bg-secondary p-0 d-flex align-items-center">
                  <div>
                   <a href=""><img src="../images/juice.jpg" 
                   alt="" class="admin_image"></a> 
                   <ul>   
                    <p class="text-light text-center">Admin Name</p>
                    </ul>
                   </div>
                   <div class="button text-center p-0 ">
                     <!-- button*10>a.nav-link.text-light.bg-info -->
                     <button class="my-0"><a href="index.php?in_product" class="nav-link text-light bg-info">Insert Products</a></button>
                     <button class="my-0"><a href="index.php?view_products" class="nav-link text-light bg-info">View Products</a></button>
                     <button class="my-0"><a href="index.php?in_category" class="nav-link text-light bg-info">Insert Categories</a></button>
                     <button class="my-0"><a href="index.php?view_categories" class="nav-link text-light bg-info">View categories</a></button>
                     <button class="my-0"><a href="index.php?in_brand" class="nav-link text-light bg-info">Insert Brands</a></button>
                     <button class="my-0"><a href="index.php?view_brands" class="nav-link text-light bg-info">View Brands</a></button>
                     <button class="my-0"><a href="index.php?list_orders" class="nav-link text-light bg-info">All orders</a></button>
                     <button class="my-0"><a href="index.php?list_payments" class="nav-link text-light bg-info">All Payments</a></button>
                     <button class="my-0"><a href="index.php?list_users" class="nav-link text-light bg-info">List users</a></button>
                     
                   </div>
              </div>
        </div>

        <!-- fourth child -->
        <div class="container my-0">
              <?php 
              if(isset($_GET['in_category'])){
                     include('insert_categories.php');
              }
              if(isset($_GET['in_brand'])){
                     include('insert_brands.php');
              }
              if(isset($_GET['in_product'])){
                     include('insert_products.php');
              }
              if(isset($_GET['view_products'])){
                     include('view_products.php');
              }
              if(isset($_GET['edit_products'])){
                     include('edit_products.php');
              }
              if(isset($_GET['delete_product'])){
                     include('delete_product.php');
              }
              if(isset($_GET['view_categories'])){
                     include('view_categories.php');
              }
              if(isset($_GET['view_brands'])){
                     include('view_brands.php');
              }
              if(isset($_GET['edit_category'])){
                     include('edit_category.php');
              }   
              if(isset($_GET['edit_brands'])){
                     include('edit_brands.php');
              }           
              if(isset($_GET['delete_category'])){
                     include('delete_category.php');
              }        
              if(isset($_GET['delete_brands'])){
                     include('delete_brands.php');
              }  
              if(isset($_GET['list_orders'])){
                     include('list_orders.php');
              }   
              if(isset($_GET['list_payments'])){
                     include('list_payments.php');
              }    
              if(isset($_GET['delete_payments'])){
                     include('delete_payments.php');
              }   
              if(isset($_GET['delete_orders'])){
                     include('delete_orders.php');
              } 
              if(isset($_GET['list_users'])){
                     include('list_users.php');
              }        
              if(isset($_GET['delete_users'])){
                     include('delete_users.php');
              }                                     
              if(isset($_GET['admin_registration'])){
                     include('admin_registration.php');
              }                            
              if(isset($_GET['admin_login'])){
                     include('admin_login.php');
              }                            

              ?>  
        </div>
        
        <!-- last child 
        <div class="bg-info p-0 text-center footer">
           <p>All rights © reserved  Designed by Yakouba_Goita-2023</p>
        </div>  -->
        <?php 
      include("../includes/footer.php");
     ?> 
</div>     

  <!-- bootstrap js link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" 
integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" 
integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>