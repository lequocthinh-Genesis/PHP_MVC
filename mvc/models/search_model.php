<!-- Trả về Database của trang search -->

<?php
    class search_model extends db{

        public function dtb(){
            return $this->conn;
        }
    
    }


?>
