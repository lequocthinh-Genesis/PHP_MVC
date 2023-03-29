<section class="users">

    <h1 class="title">Tài Khoản người dùng</h1>

    <div class="box-container">
        <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            if(mysqli_num_rows($select_users) > 0){
                while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <div class="box">
            <p>user id : <span><?php echo $fetch_users['id']; ?></span></p>
            <p>username : <span><?php echo $fetch_users['name']; ?></span></p>
            <p>email : <span><?php echo $fetch_users['email']; ?></span></p>
            <p>user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; }; ?>"><?php echo $fetch_users['user_type']; ?></span></p>
         
         
            <form action="" method="POST">
                <input type="hidden" value="<?php echo $fetch_users['id'];; ?>" name="user_id">
                <input type="submit" value="Xóa" class="delete-btn" name="delete_user" onclick="return confirm('Bạn có muốn xóa người dùng này ?');">
            </form>
            
        </div>
        <?php
                }
            }
        ?>
    </div>

</section>