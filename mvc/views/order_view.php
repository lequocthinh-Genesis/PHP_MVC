<?php
    if($user_id == "guest"){
        header('location:login');
    }

?>

<section class="placed-orders">

    <h1 class="title">Đơn hàng đã đặt</h1>

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> Ngày đặt : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> Tên khách hàng : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> Số điện thoại : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> Địa chỉ : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> Phương thức thanh toán : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> Sản phẩm đã đặt : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> Tổng giá trị : <span class="product-money"><?php echo $fetch_orders['total_price']; ?></span> </p>
        <p> Trạng thái thanh toán : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty" id="empty" >Bạn chưa có đơn hàng nào</p>';
    }
    ?>
    </div>

</section>