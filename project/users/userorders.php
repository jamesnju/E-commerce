<h3 class="text-center text-success">All my orders</h3>
<table class="table table-bordered mt-5">
    <?php
    //fetching user id fromthe database
        $username=$_SESSION['username'];
        $get_user="select * from `regislation` where username='$username'";
        $result_user=mysqli_query($con,$get_user);
        $fetch_user=mysqli_fetch_assoc($result_user);
        $user_id=$fetch_user['user_id'];
    ?>
    <?php
        //accessing data in the database of the user orders
        $get_data="select * from `user_orders` where user_id=$user_id";
        $result_data=mysqli_query($con,$get_data);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_data)){
            $order_id=$row_orders['order_id'];
            //$user_id=$row_orders['user_id'];	
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];		
            $order_date=$row_orders['order_date'];
            $order_status=$row_orders['order_status'];
            if($order_status==='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }
            
            

            echo "<tr>
            <td class='bg-primary text-light'>$number</td>
            <td class='bg-primary text-light'>$amount_due</td>
            <td class='bg-primary text-light'>$total_products</td>
            <td class='bg-primary text-light'>$invoice_number</td>
            <td class='bg-primary text-light'>$order_date</td>
            <td class='bg-primary text-light'>$order_status</td>";
            ?>
            <?php
            if($order_status=='Complete'){
                echo "<td class='bg-primary text-light'>Paid</td>";
            }else{
                echo "<td class='bg-primary text-light'><a href='confirmpayment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>
                </tr>";

            }
            
        $number++;
        }
    ?>
    <thead>
        <tr>
            
            <th class="bg-secondary">SI no</th>
            <th class="bg-secondary">Amount Due</th>
            <th class="bg-secondary">Total Products</th>
            <th class="bg-secondary">Invoice number</th>
            <th class="bg-secondary">Date</th>
            <th class="bg-secondary">Complete/Incomplete</th>
            <th class="bg-secondary">status</th>
        </tr>
    </thead>
    <tbody >
        
    </tbody>
</table>