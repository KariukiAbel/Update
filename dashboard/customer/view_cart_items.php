<?php
/**
 * Created by PhpStorm.
 * User: nabesh
 * Date: 7/30/19
 * Time: 4:03 PM
 */

require_once  '../init.php';

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = $_GET['id'];
    $response = [
      'status' =>"",
      'data' =>""
    ];
//    $sql = "select s.name as supplier_name, o.units as units, o.cost as cost, p.name as product_name, p.sku as sku, p.images as images,p.id as id
//            from product_suppliers s INNER JOIN orders o on s.id = o.supplier_id INNER JOIN products p on o.product_id = p.id ";
        $sql = "select s.name as supplier_name, o.units as units, o.cost as cost, p.name as product_name, p.sku as sku, p.images as images
            from product_suppliers s INNER JOIN orders o on s.id = o.supplier_id INNER JOIN products p on o.product_id = p.id
            where s.id = 3";
    //$sql = "select s.name as supplier_name, p.name as product_name from product_suppliers s inner join products p on s.id= p.supplier_id";
    if ($result = mysqli_query($conn, $sql)){
        $response ['status'] = "success";
        $response ['data'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else{
        $response ['status'] = "error".mysqli_error($conn);
        $response ['data'] = mysqli_fetch_assoc($result);
    }

    echo json_encode($response);
}