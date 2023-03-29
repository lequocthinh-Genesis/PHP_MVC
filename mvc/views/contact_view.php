<?php
    if($user_id == "guest"){
        header('location:login');
    }

?>

<section class="heading">
    <h3>Liên hệ với chúng tôi</h3>
</section>

<section class="contact">

    <form action="" method="POST">
        <h3>Gửi tin nhắn cho chúng tôi!</h3>
        <input type="text" name="name" placeholder="Nhập họ tên của bạn" class="box" required> 
        <input type="email" name="email" placeholder="Nhập Email của bạn" class="box" required>
        <input type="number" name="number" placeholder="Nhập số điện thoại của bạn" class="box" required>
        <textarea name="message" class="box" placeholder="Nhập vào lời nhắn" required cols="30" rows="10"></textarea>
        <input type="submit" value="Gửi" name="send_message" class="option-btn">
    </form>

</section>