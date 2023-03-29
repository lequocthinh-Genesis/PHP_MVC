<section class="add-products">

    <form action="" method="POST" enctype="multipart/form-data">
        <h3>Thêm sản phẩm mới</h3>
        <input type="text" class="box" required placeholder="Nhập tên sản phẩm" name="name">
        <input type="number" min="0" class="box" required placeholder="Nhập giá tiền" name="price">
        <textarea name="details" class="box" required placeholder="Nhập thông tin sản phẩm" cols="30" rows="10"></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
        <input type="submit" value="Thêm sản phẩm" name="add_product" class="btn">
    </form>

</section>

<section class="show-products">

    <div class="box-container">

        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
        <div class="box">
         
            <div class="price product-money"><?php echo $fetch_products['price']; ?></div>
            <img class="image" src="./mvc/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="details"><?php echo $fetch_products['details']; ?></div>
            <form action="update" method="POST">
                <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="product_id">
                <input type="submit" value="Cập nhật" class="option-btn" name="update">
            </form>
            <form action="" method="POST">
                <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="product_id">
                <input type="submit" value="Xóa sản phẩm" class="delete-btn" name="delete_product" onclick="return confirm('Bạn có muốn xóa sản phẩm ?');">
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