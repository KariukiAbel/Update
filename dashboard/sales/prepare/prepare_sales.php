<?php
require_once "../init.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $response = [
        "status" => "",
        "data" => ""
    ];

    // print_r($response);
    $repeat_array = [];
    $sql = "SELECT p.name, p.sku, p.unit_price, s.selling_price, s.fraction, s.quantity
    FROM products p 
    INNER JOIN ready_sale s ON p.id = s.product_id
    WHERE p.supplier_id = '3' ";

    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            $response["status"] = "success";
            while ($row = mysqli_fetch_assoc($result)){
                $response["data"] = [
                    "id" => $row["id"],
                    "product_name" => $row["name"],
                    "selling_price" => $row["selling_price"],
                    "fraction" => $row["fraction"],
                    "sku" => $row["sku"],
                    "quantity" => $row["quantity"],
                    "unit_price" => $row["unit_price"],
                ];

                $response["satus"] = "success";
            }
            // $response["data"] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }else{
            $response["status"] = "error";
            $response["data"] = "Error! No Product is prepared for sale";            
        }
    }else{
        $response["status"] = "error";
        $response["data"] = "Error! Could not fetch Items prepred for sale";        
    }
    echo json_encode($response);
}

?>