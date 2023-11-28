<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th class="bg-info text-light">SI no</th>
            <th class="bg-info text-light">category_title</th>
            <th class="bg-info text-light">Edit</th>
            <th class="bg-info text-light">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
            $select_query="select * from `categories`";
            $result=mysqli_query($con,$select_query);
            $number=0;
            while($row_fetch=mysqli_fetch_assoc($result)){
                $category_id=$row_fetch['category_id'];
                $category_title=$row_fetch['category_title'];
                $number++;
            
        ?>
        <tr class="text-center">
            <td class="bg-secondary text-light"><?php echo $number;?></td>
            <td class="bg-secondary text-light"><?php echo $category_title?></td>
            <td class="bg-secondary text-light"> <a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-dark'> <i class='fa-solid fa-pen-to-square'></i> </a></td>
            <td class="bg-secondary text-light"><a href='index.php?delete_category=<?php echo $category_id; ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>