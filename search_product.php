<!-- connect file-->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>

    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child-->
        <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
     aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-0 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping">

          </i><sup><?php cart_item(); ?></sup></a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price() ;?> /-</a>
        </li>
      </ul>
      <form class="d-flex p-0" action="" method="get">
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
           <li class="nav-item">   
              <a class="nav-link" href="#">Welcome Guest</a>    
            </li>
            <li class="nav-item">   
               <a class="nav-link" href="./users_area/user_login.php">Login</a>   
            </li>
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
        <div class="col-md-10">
            <!--Products-->
            <div class="row px-3">

                <!-- fetching products -->
                <?php
                // calling function
                    search_product();
                    get_unique_categories();
                    get_unique_brands();   
                ?>

            </div>
        </div>

        <!-- sidenav -->
        <div class="col-md-2 bg-secondary p-0">
            <ul class="navbar-nav me-auto">

                <!-- brands to be displayed -->
                <li class="nav-item bg-info">
                    <a href="" class="nav-link">Delivery Brands</a>
                </li>

                <?php
            getbrands();
                ?>

                <!-- categories to be displayed -->
                <li class="nav-item bg-info">
                    <a href="" class="nav-link text-center">Categories</a>
                </li>
                <?php
                    getcategories();
                ?>
            </ul>
        </div>
    </div>

    <!-- last child -->
    <div class="bg-info p-3 text-center">
        <p>All rights © reserved Designed by Yakouba_Goita-2023</p>
    </div>

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>