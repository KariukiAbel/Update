<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo("asdfjs");
    if(isset($_POST["product_id"])){
        echo("asdfjs");

        $product_id = $_POST["product_id"];
        if(isset($_SESSION["id"]) && isset($_SESSION["type"])){
            $user_id = $_SESSION["id"];
            $user_type = $_SESSION["type"];
            if($user_type == 1){
                // echo $product_id;

                header("location:dashboard/customer/details.php?product_id={$product_id}");
            }elseif($user_type == 2){
                header("location:dashboard/supplier/indexs.php");
            }
        }else{
            header("location:auth/login.php");        
        }
    }
}


?>