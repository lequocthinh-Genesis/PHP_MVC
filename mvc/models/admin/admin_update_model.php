<!-- Trả về Database của trang admin update -->

<?php
    class admin_update_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>