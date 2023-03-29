<!-- Trả về Database của trang admin users -->

<?php
    class admin_users_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>