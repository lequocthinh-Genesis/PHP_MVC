
<section class="display-order">
    <?php
        $grand_total = 0;
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
    ?>    
    <p> <?php echo $fetch_cart['name'] ?> ( <span class="product-money"><?php echo $fetch_cart['price'] ?></span> <?php echo ' x '.$fetch_cart['quantity']; ?> ) </p>
    <?php
            }
        }else{
            echo '<p class="empty">Chưa có sản phẩm nào</p>';
        }
    ?>
    <div class="grand-total">Tổng cộng : <span class="product-money"><?php echo $grand_total; ?></span></div>
</section>

<section class="checkout">

    <form action="" method="POST">

        <h3>Thông tin đặt hàng</h3>

        <div class="flex">
            <div class="inputBox">
                <span>Họ và tên :</span>
                <input type="text" name="name" placeholder="Nhập vào họ và tên của bạn">
            </div>
            <div class="inputBox">
                <span>Số điện thoại :</span>
                <input type="number" name="number" min="0" placeholder="nhập vào số điện thoại của bạn">
            </div>
            <div class="inputBox">
                <span>Email của bạn :</span>
                <input type="email" name="email" placeholder="Nhập vào email của bạn">
            </div>
            <div class="inputBox">
                <span>Phương thức thanh toán :</span>
                <select name="method">
                    <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                    <option value="Thanh toán qua thẻ tín dụng">Thanh toán qua thẻ tín dụng</option>
                    <option value="Thanh toán qua ví Momo">Thanh toán qua ví Momo</option>
                    <option value="Thanh toán qua zalo pay">Thanh toán qua zalo pay</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Số nhà :</span>
                <input type="text" name="flat" placeholder="Nhập vào số nhà">
            </div>
            <div class="inputBox">
                <span>Tên đường :</span>
                <input type="text" name="street" placeholder="Nhập vào tên đường">
            </div>
            <div class="inputBox">
                <span>Quận/Huyện :</span>
                <input type="text" name="city" placeholder="Nhập vào tên Quận/Huyện">
            </div>
            <div class="inputBox">
                <span>Thành Phố :</span>
                <input type="text" name="state" placeholder="Nhập vào tên thành phố">
            </div>
            <div class="inputBox">
                <span>Quốc Gia :</span>
                <input type="text" name="country" placeholder="Nhập vào tên Quốc gia">
            </div>
            <div class="inputBox">
                <span>Mã giảm giá :</span>
                <input type="number" min="0" name="pin_code" placeholder="Nhập mã giảm giá">
            </div>
        </div>

        <input type="submit" name="order" value="Đặt hàng" class="option-btn">

    </form>

</section>