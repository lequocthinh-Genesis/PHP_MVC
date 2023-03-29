<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" id="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

    <div class="flex">

        <img class="logo" src="./public/images/logo_fng_1.png" alt="">

        <nav class="navbar">
            <a href="admin">Trang chủ</a>
            <a href="product">Sản phẩm</a>
            <a href="orders">Đơn hàng</a>
            <a href="users">Tài khoản</a>
            <a href="messages">Tin nhắn</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
            <form action="" method="post" >
                <div class="">
                    <input type="submit" value="Đăng xuất" class="delete-btn" name="logout" >
                </div>
            
            </form>
            <div><a href="login">Đăng nhập</a> | <a href="register">Đăng ký</a> </div>
        </div>

    </div>

</header>