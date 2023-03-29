<!-- xử lý các chức năng của trang web  -->

<?php

    // Chức năng của khách vãng lai

    // đăng ký tài khoản

    if(isset($_POST['submitregister'])){

        $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $name = mysqli_real_escape_string($conn, $filter_name);
        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);
        $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
        $pass = mysqli_real_escape_string($conn, md5($filter_pass));
        $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
        $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));
     
        $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');
     
        if(mysqli_num_rows($select_users) > 0){
            $message[] = 'Người dùng đã tồn tại';
        }else{
            if($pass != $cpass){
                $message[] = 'Xác nhận lại mật khẩu không khớp, vui lòng nhập lại';
            }else{
                mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
                $message[] = 'đăng ký thành công';
            }
        }
     
     }


    // đăng nhập

    if(isset($_POST['submitlogin'])){

        $conn = $data["dtb"];
     
        $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $email = mysqli_real_escape_string($conn, $filter_email);
        $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
        $pass = mysqli_real_escape_string($conn, md5($filter_pass));
     
        $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
     
     
        if(mysqli_num_rows($select_users) > 0){
           
            $row = mysqli_fetch_assoc($select_users);
     
            if($row['user_type'] == 'admin'){
     
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location:admin');
     
            }elseif($row['user_type'] == 'user'){
     
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('location:home');
     
            }else{
                $message[] = 'Không tìm thấy người dùng';
            }
     
        }else{
            $message[] = 'Email hoặc mật khẩu không chính xác!';
        }
     
    }

    // Chức năng của user

    // đăng xuất 
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();

        header('location:login');
    }


    // thêm sản phẩm vào danh sách yêu thích
    
    if(isset($_POST['add_to_wishlist'])){

        if($user_id == "guest"){
            header('location:login');
        }
        else {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
    
        
            $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
    
        
            if(mysqli_num_rows($check_wishlist_numbers) > 0){
                $message[] = 'Sản phẩm đã nằm trong danh sách yêu thích';
            }else{
                mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
                $message[] = 'Thêm vào danh sách yêu thích thành công';
            }

        }
        
    
    }

    // Xóa sản phẩm khỏi danh sách yêu thích

    if(isset($_POST['delete_product_wishlist'])){
        $delete_id = $_POST['product_wishlist_id'];
        mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id'") or die('query failed');
        header('location:wishlist');
    }
    
    // Xóa tất cả sản phẩm khỏi danh sách yêu thích

    if(isset($_POST['delete_all_wishlist'])){
        mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
        header('location:wishlist');
    }

    // thêm sản phẩm vào giỏ hàng

    if(isset($_POST['add_to_cart'])){

        if($user_id == "guest"){
            header('location:login');
            
        }
        else {

            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = 1;
            if(isset($_POST['product_quantity'])){
                
                $product_quantity = $_POST['product_quantity'];
            }
        
            $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        
            if(mysqli_num_rows($check_cart_numbers) > 0){
                $message[] = 'Sản phẩm đã có trong giỏ hàng';
            }else{
        
                mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
                $message[] = 'Thêm sản phẩm vào giỏ hàng thành công';
            }
        }

    
    }

    // xóa 1 sản phẩm trong giỏ hàng

    if(isset($_POST['delete_product_cart'])){
        $delete_id = $_POST['cart_id'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
        header('location:cart');
    }

    // xóa tất cả sản phẩm trong giỏ hàng
    
    if(isset($_POST['delete_all_product_cart'])){
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        header('location:cart');
    };

    // cập nhật số lượng sản phẩm
    
    if(isset($_POST['update_quantity'])){
        $cart_id = $_POST['cart_id'];
        $cart_quantity = $_POST['cart_quantity'];
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
        $message[] = 'Cập nhật số lượng sản phẩm thành công';
    }

    // Đặt hàng

    if(isset($_POST['order'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        $address = mysqli_real_escape_string($conn, $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].','.$_POST['state'].', '. $_POST['country'].' - Mã Giảm Giá: '. $_POST['pin_code']);
        $placed_on = date('d-M-Y');
        $payment_status = "Chưa xác nhận";
    
        $cart_total = 0;
        $cart_products[] = '';
    
        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($cart_query) > 0){
            while($cart_item = mysqli_fetch_assoc($cart_query)){
                $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total += $sub_total;
            }
        }
    
        $total_products = implode(', ',$cart_products);
    
        if($cart_total == 0){
            $message[] = 'giỏ hàng của bạn đang trống';
        }else{
            mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on, payment_status) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on', '$payment_status')") or die('query failed');
            mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $message[] = 'Đặt hàng thành công';
        }
    }

    if(isset($_POST['send_message'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $msg = mysqli_real_escape_string($conn, $_POST['message']);
    
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'Gửi tin nhắn thành công';
    
    }


    // Chức năng của admin


    // Thêm sản phẩm mới

    if(isset($_POST['add_product'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folter = './mvc/uploaded_img/'.$image;
     
        $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');
     
        if(mysqli_num_rows($select_product_name) > 0){
            $message[] = 'Tên sản phẩm đã tồn tại';
        }else{
            $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, details, price, image) VALUES('$name', '$details', '$price', '$image')") or die('query failed');
     
            if($insert_product){
                if($image_size > 2000000){
                    $message[] = 'Kích thước hình ảnh quá lớn';
                }else{
                    move_uploaded_file($image_tmp_name, $image_folter);
                    $message[] = 'Thêm sản phẩm thành công';
                }
            }
        }
     
    }

    // Xóa sản phẩm
     
    if(isset($_POST['delete_product'])){
     
        $delete_id = $_POST['product_id'];
        $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
        $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
        unlink('./mvc/uploaded_img/'.$fetch_delete_image['image']);
        mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
        mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
        mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
        header('location:product');
     
     }


    // Cập nhật sản phẩm

    if(isset($_POST['update_product'])){

        $update_p_id = $_POST['update_p_id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);
     
        mysqli_query($conn, "UPDATE `products` SET name = '$name', details = '$details', price = '$price' WHERE id = '$update_p_id'") or die('query failed');
     
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folter = './mvc/uploaded_img/'.$image;
        $old_image = $_POST['update_p_image'];
        
        if(!empty($image)){
            if($image_size > 2000000){
                $message[] = 'image file size is too large!';
            }else{
                mysqli_query($conn, "UPDATE `products` SET image = '$image' WHERE id = '$update_p_id'") or die('query failed');
                move_uploaded_file($image_tmp_name, $image_folter);
                unlink('./mvc/uploaded_img/'.$old_image);
                $message[] = 'Kích thước hình ảnh quá lớn';
            }
        }
     
        $message[] = 'Cập nhật sản phẩm thành công';
     
    }


    // Xác nhận đơn hàng


    if(isset($_POST['update_order'])){
        $order_id = $_POST['order_id'];
        $update_payment = $_POST['update_payment'];
        mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_id'") or die('query failed');
        $message[] = 'Trạng thái đơn hàng đã được cập nhật!';
    }

    
    //  Xóa Đơn hàng
     
    if(isset($_POST['delete_order'])){
        $delete_id = $_POST['order_id'];
        mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
        header('location:orders');
    }

    // Xóa user

    if(isset($_POST['delete_user'])){
        $delete_id = $_POST['user_id'];
        mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
        header('location:users');
    }


    // Xóa tin nhắn người dùng'

    if(isset($_POST['delete_message'])){
        $delete_id = $_POST['message_id'];
        mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
    }


?>
