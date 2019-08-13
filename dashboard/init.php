<?php
session_start();
require_once "/var/www/html/willie_online_supermarket/config/database.php";
$server_root = "/willie_online_supermarket";

if(isset($_SESSION["id"]) && isset($_SESSION["type"])){
    $user_id = $_SESSION["id"];
    $type = $_SESSION["type"];
    
    //Supplier Logged In
    if($type == 2){
        $query = "SELECT s.id FROM suppliers s INNER JOIN users u ON s.user_id = u.id WHERE u.id = '$user_id'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $supplier_id = $row["id"];
            }
            if(isset($supplier_id)){
                
            }else{
                // header("location:{$server_root}/supplier/index.php");
                echo "Error1".mysqli_error($conn);
            }
        }
        else{
            echo "Error2".mysqli_error($conn);
        }
    }elseif($type == 1){ //Customer logged in
        $query = "SELECT s.id FROM customers c INNER JOIN users u ON s.user_id = u.id WHERE u.id = '$user_id'";

        $customer_id = $_SESSION["id"];
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $customer_id = $row["id"];
            }
            if(isset($customer_id)){
            }else{
                header("location:{$server_root}/customer/customer.php");               
                exit ("Error3".mysqli_error($conn));
            }
        }
        else{
            exit ("Error4".mysqli_error($conn));
        }
    }

}else{
//   echo("<center><h2>You are not authorized to access this page</h2>
//   <h4>Login <a href='{$server_root}/auth/login.php'>here</a></h4>
//   </center>");
    header("location:{$server_root}/auth/login.php");
}

if($type == 1){
    die("You are not authorized to access this page");
}

?>