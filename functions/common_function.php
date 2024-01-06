<?php 
// includind connect file
include('C:\Desktop\htdocs\E-Commerce Website\includes\connect.php');
//getting products
 function getproducts(){
        global $con;  

        //condition to check isset or not
        if(!isset($_GET['category'])){
              if(!isset($_GET['brand'])){
       $select_query = 'SELECT * FROM `products`order by rand() LIMIT 0,4' ;
     
       $result_query = mysqli_query($con, $select_query);

       while ($row = mysqli_fetch_assoc($result_query)) {
           $product_id = mysqli_real_escape_string($con, $row['product_id']);
           $product_title = mysqli_real_escape_string($con, $row['product_title']);
           $product_description = mysqli_real_escape_string($con, 
           $row['product_description']);
           $product_image1 = $row['product_image1'];
           $product_price = $row['product_price'];
           $category_id = $row['category_id'];
           $brand_id = $row['brand_id'];
          ?>

           <div class='col-md-4 mb-2'>
             <div class='card'>
                 <img src='./admin_area/product_images/<?php echo $product_image1; ?>' 
                 class='card-img-top' alt='product_title'>
                 <div class='card-body'>
                     <h5 class='card-title'><?php echo $product_title; ?></h5>
                     <p class='card-text'><?php echo $product_description; ?></p>
                     <p class='card-text'> Price:<?php echo $product_price; ?></p>
                     <div class='d-flex p-0'>
                     <a href='index.php?add_to_cart=<?php echo $product_id ?>'
                     class='btn bg-info'>Add to cart</a>
                     <a href="product_details.php?product_id=<?php echo $product_id; ?>"
                      class='btn bg-secondary'>View more</a>
                     </div>
                 </div>
             </div>
         </div>
     <?php
       }
   }
 }
}



 //getting unique categories
  function get_unique_categories(){
       global $con;  

       //condition to check isset or not
       if(isset($_GET['category'])){
      $category_id= $_GET['category'];
      $select_query = "SELECT * FROM `products` where category_id=$category_id";
      $result_query = mysqli_query($con, $select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
             echo"<h2 class='text-center text-danger'>No stock for this 
             category.</h2>";
      }

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
                    <p class='card-text'> Price:<?php echo $product_price; ?></p>
                    <div class="d-flex p-0">
                    <a href='index.php?add_to_cart=<?php echo $product_id ?>'
                    class='btn bg-info'>Add to cart</a>
                    <a href="product_details.php?product_id=<?php echo $product_id; ?>"
                     class='btn bg-secondary'>View more</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
      }
  }
}


// getting all products
function get_all_product(){
       global $con;  

       //condition to check isset or not
       if(!isset($_GET['category'])){
             if(!isset($_GET['brand'])){
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
                    <p class='card-text'> Price:<?php echo $product_price; ?></p>
                    <div class="d-flex p-0">
                    <a href='index.php?add_to_cart=<?php echo $product_id ?>'
                   class='btn bg-info'>Add to cart</a>
                   <a href="product_details.php?product_id=<?php echo $product_id; ?>"
                    class='btn bg-secondary'>View more</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
      }
  }
}
}




