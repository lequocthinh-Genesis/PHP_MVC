<section class="quick-view">

    <h1 class="title">Chi tiết sản phẩm</h1>

    <?php  
        if(isset($_POST['detail'])){
            $pid = $_POST['cart_pid'];
            $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'") or die('query failed');
        if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
    ?>
    <form action="detail" method="POST">
        <img src="./mvc/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
        <div class="name"><?php echo $fetch_products['name']; ?></div>
        <div class="price product-money"><?php echo $fetch_products['price']; ?></div>
        <div class="details"><?php echo $fetch_products['details']; ?></div>
        <input type="number" name="product_quantity" value="1" min="0" class="qty">
        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

        <!--  -->

        <?php
            if($user_id == "guest"){  
                
        ?>
            
        <input type="submit" value="yêu thích" name="add_to_wishlist" class="option-btn" onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này. Bạn có muốn đăng nhập ngay ?');">
            
        <?php
            }
            else{
        ?>

        <input type="submit" value="yêu thích" name="add_to_wishlist" class="option-btn">

        <?php
            }
        ?>

        <!--  -->

        <?php
            if($user_id == "guest"){  
                
        ?>

        <input type="submit" value="thêm vào giỏ hàng" name="add_to_cart" class="option-btn" onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này. Bạn có muốn đăng nhập ngay ?');" >

        <?php
            }
            else{
        ?>

        <input type="submit" value="thêm vào giỏ hàng" name="add_to_cart" class="option-btn">
                            
        <?php
            }
        ?>

        <!--  -->

    </form>
    <?php
            }
        }else{
        echo '<p class="empty">Không có chi tiết sản phẩm</p>';
        }
    }
    ?>

    <div class="more-btn">
        <a href="home" class="option-btn">Trang chủ</a>
    </div>

</section>