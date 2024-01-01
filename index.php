<!-- connect file-->
<?php
include('includes/connect.php');
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
        <!-- ... (your existing code) ... -->
    </div>

    <!-- fourth child -->
    <div class="row">
        <div class="col-md-10">
            <!--Products-->
            <div class="row px-3">
                <!-- fetching products -->
                <?php
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
                $select_brands = "SELECT * FROM `brands`";
                $result_brands = mysqli_query($con, $select_brands);

                while ($row_data = mysqli_fetch_assoc($result_brands)) {
                    $brand_title = $row_data['brand_title'];
                    $brand_id = $row_data['brand_id'];
                    echo "<li class='nav-item'>
                            <a href='index.php?brand=$brand_id' class='nav-link text-light text-center'>$brand_title</a>
                          </li>";
                }
                ?>

                <!-- categories to be displayed -->
                <li class="nav-item bg-info">
                    <a href="" class="nav-link text-center">Categories</a>
                </li>
                <?php
                $select_categories = "SELECT * FROM `categories`";
                $result_categories = mysqli_query($con, $select_categories);

                while ($row_data = mysqli_fetch_assoc($result_categories)) {
                    $category_title = $row_data['category_title'];
                    $category_id = $row_data['category_id'];
                    echo "<li class='nav-item'>
                            <a href='index.php?category=$category_id' class='nav-link text-light text-center'>$category_title</a>
                          </li>";
                }
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
