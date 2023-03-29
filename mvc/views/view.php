<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file link  -->
   <link rel="stylesheet" href="./public/css/style.css">
   <!-- bootstrap -->
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

   
</head>
<body>

    <?php
    
        $conn = $data["dtb"];
        
        $user_id = "guest";
        
        if(isset($_SESSION['user_id'])){

            $user_id = $_SESSION['user_id'];
            
        }; 
        
        require_once "./mvc/models/xuly_model.php";

        require_once "./mvc/views/header_view.php";

        if( isset($data["view"])) {
            require_once "./mvc/views/".$data["view"].".php";
        }
        require_once "./mvc/views/footer_view.php";


    ?>

    <!-- js file link -->
    <script src="./public/js/script.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function money() {
            var money = $(".product-money");
            var l = money.length;
            var i;
            for(i = 0 ; i < l ; i++){
                var t = parseFloat(money[i].innerHTML);
                money[i].innerHTML = t.toLocaleString('vi', {style : 'currency', currency : 'VND'});
            }

        }

        money();
    </script>
    
</body>
</html>