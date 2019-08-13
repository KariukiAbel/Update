function readAll(){
    $.ajax({
        type: "get",
        url: "read_all.php",
        success: function (data, status) {
            var response = JSON.parse(data)
            var output = ``;
            if (response.status == "success"){
                for(var i in response.data){
                    output += `
                        <tr>
                            <td>${response.data[i]["product_name"]}</td>
                            <td>${response.data[i]["selling_price"]}</td>
                            <td>${response.data[i]["fraction"]}</td>
                            <td>${response.data[i]["sku"]}</td>
                            <td>${response.data[i]["quantity"]}</td>
                            <td>${response.data[i]["unit_price"]}</td>
                        </tr>
                    `;
                }
            }else if(response.status == "error"){
            console.log(data);
                $(".op").html(`<div class="alert alert-danger">${response.data}</div>`)
            }  
            $("#table-data").html(output)
        }
    });
}

function searchPurchase(keyword) {
    var search = keyword
    var output = ``;
    var count = 1;
    $.ajax({
        type: "get",
        url: "read_one.php",
        data: {
            search: search,
        },
        success: function (data, status) {
            console.log(data)
            var response = JSON.parse(data)
            if(response.status == "success"){
                var purchase = response.data;
                for(var i in purchase){
                    console.log(purchase[i])
                    // if(purchase[i]["images"] != "" && purchase[i]["images"] != undefined ){
                    //     var image = purchase[i]["images"].split(",")
                    //     var src = `../../upload/${image[0]}`;
                    // }else{
                    //     var src = "https://via.placeholder.com/150";
                    // }

                    output += `
                    <tr class='text-center'>
                        <td>${count}</td>
                            <td>${purchase[i]["supplier_name"]}</td>
                            <td>${purchase[i]["pin"]}</td>
                            <td>${purchase[i]["supplier_location"]}</td>                     
                            <td>${purchase[i]["product_name"]}</td>
                            <td>${purchase[i]["description"]}</td>
                            <td>${purchase[i]["quantity"]}</td>
                            <td>${purchase[i]["unit_price"]}</td>
                            <td>${purchase[i]["total_price"]}</td>
                            <td>${purchase[i]["vat"]}</td>
                            <td>${purchase[i]["sub_total"]}</td>
                            <td>${purchase[i]["date"]}</td>
                            <td>${purchase[i]["time"]}</td>
                            <td>${purchase[i]["sku"]}</td>               
                        `;
                    count += 1;
                }
                output += `
                <tr class="mt-3">
                <td><b>Total</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><span class="text-info">${count>1 ? count-1 : count }</span> Purchases done</td>
                </tr>
                `;
                $(".op").html(`<div class=" mt-2 alert alert-success">Success ${count>1 ? count-1 : count } Purchase found </div>`)
                $(".op").effect("bounce", { times: 3 }, 300);
                $("#table_result").html(output)

            }else{
                $(".op").html(`<div class=" mt-2 alert alert-danger">Purchase Not found</div>`)
                $(".op").effect("bounce", { times: 1 }, 300);
            }
        }
    });
}

function addPurchase(){
    var pin = $("#pin").val()
    var supplier_name = $("#name").val()
    var supplier_phone_number = $("#tel").val()
    var supplier_email = $("#mail").val()
    var location = $("#loc").val()
    var sku = $("#product_code").val()
    var product_name = $("#prod").val()
    var description = $("#description").val()
    var quantity = $("#quantity").val()
    var unit_description = $("#unit_description").val();
    var unit_price =$("#unit_price").val();
    var total_price = $("#price").val()
    var vat = $("#vat").val()
    var date = $("#date").val()
    var time = $("#time").val()


       if(supplier_name == "" || product_name == ""){
        $("#error").html(`<div class="alert alert-danger">Error! Add a Supplier name and Product name to proceed</div>`)
        $("#error").effect("bounce", {times:3}, 300 )
    }else{

        var formData= new FormData()
        formData.append('KRA_pin',pin);
        formData.append('supplier_name', supplier_name);
        formData.append('supplier_phone_number', supplier_phone_number);
        formData.append('supplier_email',supplier_email);
        formData.append('location',location);
        formData.append('sku', sku);
        formData.append('product_name',product_name);
        formData.append('description', description);
        formData.append('quantity', quantity);
        formData.append('unit_description',unit_description);
        formData.append('unit_price',unit_price);
        formData.append('total_price', total_price);
        formData.append('vat',vat);
        formData.append('date_of_purchase', date);
        formData.append('time_of_purchase', time);


        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]);
        }

        $.ajax({
            type: "post",
            url: "addpurchase.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data, status){
                console.log(data)
                var response = JSON.parse(data);
                if(response.status == "success"){
                    $("#purchaseModal").modal("hide")
                    $(".op").html(`<div class=" mt-2 alert alert-success">${response.message}</div>`)
                    $(".op").effect( "bounce", {times:3}, 300 );
                }else{
                    $("#purchaseModal").modal("hide")
                    $(".op").html(`<div class=" mt-2 alert alert-danger">${response.message}</div>`)
                    $(".op").effect( "bounce", {times:3}, 300 );
                }
                console.log(data)
            },
            error: function(){
                console.log(data)

            }
        })
    }
}

$(document).ready(function () {

    readAll()

    $("#search").keyup(function () {
        var search_key = $("#search").val()
        if(search_key != ""){
            searchPurchase(search_key)
        }else{
            readAll()
        }
    })

       $("#addPurchase-btn").on("click",function (event) {
        event.preventDefault()
        $("#purchaseModal").modal("show")
    })

    $("#purchase-btn").click(function (e) {
        e.preventDefault()
        addPurchase()

    })

    $("#search-btn").on("click",function (e) {
        e.preventDefault()
        var search_key = $("#search").val()
        if(search_key != ""){
            searchPurchase(search_key)
        }else{
            readAll()
        }

    })

})