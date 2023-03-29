<!-- <section class="heading">
    <img src="./public/images/Ecommerce web page-bro.png" alt="">
    <h3>our shop</h3>
    <p> <a href="home.php">home</a> / shop </p>
</section> -->

<section class="products">

    <h1 class="title">Tất cả sản phẩm</h1>

    <div class="box-container">

        <?php
            $select_products = $data["product"];
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <form action="detail" method="post" >
                <button type="submit" name="detail">
                    <i class="fas fa-eye"></i>
                </button>
                <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="cart_pid">
            
            </form>
            <div class="price product-money"><?php echo $fetch_products['price']; ?></div>
            <img src="./mvc/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <form action="" method="post" >
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
        </div>
        <?php
                }
            }else{
                echo '<p class="empty">Chưa có sản phẩm nào</p>';
            }
        ?>

    </div>

</section>