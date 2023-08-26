<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th class="bg-info text-light">SI no</th>
            <th class="bg-info text-light">Brand title</th>
            <th class="bg-info text-light">Edit</th>
            <th class="bg-info text-light">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
            $select_query="select * from `brands`";
            $result=mysqli_query($con,$select_query);
            $number=0;
            while($row_fetch=mysqli_fetch_assoc($result)){
                $brand_id=$row_fetch['brand_id'];
                $brand_title=$row_fetch['brand_title'];
                $number++;
            
        ?>
        <tr class="text-center">
            <td class="bg-secondary text-light">
                <?php echo $number;?></td>
            <td class="bg-secondary text-light">
                <?php echo $brand_title?></td>
            <td class="bg-secondary text-light">
                 <a href='index.php?edit_brands=<?php echo $brand_id; ?>'
                  class='text-dark'> <i class='fa-solid fa-pen-to-square'></i> </a></td>
            <td class="bg-secondary text-light">
                <a href='index.php?delete_brands=<?php echo $brand_id; ?>'
                type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal">
                <i class='fa-solid fa-trash'></i></a></td>
                
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h5>A you sure you want to delete this brand</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?viewbrands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brands=<?php echo $brand_id; ?>'
                class=" text-light text-decoration-none">
                Yes</a></button>
      </div>
    </div>
  </div>
</div>
