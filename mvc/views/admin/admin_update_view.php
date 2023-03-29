<section class="update-product">

    <?php

        $update_id = $_POST['product_id'];
        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
        if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
    ?>

    <form action="update" method="post" enctype="multipart/form-data">
        <img src="./mvc/uploaded_img/<?php echo $fetch_products['image']; ?>" class="image"  alt="">
        <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="update_p_id">
        <input type="hidden" value="<?php echo $fetch_products['image']; ?>" name="update_p_image">
        <input type="text" class="box" value="<?php echo $fetch_products['name']; ?>" required placeholder="Cập nhật tên sản phẩm" name="name">
        <input type="number" min="0" class="box" value="<?php echo $fetch_products['price']; ?>" required placeholder="cập nhật giá" name="price">
        <textarea name="details" class="box" required placeholder="cập nhật thông tin sản phẩm" cols="30" rows="10"><?php echo $fetch_products['details']; ?></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" name="image">

        <input type="submit" value="Cập nhật sản phẩm" name="update_product" class="option-btn">
        <a href="product" class="option-btn">Trở về</a>

        <input type="hidden" value="<?php echo $update_id ?>" name="product_id">

    </form>

    <?php
            }
        }else{
            echo '<p class="empty">Không có sản phẩm để cập nhật</p>';
        }
    ?>

</section>