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
            <ul>
                <li><a href="home">Trang chủ</a></li>
                <li><a href="shop">Cửa hàng</a></li>
                <?php
                    if($user_id == "guest"){  
                
                ?>

                <li><a href="order" onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này. Bạn có muốn đăng nhập ngay ?');" >orders</a></li>

                <?php
                    }
                    else{
                ?>

                <li><a href="order" >Đơn hàng</a></li>

                <?php
                    }
                ?>

                <li>
                    <a href="#">
                        FNG 
                        <i class="fa-solid fa-caret-down"></i>
                    </a>
                    <ul>
                        <li><a href="about">Giới thiệu</a></li>
                        <?php
                            if($user_id == "guest"){  
                
                        ?>

                        <li><a href="contact" onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này. Bạn có muốn đăng nhập ngay ?');">Liên Hệ</a></li>

                        <?php
                            }
                            else{
                        ?>

                        <li><a href="contact">Liên Hệ</a></li>

                        <?php
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
                if($user_id=="guest"){

                    $wishlist_num_rows = 0;
                }
                else {
                    $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                    $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);

                }
            ?>

            <!--  -->

            <?php
                if($user_id == "guest"){  
                
            ?>
            
            <a href="wishlist" onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này. Bạn có muốn đăng nhập ngay ?');" ><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
            

            <?php
                }
                else{
            ?>

            <a href="wishlist"><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>


                
            <?php
                }
            ?>

            <!--  -->
            <?php
                if($user_id=="guest"){

                    $cart_num_rows = 0;
                }
                else {
                    $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                    $cart_num_rows = mysqli_num_rows($select_cart_count);
                }
            ?>

            <!--  -->

            <?php
                if($user_id == "guest"){  
                
            ?>
            
            
            <a href="cart" onclick="return confirm('Bạn cần đăng nhập để thực hiện chức năng này. Bạn có muốn đăng nhập ngay ?');" ><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>


            <?php
                }
                else{
            ?>


            <a href="cart"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
                
            <?php
                }
            ?>

            <!--  -->

        </div>

        <?php
        if($user_id != "guest") {
        
        ?>

        <div class="account-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            
            <form action="" method="post" >
                <div class="">
                    <input type="submit" value="Đăng xuất" class="delete-btn" onclick="return confirm('Bạn muốn đăng xuất ?');" name="logout" >
                </div>
            </form>
        </div>
    
        <?php
            }
            else {

        ?>
        <div class="account-box">
            <a href="register" class="option-btn">Đăng ký</a>
            <a href="login" class="option-btn">Đăng nhập</a>
        </div>

        <?php
            }

        ?>

    </div>

</header>