<section class="dashboard">

    <h1 class="title">Bảng quản lý</h1>

    <div class="box-container">

        <div class="box">
            <p>Đang chờ thanh toán</p>
            <?php
                $total_pendings = 0;
                $select_pendings = $data["pending"];
                while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
                    $total_pendings += $fetch_pendings['total_price'];
                };
            ?>
            <h3 class="product-money"><?php echo $total_pendings; ?></h3>
         
        </div>

        <div class="box">
            <p>Đã thanh toán</p>
            <?php
                $total_completes = 0;
                $select_completes = $data["totalCompletes"];
                while($fetch_completes = mysqli_fetch_assoc($select_completes)){
                    $total_completes += $fetch_completes['total_price'];
                };
            ?>
            <h3 class="product-money"><?php echo $total_completes; ?></h3>
         
        </div>

        <div class="box">
            <p>Số đơn hàng</p>
            <?php
                $select_orders = $data["orders"];
                $number_of_orders = mysqli_num_rows($select_orders);
            ?>
            <h3><?php echo $number_of_orders; ?></h3>
         
        </div>

        <div class="box">
            <p>Số lượng sản phẩm</p>
            <?php
                $select_products = $data["product"];
                $number_of_products = mysqli_num_rows($select_products);
            ?>
            <h3><?php echo $number_of_products; ?></h3>
         
        </div>

        <div class="box">
            <p>Số lượng người dùng</p>
            <?php
                $select_users = $data["user"];
                $number_of_users = mysqli_num_rows($select_users);
            ?>
            <h3><?php echo $number_of_users; ?></h3>
        </div>

        <div class="box">
            <p>Số lượng admin</p>
            <?php
                
                $select_admin = $data["admin"];
                $number_of_admin = mysqli_num_rows($select_admin);
            ?>
            <h3><?php echo $number_of_admin; ?></h3>
        </div>

        <div class="box">
            <p>Số lượng tài khoản</p>
            <?php  
                $select_account = $data["account"];
                $number_of_account = mysqli_num_rows($select_account);
            ?>
            <h3><?php echo $number_of_account; ?></h3>
        </div>

        <div class="box">
            <p>Số tin nhắn</p>
            <?php
                $select_messages = $data["message"];
                $number_of_messages = mysqli_num_rows($select_messages);
            ?>
            <h3><?php echo $number_of_messages; ?></h3>
        </div>

    </div>

</section>