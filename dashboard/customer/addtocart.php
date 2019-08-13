 <?php
require_once '../init.php';

if ($_SERVER["REQUEST_METHOD"] == "GET"){
   $ready_id = $_GET['ready_id'];

   if (isset($_SESSION["cart"])){
        if (isset($_SESSION["cart"][$ready_id])){
            $_SESSION["cart"][$ready_id]= [
                    "count" =>  $_SESSION["cart"][$ready_id] + 1,
                ];
        }else{
            $_SESSION["cart"][$ready_id]= [
                "count" => 1,
            ];  
        }
   }else{
       $_SESSION["cart"] = array();
       $_SESSION["cart"][$ready_id] = [
        "count" => 1,
        ];  
   }

}

