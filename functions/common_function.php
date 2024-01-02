<?php 
// includind connect file
include('./includes/connect.php');
//getting products
 function getproducts(){
        global $con;  

        //condition to check isset or not
       $select_query = "SELECT * FROM `products`order by rand()";
     
       $result_query = mysqli_query($con, $select_query);

       while ($row = mysqli_fetch_assoc($result_query)) {
           $product_id = mysqli_real_escape_string($con, $row['product_id']);
           $product_title = mysqli_real_escape_string($con, $row['product_title']);
           $product_description = mysqli_real_escape_string($con, $row['product_description']);
           $product_image1 = $row['product_image1'];
           $product_price = $row['product_price'];
           $category_id = $row['category_id'];
           $brand_id = $row['brand_id'];
          ?>

           <div class="col-md-4 mb-2">
             <div class="card">
                 <img src="./admin_area/product_images/<?php echo $product_image1; ?>" 
                 class="card-img-top" alt="product_title">
                 <div class="card-body">
                     <h5 class="card-title"><?php echo $product_title; ?></h5>
                     <p class="card-text"><?php echo $product_description; ?></p>
                     <div class="d-flex p-0">
                         <a href="#" class="btn bg-info">Add to cart</a>
                         <a href="#" class="btn bg-secondary">View more</a>
                     </div>
                 </div>
             </div>
         </div>
     <?php
       }
 }

 //displaying brands in sidenav
function getbrands(){
       global $con;
       $select_brands = "SELECT * FROM `brands`";
       $result_brands = mysqli_query($con, $select_brands);
       while ($row_data = mysqli_fetch_assoc($result_brands)) {
           $brand_title = $row_data['brand_title'];
           $brand_id = $row_data['brand_id'];
           echo "<li class='nav-item'>
                   <a href='index.php?brand=$brand_id'
                    class='nav-link text-light text-center'
                    >$brand_title</a>
                 </li>";
       }
 }
 //displaying categories in sidenav
 function getcategories(){
       global $con;
       $select_categories = "SELECT * FROM `categories`";
       $result_categories = mysqli_query($con, $select_categories);
       while ($row_data = mysqli_fetch_assoc($result_categories)) {
           $category_title = $row_data['category_title'];
           $category_id = $row_data['category_id'];
           echo "<li class='nav-item'>
                   <a href='index.php?category=$category_id'
                    class='nav-link text-light text-center'>$category_title</a>
                 </li>";
       }

 }

?>