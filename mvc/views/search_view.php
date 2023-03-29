<section class="heading">
    <h3>Tìm kiếm</h3>
</section>

<section class="search-form">
    <form action="" method="POST">
        <input type="text" class="box" placeholder="Tìm kiếm sản phẩm..." name="search_box">
        <input type="submit" class="option-btn" value="Tìm" name="search_btn">
    </form>
</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">

        <?php
            $conn = $data["dtb"];
            if(isset($_POST['search_btn'])){
                $search_box = mysqli_real_escape_string($conn, $_POST['search_box']);
                $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
            <form action="detail" method="POST">
                <button type="submit" name="detail">
                    <i class="fas fa-eye"></i>
                </button>
                <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="cart_pid">

            </form>

            <form action="" method="POST">
                <div class="price product-money"><?php echo $fetch_products['price']; ?></div>
                <img src="./mvc/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
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
                    echo '<p class="empty">Không tìm thấy kết quả</p>';
                }
            }else{
                echo '<p class="empty">Hãy gõ vào ô tìm kiếm</p>';
            }
        ?>

    </div>

</section>