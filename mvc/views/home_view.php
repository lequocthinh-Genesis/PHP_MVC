
<section class="home">
    <div class="video-container">
        <video src="./public/images/FNG_robot.mov" id="video-slider" loop autoplay muted></video>
    </div>
</section>

<section class="products">

    <h1 class="title">Sản phẩm mới nhất</h1>

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
            
            <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="cart_pid">

            <div class="price product-money"><?php echo $fetch_products['price']; ?></div>
            <img src="./mvc/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <form action="" method="POST">
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

                <input type="submit" value="Yêu thích" name="add_to_wishlist" class="option-btn">

                <?php
                    }
                ?>
                <!--  -->

                <?php
                    if($user_id == "guest"){  
                ?>
            
            
                <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="option-btn" onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này. Bạn có muốn đăng nhập ngay ?');" >

                <?php
                    }
                    else{
                ?>

                <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="option-btn">
            
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

    <div class="more-btn">
        <a href="shop" class="option-btn text-decoration-none">Xem thêm</a>
    </div>

</section>
    
<section class="home_services" id="services">

    <div class="heading_service">
        <span>Dịch vụ của chúng tôi</span>
            <h1>Đảm bảo chất lượng</h1>
    </div>

    <div class="box-container">

        <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
            <i class="fas fa-globe"></i>
            <h3>Trên thế giới</h3>
            <p>Dịch vụ giao hàng của chúng tôi có cả trong nước và ngoài nước</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
            <i class="fa-solid fa-book"></i>
            <h3>Hàng chính hãng</h3>
            <p>Chúng tôi cam đoan những sản phẩm của chúng tôi là sản phẩm chính hãng</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
            <i class="fa-solid fa-shield"></i>
            <h3>Bảo hành</h3>
            <p>Dịch vụ bảo hàng sản phẩm trọn gói đảm bảo quyền lợi khách hàng</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="600">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <h3>Thanh toán</h3>
            <p>Nhiều hình thức thanh toán khác nhau giúp cho khách hàng thuận tiện</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="750">
            <i class="fas fa-wallet"></i>
            <h3>Giá cả phải chăng</h3>
            <p>Chúng tôi cam kết những sản phẩm bán ra đều đúng giá với thị trường</p>
        </div>

        <div class="box" data-aos="zoom-in-up" data-aos-delay="900">
            <i class="fas fa-headset"></i>
            <h3>Hỗ trợ 24/7</h3>
            <p>Bạn có thể liên hệ trực tiếp với chúng tôi qua sđt để được tư vấn và hỗ trợ</p>
        </div>

    </div>

</section>

<section class="about_home">

    <div class="flex">

        <div class="image">
            <img src="./public/images/Reading glasses-rafiki.png" alt="">
        </div>

        <div class="content">
            <h3>
                Về chúng tôi
            </h3>
            <p>
                FNG là tổ chức sáng lập ra bởi Lê Quốc Thịnh vào năm 2014, trãi qua nhiều khó khăn công ty đã dần hoàn thiện bộ máy tổ chức và bươc đầu tạo được chổ đứng cũng như thương hiệu trong thị trường thương mại điện tử trong nước việt nam và trên thế giới.
            </p>
            <a href="about" class="option-btn">Xem Thêm</a>
        </div>

    </div>

</section>

<section class="home-contact">

    <div class="content">
        <h3>Bạn có bất kỳ câu hỏi nào ?</h3>
        <p class="text-white">Hãy liên hệ với chúng tôi để được tư vấn và giải đáp các vấn đề của bạn</p>
        <a href="contact" class="option-btn">Liên Hệ</a>
    </div>

</section>
