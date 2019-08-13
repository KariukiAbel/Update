<?php
/**
 * Created by PhpStorm.
 * User: nabesh
 * Date: 7/18/19
 * Time: 2:03 PM
 */

require "../init.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $response = [
        "status" => "",
        "data" => ""
    ];
    // echo $_GET["product_id"];
    if(!empty($_GET["search"])){
        $search = trim($_GET["search"]);
        $sql = "select p.sku as sku, p.name as product_name, p.description as description, p.images as images, 
        r.id as ready_id, r.fraction as fraction, r.product_id as id, r.selling_price as selling_price, r.quantity as quantity
        from products p 
        inner join ready_sale r on p.id = r.product_id 
        where p.name like '%$search%' AND p.supplier_id = '$supplier_id' ";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                $response["status"] = "success";
                $response["data"] = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }else{
                $response["status"] = "error";
            }
        }else{
            $response["status"] = "error";
        }
    }else{
        $response["status"] = "error";
    }
    echo json_encode($response);
}