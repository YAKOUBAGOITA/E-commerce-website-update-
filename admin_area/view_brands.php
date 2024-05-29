<h3 class="text-center text-success">All brands</h3>
<table class="table table-bordered mt-5">
    <thead>
        <tr class="text-center">
            <th>S1no</th>
            <th>brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $select_brand="Select* from `brands`";
        $result=mysqli_query($con, $select_brand);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        
        ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='index.php?edit_brands=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='' class='text-light'><i class='fa-solid  fa-trash'></i></a></td>
        </tr>
        <?php
        }  
         ?>
    </tbody>
</table>
