<!-- Trả về Database của trang admin -->

<?php
    class admin_model extends db{

        public function dtb(){
            return $this->conn;
        }

        // Lấy ra hóa đơn chưa được duyệt
        public function getPending(){
            $select_pendings = mysqli_query($this->conn, "SELECT * FROM `orders` WHERE payment_status = 'Chưa xác nhận'") or die('query failed');
            return $select_pendings;
        }

        // Lấy ra hóa đơn đã được duyệt
        public function getTotalCompletes(){
            $select_completes = mysqli_query($this->conn, "SELECT * FROM `orders` WHERE payment_status = 'Đã xác nhận'") or die('query failed');
            return $select_completes;
        }

        // Lấy ra tất cả hóa đơn
        public function getOders(){
            $select_orders = mysqli_query($this->conn, "SELECT * FROM `orders`") or die('query failed');
            return $select_orders;
        }
    
        // Lấy ra tất cả sản phẩm
        public function getProduct(){
            $select_products = mysqli_query($this->conn, "SELECT * FROM `products`") or die('query failed');
            return $select_products;
        }

        // Lấy ra tất cả user
        public function getUser(){
            $select_users = mysqli_query($this->conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            return $select_users;
        }


        // Lấy ra tất cả admin
        public function getAdmin(){
            $select_admin = mysqli_query($this->conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            return $select_admin;
        }

        // Lấy ra tất cả tài khoản
        public function getAccount(){
            $select_account = mysqli_query($this->conn, "SELECT * FROM `users`") or die('query failed');
            return $select_account;
        }

        // Lấy ra tất cả tin nhắn
        public function getMessages(){
            $select_messages = mysqli_query($this->conn, "SELECT * FROM `message`") or die('query failed');
            return $select_messages;
        }


    }


?>
