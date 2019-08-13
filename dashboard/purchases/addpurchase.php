<?php
/**
 * Created by PhpStorm.
 * User: nabesh
 * Date: 7/11/19
 * Time: 11:32 AM
 */

require_once '../init.php';

function generateSKU(){
    return substr(sha1(time()), 0, 8);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $supplier_name = $supplier_phone = $supplier_email = $pin = $location = $sku = $product_name = $description = $quantity = $unit_description
        = $receipt_number = $unit_price = $total_price = $vat = $date_of_purchase = $time_of_purchase = "";

    $response = [
        "status" => "",
        "message" => "",
        "data" => ""
    ];


// capturing data from the ajax call on script.js
    $supplier_name = trim($_POST['supplier_name']);
    $receipt_number = trim($_POST['receipt_number']);
    $supplier_phone = trim($_POST['supplier_phone_number']);
    $supplier_email = trim($_POST['supplier_email']);
    $pin = trim($_POST['KRA_pin']);
    $location = trim($_POST['location']);
    $sku = trim($_POST['sku']);
    $product_name = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $quantity = trim($_POST['quantity']);
    $unit_description = trim($_POST['unit_description']);
    $unit_price = trim($_POST['unit_price']);
    $total_price = trim($_POST['total_price']);
    $vat = trim($_POST['vat']);
    $date_of_purchase = trim($_POST['date_of_purchase']);
    $time_of_purchase = ($_POST['time_of_purchase']);

    $month = date("m", strtotime($date_of_purchase));
    $current_month = date("m");
    $in_month = false;

    if((int)$month < (int)$current_month){
        $in_month = false;
    }else{
        $in_month = true;
    }

    $duplicate = false;


    //check for KRA pin i.e looking if supplier exists
    $sql="SELECT * FROM product_suppliers WHERE pin = '$pin'";
    $result=mysqli_query($conn,$sql);


    //taking the supplier id
    $fetch_id = mysqli_fetch_assoc($result);



    if(mysqli_num_rows($result) > 0){
           //checks if product is in the inventory
            $sql="select * from products where sku = '$sku'";
            $result_product = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result_product) > 0){
                $row = mysqli_fetch_assoc($result_product);
                $old_quantity = $row['quantity'];
                $new_quantity = $quantity + $old_quantity;

                $update = "update products set quantity ='$new_quantity' where sku = '$sku'";
                if($result = mysqli_query($conn, $update)){
                    $customer_id = $_SESSION["id"];
                    $supplier_id = $fetch_id['id'];
                    //calculating total price
                   $total_price = $unit_price * $quantity;

                   // calculating vat and sub-totals
                    if(!empty(trim($_POST["vat"]))){
                        $vat = trim($_POST["vat"]);
                        $sub_total = $total_price - $vat;
                    }
                    else{
                        $sub_total = $total_price * (100/116);
                        $vat = $total_price - $sub_total;
                    }

                    $add_purchase = "INSERT INTO purchases(customer_id, name, receipt_number, description, quantity, total_price, unit_price, vat, sub_total, date, time, supplier_id, sku)
                    VALUES ('$customer_id' ,'$product_name', '$receipt_number' ,'$description','$quantity' ,'$total_price' , '$unit_price' ,'$vat','$sub_total','$date_of_purchase', '$time_of_purchase', '$supplier_id', '$sku')";
                    mysqli_query($conn,$add_purchase);
                    $response ['status'] = "success";
                    $response ['message'] = "Update Sucessful";

                }
                else{
                    $response ['status'] = "error";
                    $response ['message'] = mysqli_error($conn)."Unable to add a purchase";

                }
            }

           else{

                //if product is  not in the inventory but supplier is in the database
               $insert_sku = generateSKU();
               $fetch = mysqli_fetch_assoc($result_product);
               $supplier_id = $fetch_id['id'];
               $add_product = "INSERT INTO products (name,supplier_id, unit_description,description, quantity,unit_price, sku)
                   VALUES ('$product_name', '$supplier_id','$unit_description','$description', '$quantity', '$unit_price', '$insert_sku')";

                if ($result = mysqli_query($conn,$add_product)){

                    $customer_id = $_SESSION["id"];

                    //calculating total price
                    $total_price = $unit_price * $quantity;
                  //  calculating vat and sub-totals
                    if(!empty(trim($_POST["vat"]))){
                        $vat = trim($_POST["vat"]);
                        $sub_total = $total_price - $vat;
                    }
                    else{
                        $sub_total = $total_price * (100/116);
                        $vat = $total_price - $sub_total;
                    }

                    $add_purchase = "INSERT INTO purchases(customer_id, name,receipt_number description, quantity, total_price, unit_price, vat, sub_total, date, time, supplier_id, sku)
                    VALUES ('$customer_id' ,'$product_name' , '$receipt_number' ,'$description','$quantity' ,'$total_price' , '$unit_price' ,'$vat','$sub_total','$date_of_purchase', '$time_of_purchase', '$supplier_id', '$insert_sku')";
                    if($result = mysqli_query($conn, $add_purchase)){
                        $response ['status'] = 'success';
                        $response ['message'] = 'Sucessfully added Purchase';

                    }
                    else{
                        $response ['status'] = "error!";
                        $response ["message"] = "Failed".mysqli_error($conn);
                    }

                }
                else{
                    $response ['status'] = "error";
                    $response ['message'] = mysqli_error($conn);

                }

            }


    }
    else{

        //if supplier does not exist
        $add_supplier  = "INSERT INTO product_suppliers(name, phone, email, location, pin)
            VALUES ('$supplier_name', '$supplier_phone','$supplier_email','$location','$pin')";

        if(mysqli_query($conn, $add_supplier)){
//            echo "Added supplier info";
            $response ['status'] = 'success..';
            $response ['message'] = 'Sucessfully added Supplier';
            $supplier_id = mysqli_insert_id($conn);
            $customer_id = $_SESSION["id"];
            $total_price = $unit_price / $quantity;

            if(!empty(trim($_POST["vat"]))){
                $vat = trim($_POST["vat"]);
                $sub_total = $total_price - $vat;
            }
            else{
                $sub_total = $total_price * (100/116);
                $vat = $total_price - $sub_total;
            }

            //check if product exists
            $sql="select * from products where sku = '$sku'";
            if($result_product = mysqli_query($conn,$sql)){

            if (mysqli_num_rows($result_product) > 0){
                //update inventory if and only if product is available in the inventory
                $row = mysqli_fetch_assoc($result_product);
                $old_quantity = $row['quantity'];
                $new_quantity = $quantity + $old_quantity;
                $update = "update products set quantity ='$new_quantity' where sku = '$sku'";

                $customer_id = $_SESSION["id"];

                $total_price = $unit_price * $quantity;
                //  calculating vat and sub-totals
                if(!empty(trim($_POST["vat"]))){
                    $vat = trim($_POST["vat"]);
                    $sub_total = $total_price - $vat;
                }
                else{
                    $sub_total = $total_price * (100/116);
                    $vat = $total_price - $sub_total;
                }

                $add_purchase = "INSERT INTO purchases(customer_id, name, receipt_number ,description, quantity, total_price, unit_price, vat, sub_total, date, time, supplier_id, sku)
                VALUES ('$customer_id' ,'$product_name' ,'$receipt_number', '$description','$quantity' ,'$total_price' , '$unit_price' ,'$vat','$sub_total','$date_of_purchase', '$time_of_purchase', '$supplier_id', '$sku')";

                if(mysqli_query($conn, $add_purchase)){
//                echo "Success";
                    $response ['status'] = 'success';
                    $response ['message'] = 'Sucessfully added Purchase';

                }
                else{
//                echo "Failed".mysqli_error($conn);
                    $response ['status'] = "Error!";
                    $response ["message"] = "Failed".mysqli_error($conn);
                }
             }
            else{
                //product does not exist
                $insert_sku = generateSKU();

                $add_product = "INSERT INTO products (name,supplier_id, unit_description,description, quantity,unit_price, sku)
                   VALUES ('$product_name', '$supplier_id','$unit_description','$description', '$quantity', '$unit_price', '$insert_sku')";

                if (mysqli_query($conn,$add_product)){

                    $customer_id = $_SESSION["id"];

                    //calculating total price
                    $total_price = $unit_price * $quantity;
                    //  calculating vat and sub-totals
                    if(!empty(trim($_POST["vat"]))){
                        $vat = trim($_POST["vat"]);
                        $sub_total = $total_price - $vat;
                    }
                    else{
                        $sub_total = $total_price * (100/116);
                        $vat = $total_price - $sub_total;
                    }

                    $add_purchase = "INSERT INTO purchases(customer_id, name, receipt_number, description, quantity, total_price, unit_price, vat, sub_total, date, time, supplier_id, sku)
                    VALUES ('$customer_id' ,'$product_name','$receipt_number' ,'$description','$quantity' ,'$total_price' , '$unit_price' ,'$vat','$sub_total','$date_of_purchase', '$time_of_purchase', '$supplier_id', '$insert_sku')";
                    if(mysqli_query($conn, $add_purchase)){
                        $response ['status'] = 'success';
                        $response ['message'] = 'Sucessfully added Purchase';

                    }
                    else{
                        $response ['status'] = "error!";
                        $response ["message"] = "Failed".mysqli_error($conn);
                    }

                }
                else{
                    $response ['status'] = "error";
                    $response ['message'] = mysqli_error($conn);

                }

            }}else{
                $response ['status'] = "error";
                $response ['message'] = mysqli_error($conn);
            }

//            $add_purchase = "INSERT INTO purchases(customer_id, name, description, quantity, total_price, unit_price, vat, sub_total, date, time, supplier_id, sku)
//                VALUES ('$customer_id' ,'$product_name' ,'$description','$quantity' ,'$total_price' , '$unit_price' ,'$vat','$sub_total','$date_of_purchase', '$time_of_purchase', '$supplier_id', '$sku')";
//
//            if($result = mysqli_query($conn, $add_purchase)){
////                echo "Success";
//                $response ['status'] = 'success';
//                $response ['message'] = 'Sucessfully added Purchase';
//
//            }
//            else{
////                echo "Failed".mysqli_error($conn);
//                $response ['status'] = "Error!";
//                $response ["message"] = "Failed".mysqli_error($conn);
//            }
//        }
//        else{
////            exit(mysqli_error($conn));
//            $response ['status'] = "Error!";
//            $response ["message"] = "Failed".mysqli_error($conn);
//        }
    }




}
    echo json_encode($response);

}
//else{
//    $response ["status"] = "Error";
//    $response ['message'] = "Connection failed";
//}