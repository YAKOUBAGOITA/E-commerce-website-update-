<?php 
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_brands = mysqli_real_escape_string($con, $_POST['product_brands']);
    $product_categories = mysqli_real_escape_string($con, $_POST['product_categories']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_status = 'true';

    // Accessing images
    $product_image1 = isset($_FILES['product_image1']) ? $_FILES['product_image1']['name'] : null;
    $product_image2 = isset($_FILES['product_image2']) ? $_FILES['product_image2']['name'] : null;
    $product_image3 = isset($_FILES['product_image3']) ? $_FILES['product_image3']['name'] : null;

    // Accessing images temp name
    $temp_image1 = isset($_FILES['product_image1']) ? $_FILES['product_image1']['tmp_name'] : null;
    $temp_image2 = isset($_FILES['product_image2']) ? $_FILES['product_image2']['tmp_name'] : null;
    $temp_image3 = isset($_FILES['product_image3']) ? $_FILES['product_image3']['tmp_name'] : null;

    // Checking empty condition
    if(empty($product_title) || empty($description) || empty($product_categories) ||
       empty($product_brands) || empty($product_price) || empty($product_image1) ||
       empty($product_image2) || empty($product_image3)){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Insert query
        $insert_products = "INSERT INTO `products` (product_title, product_keywords, product_description,
            category_id, brand_id, product_image1, product_image2, product_image3,
            product_price, date, status) VALUES ('$product_title', '$product_keywords', '$description',
            '$product_categories', '$product_brands', '$product_image1', '$product_image2',
            '$product_image3', '$product_price', NOW(), '$product_status')";
        $result_query = mysqli_query($con, $insert_products);

        if($result_query){
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }
}
?>

<!--  HTML code  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h3 class="text-center">Insert Products</h3>
        
        <!-- Form -->
        <form action="" method="POST" enctype="multipart/form-data">
        <!-- title-->
        <div class="form-outline mb-4">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter product title" autocomplete="off" required="required">
        </div>

        <!-- description-->
        <div class="form-outline mb-4">
            <label for="description" class="form-label">Product description</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="Enter product description" autocomplete="off" required="required">
        </div>

        <!-- keywords-->
        <div class="form-outline mb-4">
            <label for="product_keywords" class="form-label">Product keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                placeholder="Enter product keyword" autocomplete="off" required="required">
        </div>
        
        <!-- categories options-->
        <div class="form-outline mb-4">
            <label for="product_categories" class="form-label">Select a Category</label>
            <select name="product_categories" id="product_categories" class="form-select">
                <option value="">Select a Category</option>
                <?php 
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while($row = mysqli_fetch_assoc($result_query)){
                        $category_title = $row['category_title']; 
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
            </select>
        </div>
             
        <!-- Brands options-->
        <div class="form-outline mb-4">
            <label for="product_brands" class="form-label">Select a Brand</label>
            <select name="product_brands" id="product_brands" class="form-select">
                <option value="">Select a Brand</option>
                <?php 
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while($row = mysqli_fetch_assoc($result_query)){
                        $brand_title = $row['brand_title']; 
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
            </select>
        </div>

        <!-- image1 -->
        <div class="form-outline mb-4">
            <label for="product_image1" class="form-label">Product image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
        </div>

        <!-- image2 -->
        <div class="form-outline mb-4">
            <label for="product_image2" class="form-label">Product image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
        </div>

        <!-- image3 -->
        <div class="form-outline mb-4">
            <label for="product_image3" class="form-label">Product image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
        </div>

        <!-- price-->
        <div class="form-outline mb-4">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter product price" autocomplete="off" required="required">
        </div>

        <div class="form-outline mb-4">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
        </div>

        </form>
    </div>
</body>
</html>
