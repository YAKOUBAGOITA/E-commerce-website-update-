<?php

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'] ?? '';
    // echo $edit_id;
    $get_products = "SELECT * FROM `products` WHERE product_id = $edit_id";  // Fixed assignment
    $result = mysqli_query($con, $get_products);  // Fixed variable name
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $product_title = $row['product_title'];
           // echo $product_title;
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];

            //fetching categories from database
            $select_category="Select* from `categories` where category_id=$category_id";
            $result_category=mysqli_query($con,$select_category);
            $row_category=mysqli_fetch_assoc($result_category);
            $category_title=$row_category['category_title'];
             

              //fetching brands from database
            $select_brand="Select* from `brands` where brand_id=$brand_id";
            $result_brand=mysqli_query($con,$select_brand);
            $row_brand=mysqli_fetch_assoc($result_brand);
            $brand_title=$row_brand['brand_title'];
             

        } else {
            echo "No product found with the given ID.";
        }
    }
} else {
    echo "Query failed: " . mysqli_error($con);

}

?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" id="product_title" value="<?php echo $product_title?>"
          name="product_title" class="form-control" required="required">
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
        <label for="product_desc" class="form-label">Product Description</label>
        <input type="txt" id="product_desc"  value="<?php echo $product_description ?>" 
        name="product_desc" class="form-control" required="required">
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
        <label for="product_keywords" class="form-label">Product keywords</label>
        <input type="text" id="product_keywords" value="<?php echo $product_keywords ?>"
         name="product_keywords" class="form-control" required="required">
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
    <label for="product_category" class="form-label">Product Categories</label>
        <select name="product_category" class="form-select">
            <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>
            <?php 
             $select_category_all="Select* from `categories`";
             $result_category_all=mysqli_query($con,$select_category_all);
             while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                $category_title=$row_category_all['category_title'];
                $category_id=$row_category_all['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
             };
             
            ?>
           
        </select>
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
    <label for="product_brand" class="form-label">Product Brands</label>
        <select name="product_brands" class="form-select">
            <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
            <?php 
             $select_brand_all="Select* from `brands`";
             $result_brand_all=mysqli_query($con,$select_brand_all);
             while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                $brand_title=$row_brand_all['brand_title'];
                $brand_id=$row_brand_all['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";
             };
             
            ?>
            
        </select>
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
        <label for="product_image1" class="form-label">Product Image1</label>
         <div class="d-flex">
         <input type="file" id="product_image1" name="product_image1" 
         class="form-control w-50 m-auto" required="required">
         <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">
        </div>        
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
        <label for="product_image2" class="form-label">Product Image2</label>
         <div class="d-flex">
         <input type="file" id="product_image2" name="product_image2" 
         class="form-control w-50 m-auto" required="required">
         <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
        </div>        
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
        <label for="product_image3" class="form-label">Product Image3</label>
         <div class="d-flex">
         <input type="file" id="product_image3" name="product_image3" 
         class="form-control w-50 m-auto" required="required">
         <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img">
        </div>        
    </div>
    <div class="form-outline w-50 m-auto mb-4 ">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" 
        class="form-control" required="required">
    </div>
     <div class="w-50 m-auto">
       <input type="submit" name="edit_product" value="update product"
        class="btn btn-info px-3 mb-3">
     </div>
    </form>
</div>