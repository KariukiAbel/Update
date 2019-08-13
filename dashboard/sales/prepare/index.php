<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prepare Sale</title>
    <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="stylesheet" href="../../../public/css/ui-kit.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>

    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
    <!--          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
    <!--            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include '../../../templates/header.php'?>
<main>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-3"></div>
               <div class="col-md-6">
                <div class="input-group mb-3">
                        <input type="text" class="form-control p-3" style="height:55px" placeholder="Search by your product name, brand or description" id="search">
                        <div class="input-group-append">
                            <span class="btn btn-outline-info pt-3 pb-3" id="search-btn">Search Products</span>
                        </div>
                </div>

                <div class="mt-3 mb-2">
                    <div class="op text-center"></div>
                </div>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row m-auto">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <table class="table table-hover center-block table-sm " id="sales">
                <thead class="thead-dark p-2">
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Buying Price</th>
                    <th>Selling Price</th>
                    <th>Fraction</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="table-data">
                <tr>
                    <td data-toggle="collapse" data-target=".target">ssfakcoas</td>
                    <td>ssfakcoas</td>


                    <td>
                        <ul>
                            <li>adse</li>
                            <div class="target collapse out"> 
                            <li>asd</li>
                            <li>lorem</li>
                            </div>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>adse</li>
                            <div class="target collapse out">
                            <li>asd</li>
                            <li>lorem</li>
                            </div>
                        </ul>
                    </td>


                    <td>ssfakcoas</td>
                    <td><button class="btn btn-outline-danger" id="delete-btn">Delete</button></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
        </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade-in" id="add-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Sale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container-fluid">
                <div class="row">
                    <form method="POST" enctype="multipart/form-data">
                        <aside class="col-sm-12">
                            <article class="p-5">
                                <dl class="row">

                                    <dt class="col-sm-4">SKU</dt>
                                    <dd class="col-sm-8">
                                        <input name="sku" class="form-control" type="text" placeholder="354346343" id="sku">
                                    </dd>

                                    <dt class="col-sm-4">Receipt ID</dt>
                                    <dd class="col-sm-8">
                                        <input name="receipt_id" class="form-control" type="text" placeholder="ID/PIN of your sale receipt" id="receipt_id">
                                    </dd>

                                    <dt class="col-sm-4">Name</dt>
                                    <dd class="col-sm-8">
                                        <input class="form-control" type="text" name="name" placeholder="Printing papers" id="name">
                                    </dd>

                                    <dt class="col-sm-4">Unit Price</dt>
                                    <dd class="col-sm-8">
                                        <input name="price" class="form-control" type="number" placeholder="150" id="unit_price">
                                    </dd>

                                    <dt class="col-sm-4">Quantity</dt>
                                    <dd class="col-sm-8">
                                        <input name="quantity" class="form-control" type="number" placeholder="50" id="quantity">
                                    </dd>

                                    <dt class="col-sm-4">VAT</dt>
                                    <dd class="col-sm-8">
                                        <input name="vat" class="form-control" type="text" placeholder="Enter VAT. Leave blank for default 16%" id="vat">
                                    </dd>

                                </dl>
                            </article> <!-- card-body.// -->
                        </aside>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="mr-3" id="error"></div>
                <button type="button" id="add-submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</main>
<script src="../../public/js/bootstrap.min.js"></script>
    <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js">
      </script>
    <?php include "../../templates/footer.php" ?>
</body>
</html>

