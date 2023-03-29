<section class="messages">

    <h1 class="title">Tin nhắn từ người dùng</h1>

    <div class="box-container">

        <?php
            $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            if(mysqli_num_rows($select_message) > 0){
                while($fetch_message = mysqli_fetch_assoc($select_message)){
        ?>
        <div class="box">
            <p>user id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
            <p>Tên người dùng : <span><?php echo $fetch_message['name']; ?></span> </p>
            <p>số điện thoại : <span><?php echo $fetch_message['number']; ?></span> </p>
            <p>Email : <span><?php echo $fetch_message['email']; ?></span> </p>
            <p>Tin nhắn : <span><?php echo $fetch_message['message']; ?></span> </p>
            <form action="" method="POST">
                <input type="hidden" value="<?php echo $fetch_message['id']; ?>" name="message_id">
                <input type="submit" value="Xóa" class="delete-btn" name="delete_message" onclick="return confirm('Bạn có muốn xóa tin nhắn này ?');">
            </form>
        </div>
        <?php
                }
            }else{
                echo '<p class="empty">you have no messages!</p>';
            }
        ?>
    </div>

</section>