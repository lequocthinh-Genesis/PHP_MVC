<?php
    if($user_id == "guest"){
        header('location:login');
    }

?>

<section class="wishlist">

    <h1 class="title">Danh sách yêu thích</h1>

    <div class="box-container">

    <?php
        $grand_total = 0;
        $conn = $data["dtb"];
        $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_wishlist) > 0){
            while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){
    ?>
    <div  class="box">
        <form action="" method="POST">
            <input type="submit" value="X" class="fas fa-times" onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi danh sách yêu thích ?');" name="delete_product_wishlist" >
            <input type="hidden" name="product_wishlist_id" value="<?php echo $fetch_wishlist['id']; ?>">
        
        </form>
        
        <form action="detail" method="post" >
            <button type="submit" name="detail">
                <i class="fas fa-eye"></i>
            </button>
            <input type="hidden" value="<?php echo $fetch_wishlist['pid']; ?>" name="cart_pid">
            
        </form>
        
        <img src="./mvc/uploaded_img/<?php echo $fetch_wishlist['image']; ?>" alt="" class="image">
        <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
        <div class="price product-money"><?php echo $fetch_wishlist['price']; ?></div>
        <form action="" method="post">
            <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['pid']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
            <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="option-btn">

        </form>
        
    </div>
    <?php
                $grand_total += $fetch_wishlist['price'];
            }
        }else{
            echo '<p class="empty">danh sách yêu thích của bạn đang trống</p>';
        }
    ?>
    </div>

    <div class="wishlist-total">
        <p>Tổng giá trị : <span class="product-money"><?php echo $grand_total; ?></span></p>
        <a href="shop" class="option-btn">Tiếp tục mua sắm</a>
        <form action="" method="post" >
            <input type="submit" value="Xóa tất cả" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete this from cart?');" name="delete_all_wishlist" >
            
        
        </form>
    </div>

</section>