<?php
require "../init.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $response = [
        "status" => "",
        "data" => ""        
    ];
    // echo $_GET["product_id"];
    if(!empty($_GET["search"])){
        $search = trim($_GET["search"]);
//        $sql = "SELECT * from purchases WHERE  name like '%$search%' OR description like '%$search%' or sku like '%$search%'";
        $sql = "select s.pin as pin, s.name as supplier_name , p.sku as sku, p.name as product_name, p.receipt_number as receipt_number ,p.unit_price as unit_price,
                p.total_price as total_price, p.vat as vat, p.date as date, p.time as time, p.sub_total as sub_total,
        p.description as description,p.quantity as quantity,s.location as supplier_location
        from product_suppliers s inner join  purchases p on s.id =supplier_id where p.customer_id ='$customer_id' and p.name like '%$search%'";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                $response["status"] = "success";
                $response["data"] = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }else{
                $response["status"] = "error".mysqli_error($conn);
            }
        }else{
            $response["status"] = "error".mysqli_error($conn);
        }
    }else{
        $response["status"] = "error".mysqli_error($conn);
    }
    echo json_encode($response);
}

?>