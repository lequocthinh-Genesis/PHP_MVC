<!-- Trả về Database của trang wishlist -->


<?php
    class wishlist_model extends db{

        public function dtb(){
            return $this->conn;
        }
    
    }


?>
