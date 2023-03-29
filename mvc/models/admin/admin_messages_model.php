<!-- Trả về Database của trang admin message -->

<?php
    class admin_messages_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>