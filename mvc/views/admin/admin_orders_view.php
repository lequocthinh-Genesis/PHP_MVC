<section class="placed-orders">

    <h1 class="title">Danh sách đơn hàng</h1>

    <div class="box-container">

        <?php
      
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            if(mysqli_num_rows($select_orders) > 0){
                while($fetch_orders = mysqli_fetch_assoc($select_orders)){
        ?>
        <div class="box">
            <p> user id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
            <p> Ngày đặt : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
            <p> Tên khách hàng : <span><?php echo $fetch_orders['name']; ?></span> </p>
            <p> Số điện thoại : <span><?php echo $fetch_orders['number']; ?></span> </p>
            <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
            <p> Địa chỉ : <span><?php echo $fetch_orders['address']; ?></span> </p>
            <p> Sản phẩm : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
            <p> Tổng giá trị : <span class="product-money"><?php echo $fetch_orders['total_price']; ?>/-</span> </p>
            <p> Phương thức thanh toán : <span><?php echo $fetch_orders['method']; ?></span> </p>
            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <select name="update_payment">
                    <option disabled selected><?php echo $fetch_orders['payment_status']; ?></option>
                    <option value="Chưa xác nhận">Chưa xác nhận</option>
                    <option value="Đã xác nhận">Đã xác nhận</option>
                </select>
                <input type="submit" name="update_order" value="Cập nhật" class="option-btn">
            </form>
            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            
                <input type="submit" name="delete_order" value="Xóa" class="delete-btn" onclick="return confirm('Bạn muốn xóa đơn hàng này ?');">
            </form>
        </div>
        <?php
                }  
            }else{
                echo '<p class="empty">no orders placed yet!</p>';
            }
        ?>
    </div>

</section>