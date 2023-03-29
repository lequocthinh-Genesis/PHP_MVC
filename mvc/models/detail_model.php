<!-- Trả về Database của trang detail -->


<?php
    class detail_model extends db{

        public function dtb(){
            return $this->conn;
        }
    
    }


?>
