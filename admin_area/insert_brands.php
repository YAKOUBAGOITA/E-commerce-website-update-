<?php 
 include('../includes/connect.php');
 $brand_title='';
 if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'] ;

    //select data from database
    $select_query="Select*from `brands` where
    brand_title='$brand_title'";
    $result_select=mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);
   if($number>0){
      echo"<script>alert('This brand is present inside the database')</script>";
   }else{
      
    $insert_query="insert into `brands`(brand_title) 
    values('$brand_title')"; 
    $result=mysqli_query($con, $insert_query);
    if($result){
      echo"<script>alert('brand has been inserted successfully')</script>";
    }} 
 }
 ?>
  <h3 class="text-center">Intsert brands</h3>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
       <span class="input-group-text bg-info" id="basic-addon1">
       <i class="fa-solid fa-receipt"></i></span>
       <input type="text" class="form-control border-1"
       name="brand_title" placeholder="Insert brands"
       arial-label="Brands" aria-describedby="basic-addon1">  
  </div>
  <div class="input-group w-10 mb-2 m-auto">

     <input type="submit" class="bg-info border-0 p-2 my-0"
     name="insert_brand" value="Insert brands" class="bg-info">  
</div> 

</form>
