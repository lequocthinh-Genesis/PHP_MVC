<!-- Trả về Database của trang checkout -->


<?php
    class checkout_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>
