<?php
    require_once 'src/Database.php';
    $db = new Database();

    if(isset($_POST['Submit']))
    {
        $db->addProduct();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <script src="js/switcher.js"></script>
    <title>Product list</title>
</head>
<body>
<!--Header-->
<nav class="navbar">
    <div class="navbar-brand">Product Add</div>
    <div class="buttons">
        <button type="submit" name="Submit" class="btn btn-success" form="product_form">Save</button>
        <a href="index.php"><div class="btn btn-danger">Cancel</div></a>
    </div>
</nav>
<!--Header end-->

<!--Content-->
<div class="row">
    <div class="col-md-4">
        <form action="add_product.php" id="product_form" method="POST">
            <div class="form-group row">
                <div class="col">
                    <label for="sku">SKU</label>
                </div>
                <div class="col">
                    <input type="text" id="sku" name="Sku" class="form-control" required maxlength="10" minlength="10">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="name" class="col-form-label" >Name</label>
                </div>
                <div class="col">
                    <input type="text" id="name" name="Name" class="form-control" maxlength="20" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="price" class="col-form-label">Price $</label>
                </div>
                <div class="col">
                    <input type="number" id="price" name="Price" class="form-control" placeholder="0.00" min="0.00" step="0.01" pattern="d+(.d{2})?" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="productType" class="col-form-label">Product Type</label>
                </div>
                <div class="col">
                    <select class="form-select" onchange="change_type(this.value)" id="productType" name="type" style="margin-bottom: 10px;" required>
                        <option selected></option>
                        <?php $db->displayTypes(); ?>
                    </select>
                </div>
            </div>
            <div id="typeForm"></div>
        </form>
    </div>
</div>
<!--Content end-->

<!--Footer-->
<footer class="footer fixed-bottom">
        <p>Scandiweb Test assignment</p>
</footer>
<!--Footer end-->
</body>
</html>