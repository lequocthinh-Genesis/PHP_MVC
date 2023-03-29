<?php
    if($user_id == "guest"){
        header('location:login');
    }

?>

<section class="shopping-cart">

    <h1 class="title">Sản phẩm trong giỏ</h1>

    <div class="box-container">

    <?php
        $grand_total = 0;
        $conn = $data["dtb"];
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
    ?>
    <div  class="box">
        <form action="" method="post" >
            <input type="submit" value="X" class="fas fa-times" onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?');" name="delete_product_cart" >
            <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
            
        </form>
        <form action="detail" method="post" >
            <button type="submit" name="detail">
                <i class="fas fa-eye"></i>
            </button>
            <input type="hidden" value="<?php echo $fetch_cart['pid']; ?>" name="cart_pid">
        </form>

        <img src="./mvc/uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="" class="image">
        <div class="name"><?php echo $fetch_cart['name']; ?></div>
        <div class="price product-money"><?php echo $fetch_cart['price']; ?></div>
        <form action="" method="post">
            <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="cart_id">
            <input type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>" name="cart_quantity" class="qty">
            <input type="submit" value="update" class="option-btn" name="update_quantity">
        </form>
        <div class="sub-total"> Tổng cộng : <span class="product-money"><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></span> </div>
    </div>
    <?php
                $grand_total += $sub_total;
            }
        }else{
            echo '<p class="empty">giỏ hàng của bạn đang trống</p>';
        }
    ?>
    </div>

    <form action="" method="post" >
        <div class="more-btn">
                <input type="submit" value="Xóa tất cả" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete this from cart?');" name="delete_all_product_cart" >
        </div>
    </form>
    
    <div class="cart-total">
        <p>Tổng giá trị : <span class="product-money"><?php echo $grand_total; ?></span></p>
        <a href="shop" class="option-btn">Tiếp tục mua sắm</a>
        <a href="checkout" class="option-btn  <?php echo ($grand_total > 1)?'':'disabled' ?>">Thanh toán</a>
    </div>

</section>