//getting unique brands
function get_unique_brands(){
       global $con;  

       //condition to check isset or not
       if(isset($_GET['brand'])){
      $brand_id= $_GET['brand'];
      $select_query = "SELECT * FROM `products` where brand_id=$brand_id";
      $result_query = mysqli_query($con, $select_query);
       $num_of_rows=mysqli_num_rows($result_query);
       if($num_of_rows==0){
              echo"<h2 class='text-center text-danger'>This brand is not
               available for service</h2>";
       }
      while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id =mysqli_real_escape_string($con,   $row['product_id']);
          $product_title = mysqli_real_escape_string($con, $row['product_title']);
          $product_description = mysqli_real_escape_string
          ($con, $row['product_description']);
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
                    <p class='card-text'> Price:<?php echo $product_price; ?></p>
                    <div class="d-flex p-0">
                    <a href='index.php?add_to_cart=<?php echo $product_id ?>'
                    class='btn bg-info'>Add to cart</a>
                    <a href="product_details.php?product_id=<?php echo $product_id; ?>"
                     class='btn bg-secondary'>View more</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
      }
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

// seraching products function
function search_product(){
              global $con;  
      
              //condition to check isset or not 
           if(isset($_GET['search_data_product'])){  
              $search_data_value=$_GET['search_data'];             
            $search_query = "SELECT * FROM `products`where product_keywords like '%$search_data_value%' ";         
             $result_query = mysqli_query($con, $search_query);
             $num_of_rows=mysqli_num_rows($result_query);
             if($num_of_rows==0){
                    echo"<h2 class='text-center text-danger'> No results
                   match. No products found on this category!</h2>";
             }
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
                           <p class='card-text'> Price:<?php echo $product_price; ?></p>
                           <div class="d-flex p-0">
                           <a href='index.php?add_to_cart=<?php echo $product_id ?>'
                          class='btn bg-info'>Add to cart</a>
                          <a href="product_details.php?product_id=<?php echo $product_id; ?>"
                           class='btn bg-secondary'>View more</a>
                           </div>
                       </div>
                   </div>
               </div>
           <?php
             }
         }
       }

       // view details function
    function view_details(){
            global $con;  
            //condition to check isset or not
            if(isset($_GET['product_id'])){
            if(!isset($_GET['category'])){
                  if(!isset($_GET['brand'])){
                    $product_id=$_GET['product_id'];
           $select_query = "SELECT * FROM `products` where 
           product_id=$product_id";
         
           $result_query = mysqli_query($con, $select_query);
           while ($row = mysqli_fetch_assoc($result_query)) {
               $product_id = mysqli_real_escape_string($con, $row['product_id']);
               $product_title = mysqli_real_escape_string($con, $row['product_title']);
               $product_description = mysqli_real_escape_string($con, 
               $row['product_description']);
               $product_image1 = $row['product_image1'];
               $product_image2 = $row['product_image2'];
               $product_image3 = $row['product_image3'];
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
                         <p class='card-text'> Price:<?php echo $product_price; ?></p>
                         <div class="d-flex p-0">
                         <a href='index.php?add_to_cart=<?php echo $product_id ?>'
                         class='btn bg-info'>Add to cart</a>
                         <a href="index.php" class='btn bg-secondary'>Go home</a>
                         </div>
                     </div>
                 </div>
             </div>

             <div class='col-md-8'>
          <!-- related images -->
          <div class='row'>
               <div class='col-md-12'>
                      <h4 class='text-center text-info mb-5'>
                             Related products</h4>
               </div>
               <div class='col-md-6'>
               <img src='./admin_area/product_images/<?php echo $product_image2; ?>' 
                 class='card-img-top' alt='$product_title'>
               </div>
               <div class='col-md-6'>
               <img src='./admin_area/product_images/<?php echo $product_image3; ?>' 
                class='card-img-top' alt='$product_title'>
               </div>
                      
          </div>
           </div>
         
         <?php
           }
       }
      }
     }

    }

    //get ip address function
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    //$ip = getIPAddress();  
    //echo 'User Real IP Address - '.$ip;  
      

     //cart function
     // cart function
function cart() {
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'
         AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present in the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) 
            VALUES ($get_product_id, '$get_ip_add', 0)";
            $result_insert = mysqli_query($con, $insert_query);

            if ($result_insert) {
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>alert('Failed to add item to cart')</script>";
            }
        }
    }
}

// function to get cart number
function cart_item(){
    if (isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        } else {
            global $con;
           $get_ip_add = getIPAddress();
           $select_query = "SELECT * FROM `cart_details`
            WHERE ip_address='$get_ip_add'";
           $result_query = mysqli_query($con, $select_query);
           $count_cart_items = mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }
?>