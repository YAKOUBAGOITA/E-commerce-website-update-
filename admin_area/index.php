
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
                          <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                          </li>
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
                    <p class="text-light text-center">Admin Name</p>
                   </div>
                   <div class="button text-center p-0 ">
                     <!-- button*10>a.nav-link.text-light.bg-info -->
                     <button class="my-0"><a href="index.php?in_product" class="nav-link text-light bg-info">Insert Products</a></button>
                     <button class="my-0"><a href="" class="nav-link text-light bg-info">View Products</a></button>
                     <button class="my-0"><a href="index.php?in_category" class="nav-link text-light bg-info">Insert Categories</a></button>
                     <button class="my-0"><a href="" class="nav-link text-light bg-info">View categories</a></button>
                     <button class="my-0"><a href="index.php?in_brand" class="nav-link text-light bg-info">Insert Brands</a></button>
                     <button class="my-0"><a href="" class="nav-link text-light bg-info">View Brands</a></button>
                     <button class="my-0"><a href="" class="nav-link text-light bg-info">All orders</a></button>
                     <button class="my-0"><a href="" class="nav-link text-light bg-info">All Payments</a></button>
                     <button class="my-0"><a href="" class="nav-link text-light bg-info">List users</a></button>
                     <button class="my-0"><a href="" class="nav-link text-light bg-info">Logout</a></button>
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
              ?>  
        </div>
        
        <!-- last child -->
        <div class="bg-info p-0 text-center footer">
           <p>All rights © reserved  Designed by Yakouba_Goita-2023</p>
        </div>  

</div>     

  <!-- bootstrap js link --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
crossorigin="anonymous"></script>

</body>
</html>