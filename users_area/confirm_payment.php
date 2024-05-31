<?php
session_start();
include('../includes/connect.php');

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id']; // Corrected the typo from 'oder_id' to 'order_id'
   
    // Corrected the SQL query string
    $select_data = "SELECT * FROM `user_orders` WHERE order_id = $order_id";
    
    $result = mysqli_query($con, $select_data);
    if ($result) {
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'] ?? '';
        $amount_due = $row_fetch['amount_due'] ?? '';
    } else {
        // Handle query error
        $invoice_number = '';
        $amount_due = '';
        echo "Error: " . mysqli_error($con);
    }
} else {
    $invoice_number = '';
    $amount_due = '';
}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'] ?? '';
    $amount=$_POST['amount'] ?? '';
    $payment_mode=$_POST['payment_mode'] ?? '';
    $insert_query="insert into `user_payments` (order_id, invoice_number, amount,payment_mode)
    values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Successfully completed the payment</h3> ";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5">
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-light">Invoice Number</label>
               <input type="text" class="form-control w-50 m-auto"  name="invoice_number"
               value="<?php echo htmlspecialchars($invoice_number); ?>"> 
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
               <input type="text" class="form-control w-50 m-auto"  name="amount"
               value="<?php echo htmlspecialchars($amount_due); ?>">  
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode" class="form-select w-50 m-auto">
                <option>Select Payment Mode</option>
                <option>UPI</option>
                <option>Netbanking</option>
                <option>PayPal</option>
                <option>Cash on Delivery</option>
                <option>Payoffline</option>
               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <input type="submit" class="btn btn-primary py-2 px-3 border-0" value="Confirm" 
               name="confirm_payment">
            </div>
        </form>
    </div>
<!-- bootstrap -->
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
