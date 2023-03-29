<!-- Trả về Database của trang contact -->


<?php
    class contact_model extends db{

        public function dtb(){
            return $this->conn;
        }
    
    }


?>
