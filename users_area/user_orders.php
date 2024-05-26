<?php 
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if 'username' is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    die("Error: User not logged in. Please log in to view your orders.");
}

// Database connection
$con = mysqli_connect("localhost", "root", "Yakouba@12345", "mystore");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user details
$get_user = "SELECT * FROM `user_table` WHERE username = '$username'";
$result = mysqli_query($con, $get_user);

if ($result) {
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    //echo $user_id;
} else {
    die("Error fetching user details: " . mysqli_error($con));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My orders</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-success text-center">All orders</h3>
    <table class="table table-bordered mt-5 bg-info">
        <thead class="bg-info">
            <tr class="bg-info">
                <th>SI no</th>
                <th>Amount Due</th>
                <th>Total products</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
<?php 
// Fetch order details
$get_order_details = "SELECT * FROM `user_orders` WHERE user_id = $user_id";
$result_orders = mysqli_query($con, $get_order_details);

if ($result_orders) {
    $number = 1;
    while ($row_orders = mysqli_fetch_assoc($result_orders)) {
        $order_id = $row_orders['order_id'];
        $amount_due = $row_orders['amount_due'];
        $total_products = $row_orders['total_products'];
        $invoice_number = $row_orders['invoice_number'];
        $order_date = $row_orders['order_date'];
        $order_status = $row_orders['order_status'];
        if($order_status=='Pending'){
            $order_status='Incomplete';
        }else{
            $order_status='Complete';
        }    
        
        echo "
        <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>
            <?php 
            
            if($order_status=='Complete'){
                echo "<td>Paid</td>";
            }else{
                echo  "<td><a href='confirm_payment.php?order_id=$order_id'
             class='text-light'>Confirm</a></td></tr>"; 
        }    
        $number++;
    }
} else {
    echo "<tr><td colspan='7'>No orders found.</td></tr>";
}
?>         
        </tbody>
    </table>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
